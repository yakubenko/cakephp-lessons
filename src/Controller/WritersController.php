<?php
namespace App\Controller;

use App\Controller\AppController;

class WritersController extends AppController
{
    public function index()
    {
        $writers = $this->Writers->find('all');
        $this->set(compact('writers'));
    }

    public function add()
    {
        $writer = $this->Writers->newEntity();
        $categories = $this->Writers->Categories->find('treeList')->toArray();

        if ($this->request->is('post')) {
            $firstname = $this->request->getData('firstname');
            $lastname = $this->request->getData('lastname');
            $middlename = $this->request->getData('middlename');
            $photo = $this->request->getData('photo');
            $bio = $this->request->getData('bio');
            $yearB = $this->request->getData('year_b');
            $yearD = $this->request->getData('year_d');
            $categories = $this->request->getData('categories');

            $data = [
                'firstname' => $firstname,
                'lastname' => $lastname,
                'middlename' => $middlename,
                'bio' => $bio,
                'photo' => null,
                'year_b' => $yearB,
                'year_d' => $yearD
            ];

            $data['categories']['_ids'] = $categories;

            $this->Writers->patchEntity($writer, $data);

            if ($this->Writers->save($writer)) {
                $this->Flash->success(__('Был добавлен Писатель'));

                return $this->redirect('/writers');
            }
        }

        $this->set(compact('writer', 'categories'));
    }

    public function edit($id = null)
    {
        $writer = $this->Writers->find('all')->where(['Writers.id' => $id])->contain(['Categories'])->first();
        $categories = $this->Writers->Categories->find('treeList')->toArray();

        $selectedCats = array_map(function ($el) {
            return $el['id'];
        }, (array)$writer->categories);

        if ($this->request->is(['post', 'put'])) {
            $firstname = $this->request->getData('firstname');
            $lastname = $this->request->getData('lastname');
            $middlename = $this->request->getData('middlename');
            $photo = $this->request->getData('photo');
            $bio = $this->request->getData('bio');
            $yearB = $this->request->getData('year_b');
            $yearD = $this->request->getData('year_d');
            $categories = $this->request->getData('categories');

            $data = [
                'firstname' => $firstname,
                'lastname' => $lastname,
                'middlename' => $middlename,
                'bio' => $bio,
                'photo' => null,
                'year_b' => $yearB,
                'year_d' => $yearD
            ];

            $data['categories']['_ids'] = $categories;

            $this->Writers->patchEntity($writer, $data);

            if ($this->Writers->save($writer)) {
                $this->Flash->success(__('Был изменен Писатель'));

                return $this->redirect('/writers');
            }
        }

        $this->set(compact('writer', 'categories', 'selectedCats'));
    }

    public function delete($id = null)
    {
        $writer = $this->Writers->find('all')->where(['id' => $id])->first();

        if ($this->Writers->delete($writer)) {
            $this->Flash->success(__('Писатель был удален'));

            return $this->redirect('/writers');
        }
    }
}
