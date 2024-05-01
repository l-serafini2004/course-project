<?php

namespace Http\Forms;

use Core\Database;
use Core\Validator;
use Core\App;

class NewsletterForm
{

    protected $errors = [];

    public function validate($email){

        if(!Validator::email($email)) $this->errors['email'] = "La mail non è stata inserita in un formato corretto";

        $db = App::resolve(Database::class);

        $em = $db->query('select * from newsletter where email = :email', [
            'email' => $email,
        ])->find();

        if(isset($em[0])) $this->errors['email'] = "La mail è già in uso";

        return empty($this->errors);
    }

    public function errors(){
        return $this->errors;
    }

}