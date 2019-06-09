<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as MongoModel;
use App\Dao as DAO;

class Form extends MongoModel implements DAO
{
    //
    public function remove($id){
        $this->find($id)->delete();
    }
    public function edit($data){
        
        $this->Nombre=$data->input("Nombre");
        $this->Apellido=$data->input("Apellido");
        $this->Edad=$data->input("Edad");
        $this->Cedula=$data->input("Cedula");
        $this->Sexo=$data->input("Sexo");
        if($data->exists('Casado')){
            $this->Casado=TRUE;
        }else{
            $this->Casado=FALSE;
        }
        $this->create();
    }
    public function is_empty(){
        if($this->count()==0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function find($property){
        return $this->where('Cedula', $property)->first();
    }
    public function findAll(){
        return $this->all();
    }
    public function create(){
        $this->save();
    }
}
