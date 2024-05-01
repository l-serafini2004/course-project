<?php

$router->get('/', 'index.php');

// Corsi
$router->get('/corsi', 'corsi.php');
$router->get('/corso', 'corso.php');

// Newsletter
$router->post("/newsletter/update", 'newsletter/add.php');

// Scuola
$router->get("/school", '/school/school.php');
$router->get("/personal", '/school/show.php');

// Login
$router->get('/login', 'session/create.php')->only('guest');
$router->post('/login', 'session/store.php')->only('guest');

// Register
$router->get('/register', 'register/create.php')->only('guest');
$router->post('/register', 'register/store.php')->only('guest');

// Conferma iscrizione
$router->post('/confirm', 'register/verify.php')->only('guest');

// Forgot password
$router->get('/forgot', 'forgot/show.php')->only('guest');
$router->post('/forgot', 'forgot/update.php')->only('guest');


// Profilo
$router->get('/profile', 'user/profile.php')->only('auth'); // Home del profilo
$router->post('/logout', 'user/destroy.php')->only('auth'); // Logout


// Prenota
$router->get('/book', 'book/create.php')->only('auth');
$router->post('/book', 'book/store.php')->only('auth');

// ADMIN
$router->get('/admin', 'private/index.php')->only('admin');

$router->get('/admin/gestionecv', 'private/personalprofile/create.php')->only('admin');
$router->post('/admin/gestionecv', 'private/personalprofile/update.php')->only('admin');

// Utenti -db
$router->get('/admin/dbutenti', 'private/utenti/show.php')->only('admin');
$router->post('/admin/dbutenti/delete', 'private/utenti/destroy.php')->only('admin');


// Corsi
$router->get('/admin/courses', 'private/course/create.php')->only('admin');
$router->get('/admin/addcourse', 'private/course/add.php')->only('admin');
$router->post('/admin/addcourse', 'private/course/upload.php')->only('admin');

// Corsi
$router->get('/admin/modifycourse', 'private/course/modify.php')->only('admin');
$router->post('/admin/deletecourse', 'private/course/destroy.php')->only('admin');
$router->post('/admin/updatecourse', 'private/course/update.php')->only('admin');

// Prenotazioni
$router->get('/admin/prenotazioni', 'private/prenotazioni/show.php')->only('admin');

// Gestione dati
$router->get('/admin/dati', 'private/dati/show.php')->only('admin');

// Insegnanti
$router->get('/admin/teacher', 'private/insegnanti/create.php')->only('admin');
$router->post('/admin/teacher', 'private/insegnanti/store.php')->only('admin');
$router->post('/admin/teacher-destroy', 'private/insegnanti/destroy.php')->only('admin');

// Consigliati
$router->get('/admin/consigliati', 'private/consigliati/create.php')->only('admin');
$router->post('/admin/destroy-consigliati', 'private/consigliati/destroy.php')->only('admin');
$router->post('/admin/consigliati', 'private/consigliati/store.php')->only('admin');


// Info
$router->get('/info', 'informazioni/info.php');