<?php

namespace Http\Forms;

use \Core\Validator;
use Core\Database;
use Core\App;

class LoginForm
{
    protected $errors = [];
    public function validate($email, $password){

        if(!Validator::email($email)) $this->errors['email'] = "La mail non va bene";

        if(!Validator::password($password)) $this->errors['password'] = "La password inserita non è valida";

        $db = App::resolve(Database::class);

        $user = $db->query("SELECT * FROM utenti WHERE email = :email", [
            'email' => $email,
        ])->find();

        if(!isset($user[0])) $this->errors['email'] = "Nessun account corrisponde a questa mail";
        else{
            if(password_verify($user[0]['password'],PASSWORD_BCRYPT)) $this->errors['password'] = "La password non è corretta!";
        }

        return empty($this->errors);
    }

    public function errors(){
        return $this->errors;
    }
}