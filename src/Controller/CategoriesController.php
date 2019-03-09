<?php
namespace App\Controller;

use App\Controller\AppController;

class CategoriesController extends AppController
{
    public function index()
    {
        $categories = $this->Categories->find('treeList')->toArray();
        $this->set(compact('categories'));
    }

    public function add()
    {
        $category = $this->Categories->newEntity();
        $categories = $this->Categories->find('treeList')->toArray();

        if ($this->request->is(['post'])) {
            $title = $this->request->getData('title');
            $description = $this->request->getData('description');
            $parentId = $this->request->getData('parent_id');

            $this->Categories->patchEntity($category, [
                'title' => $title,
                'description' => $description,
                'parent_id' => $parentId
            ]);

            if ($this->Categories->save($category)) {
                $this->Flash->success(__('Была добавлена категория'));

                return $this->redirect('/categories');
            }
        }

        $this->set(compact('category', 'categories'));
    }

    public function edit($id = null)
    {
        $category = $this->Categories->find('all')->where(['Categories.id' => $id])->first();
        $categories = $this->Categories->find('treeList')->where(['Categories.id !=' => $id])->toArray();

        if ($this->request->is(['post', 'put'])) {
            $title = $this->request->getData('title');
            $description = $this->request->getData('description');
            $parentId = $this->request->getData('parent_id');

            $this->Categories->patchEntity($category, [
                'title' => $title,
                'description' => $description,
                'parent_id' => $parentId
            ]);

            if ($this->Categories->save($category)) {
                $this->Flash->success(__('Была изменена категория'));

                return $this->redirect('/categories');
            }
        }

        $this->set(compact('category', 'categories'));
    }

    public function delete($id = null)
    {
        $publisher = $this->Categories->find('all')->where(['id' => $id])->first();

        if ($this->Categories->delete($publisher)) {
            $this->Flash->success(__('Категория была удалена'));

            return $this->redirect('/categories');
        }
    }
}
