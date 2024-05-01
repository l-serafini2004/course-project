<?php

namespace Core\Middleware;

class Admin
{
    public function handle(){
        if(!isset($_SESSION['user'])){
            abort(403);
            exit();
        }else{
            if(!$_SESSION['user']['admin'] ){
                abort(403);
                exit();
            }
        }
    }
}