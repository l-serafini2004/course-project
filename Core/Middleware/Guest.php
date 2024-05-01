<?php

namespace Core\Middleware;

class Guest
{
    public function handle(){
        if(isset($_SESSION['user'])){
            // Fai una funzione che racchiuda header e exit
            header('location: /');
            exit();
        }
    }
}