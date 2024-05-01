<?php

namespace Http\Forms;

use Core\App;
use Core\Database;
use Core\Validator;

class ConsigliatiForm
{

    protected $errors = [];

    public function validate($data){
        if(!Validator::string($data['nome_corso'], 0)) $this->errors['nome_corso'] = "Inserire un titolo";
        if(!Validator::link($data['link'])) $this->errors['link'] = "Inserire un link valido";
        if(!isset($data['img']) or $data['img'] == "") $this->errors['img'] = "Inserire un'immagine";

        return empty($this->errors);
    }

    public function errors(){
        return $this->errors;
    }

}