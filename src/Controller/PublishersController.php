<?php
namespace App\Controller;

use App\Controller\AppController;

class PublishersController extends AppController
{
    public function index()
    {
        $publishers = $this->Publishers->find('all')->order(['id' => 'desc'])->toArray();

        $this->set('publishers', $publishers);
    }

    public function add()
    {
        $publisher = $this->Publishers->newEntity();

        if ($this->request->is('post')) {
            $title = $this->request->getData('title');
            $description = $this->request->getData('description');

            $this->Publishers->patchEntity($publisher, [
                'title' => $title,
                'description' => $description
            ]);

            if ($this->Publishers->save($publisher)) {
                return $this->redirect('/publishers');
            }
        }

        $this->set('publisher', $publisher);
    }
}
