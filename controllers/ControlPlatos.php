<?php

namespace App\controllers;

use App\models\entities\platos;

class ControlPlatos
{
    public function getAllDishes()
    {
        $model = new Platos();
        $dishes = $model->all(); // 
        return $dishes;
    }

    public function saveNewDishe($resquest)
    {
        $model = new Platos();
        $model->set('description', $resquest['description']);
        $model->set('price', $resquest['price']);
        $model->set('idCategory', $resquest['idCategory']);
        $res = $model->registrar();
        return $res ? 'yes' : 'not';
    }

   public function updateDishe($resquest)
   {
        $model = new Platos();
        $model->set('id', $resquest['id']);
        $model->set('description', $resquest['description']);
        $model->set('price', $resquest['price']);
        $model->set('idCategory', $resquest['idCategory']);
    
        if (empty($model->find())) {
        return "empty";
        }

        $res = $model->update();
        return $res ? 'yes' : 'not';
    }


    public function removeDishe($id)
    {
        $model = new Platos();
        $model->set('id', $id);
        if (empty($model->find())) {
            return "empty";
        }
        $res = $model->delete();
        return $res ? 'yes' : 'not';
    }

    public function getDishe($id)
    {
        $model = new Platos();
        $model->set('id', $id);
        return $model->find(); 
    }
}
