<?php
namespace App\Controller;

use App\Controller\AppController;

class PublishersController extends AppController
{
    public function index()
    {
        $publishers = $this->Publishers->find('all')->order(['id' => 'desc']);

        $this->set('publishers', $publishers);
    }

    public function add()
    {
        $publisher = $this->Publishers->newEntity();

        if ($this->request->is('post')) {
            $title = $this->request->getData('title');
            $description = $this->request->getData('description');
            $logotype = $this->request->getData('logotype');

            $this->Publishers->patchEntity($publisher, [
                'title' => $title,
                'description' => $description,
                'logotype' => $logotype
            ]);

            if ($this->Publishers->save($publisher)) {
                $this->Flash->success(__('Был добавлен издатель'));

                return $this->redirect('/publishers');
            }
        }

        $this->set('publisher', $publisher);
    }

    public function edit($id = null)
    {
        $publisher = $this->Publishers->find('all')->where(['id' => $id])->first();

        if ($this->request->is(['post', 'put'])) {
            $title = $this->request->getData('title');
            $description = $this->request->getData('description');
            $logotype = $this->request->getData('logotype');

            $this->Publishers->patchEntity($publisher, [
                'title' => $title,
                'description' => $description,
                'logotype' => $logotype
            ]);

            if ($this->Publishers->save($publisher)) {
                $this->Flash->success(__('Издатель был изменен'));

                return $this->redirect('/publishers');
            }
        }

        $this->set(compact('publisher'));
    }

    public function delete($id = null)
    {
        $publisher = $this->Publishers->find('all')->where(['id' => $id])->first();

        if ($this->Publishers->delete($publisher)) {
            $this->Flash->success(__('Издатель был удален'));

            return $this->redirect('/publishers');
        }
    }
}
