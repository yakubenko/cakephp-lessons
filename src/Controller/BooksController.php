<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Text;
use Cake\Utility\Hash;

/**
 * Books Controller
 *
 * @property \App\Model\Table\BooksTable $Books
 *
 * @method \App\Model\Entity\Book[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BooksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $books = $this->Books->find('all')->contain(['Writers', 'Categories', 'Publishers'])->where()->toArray();
        $this->set(compact('books'));
    }

    public function add()
    {
        $book = $this->Books->newEntity();
        $publishers = $this->Books->Publishers->find('list')->toArray();
        $categories = $this->Books->Categories->find('treeList', ['spacer' => '--'])->toArray();
        $writers = $this->Books->Writers->find('list')->toArray();

        if ($this->request->is('post')) {
            $title = $this->request->getData('title');
            $year = $this->request->getData('year');
            $description = $this->request->getData('description');
            $publisherId = $this->request->getData('publisher_id');

            $selectedCats = $this->request->getData('categories');
            $selectedWriters = $this->request->getData('writers');

            $this->Books->patchEntity($book, [
                'uid' => Text::uuid(),
                'title' => $title,
                'year' => $year,
                'description' => $description,
                'publisher_id' => $publisherId,
                'categories' => ['_ids' => $selectedCats],
                'writers' => ['_ids' => $selectedWriters],
            ]);

            if ($this->Books->save($book)) {
                $this->Flash->success(__('Добавлена книга'));

                return $this->redirect('/books');
            }
        }

        $this->set(compact('book', 'publishers', 'categories', 'writers'));
        $this->render('form');
    }

    public function edit($id = null)
    {
        $book = $this->Books
                ->find('all')->where(['Books.id' => $id])
                ->contain(['Writers', 'Categories', 'Publishers'])->first();

        $selectedCats = Hash::extract((array)$book->categories, '{n}.id');
        $selectedWriters = Hash::extract((array)$book->writers, '{n}.id');

        $publishers = $this->Books->Publishers->find('list')->toArray();
        $categories = $this->Books->Categories->find('treeList', ['spacer' => '--'])->toArray();
        $writers = $this->Books->Writers->find('list')->toArray();

        if ($this->request->is(['put'])) {
            $title = $this->request->getData('title');
            $year = $this->request->getData('year');
            $description = $this->request->getData('description');
            $publisherId = $this->request->getData('publisher_id');

            $selectedCats = $this->request->getData('categories');
            $selectedWriters = $this->request->getData('writers');

            $this->Books->patchEntity($book, [
                'title' => $title,
                'year' => $year,
                'description' => $description,
                'publisher_id' => $publisherId,
                'categories' => ['_ids' => $selectedCats],
                'writers' => ['_ids' => $selectedWriters],
            ]);

            if ($this->Books->save($book)) {
                $this->Flash->success(__('Книга отредактирована'));

                return $this->redirect('/books');
            }
        }

        $this->set(compact(
            'book',
            'publishers',
            'categories',
            'writers',
            'selectedCats',
            'selectedWriters',
            'selectedCategories'
        ));
        $this->render('form');
    }

    public function delete($id = null)
    {
        $book = $this->Books->find('all')->where(['Books.id' => $id])->first();

        if ($this->Books->delete($book)) {
            $this->Flash->success(__('Книга была удалена'));

            return $this->redirect('/books');
        }
    }
}
