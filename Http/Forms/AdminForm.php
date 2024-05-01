<?php

namespace Http\Forms;

use Core\Database;
use Core\Validator;
use Core\App;


class AdminForm
{
    protected $errors = [];

    public function validate($data){

        // Controlla il nome
        if(!Validator::string($data['name'], 0)) $this->errors['name'] = 'Inserisci il nome nel formato corretto';

        // Controlla il numero di telefono
        if($data['telephone'] != ''){
            if(!Validator::phone_number($data['telephone'])) $this->errors['telephone'] = 'Il numero di telefono non è inserito nel formato corretto';
        }

        return empty($this->errors);

    }

    public function errors(){
        return $this->errors;
    }
}