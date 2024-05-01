<?php

namespace Http\Forms;

use Core\Database;
use Core\Validator;
use Core\App;

class CoursesForm
{
    protected $errors = [];

    public function validate($data){
        if(!Validator::string($data['titolo'], 0)) $this->errors['titolo'] = "Inserire un titolo valido";
        if(!Validator::string($data['descrizione'], 0)) $this->errors['descrizione'] = "Inserire una descrizione valida";
        if(!Validator::string($data['body'], 0)) $this->errors['body'] = "Inserire un body valido";
        if(!Validator::link($data['image'])) $this->errors['image'] = "Inserire un link corretto!";
        if($data['prezzo'] <= 0) $this->errors['prezzo'] = "Il prezzo deve essere positivo!";

        return empty($this->errors);
    }


    public function errors(){
        return $this->errors;
    }
}