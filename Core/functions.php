<?php
function dd($value){
    echo "<h1 style='color: red;'>Dump and Die Informations</h1>";
    echo "<pre>";
    var_dump($value);
    echo "<pre>";
    die();
}

function urlIs($value){
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404){
    http_response_code($code);
    view("partials/navbar.view.php");
    view("errors/" . $code . ".view.php");
    view("partials/footer.view.php");
    die();
}

function authorize($condition, $error = 404){
    if(!$condition) abort($error);
}

function base_path($path){
    return BASE_PATH . $path;
}

function view($path, $attributes = []){
    extract($attributes);
    require base_path('views/' . $path);
}

function login($user){

    $_SESSION['user'] = [
        'id' => $user['id'],
        'email' => $user['email'],
        'username' => $user['username'],
        'name' => $user['name'],
        'admin' => $user['admin'],
    ];


}

function logout(){
    $_SESSION = [];
    session_destroy();

    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time()-3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}