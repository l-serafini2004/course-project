<?php

namespace Http\Forms;

use Core\Database;
use Core\Validator;
use Core\App;

class RegisterForm
{
    protected $errors = [];

    public function validate($email, $password, $username, $name){


        if(!Validator::string($name, 0)) $this->errors['name'] = "Inserire un nome valido";

        if(!Validator::string($username, 0)) $this->errors['username'] = "Inserire un username valido";

        if(!Validator::email($email)) $this->errors['email'] = "La mail non va bene";

        if(!Validator::password($password)) $this->errors['password'] = "La password non va bene";



        // Controlla se la mail o il nome utente ci siano gia
        $db = App::resolve(Database::class);

        $em = $db->query('SELECT * FROM utenti WHERE email= :email OR username= :username', [
            'email' => $email,
            'username' => $username,
        ])->find();



        if(isset($em[0])){
            if($em[0]["verified"] === 0) $db->query("DELETE FROM utenti WHERE id = :id", ['id' => $em[0]['id']]);
            else{
                if($em[0]["email"] === $email) $this->errors['email'] = "La mail è già stata utilizzata";
                if($em[0]["username"] === $username) $this->errors['username'] = "IL nome utente è già stato utilizzato";
            }

        }


        return empty($this->errors);
    }

    public function errors(){
        return $this->errors;
    }

}