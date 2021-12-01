<?php

require_once './vendor/autoload.php';
session_start();

use CMS_PHP\Controllers\{Router, Articles, Homepage, DotEnv};
use CMS_PHP\Models\{Database, Users};
(new DotEnv('.env'))->load();

$router = new Router($_SERVER["REDIRECT_URL"]);
$db = new Database(getenv('DB_DNS'), getenv('DB_LOGIN'), getenv('DB_PASS'));
$user_rep = new Users($db);
$login = new Homepage($user_rep);


$router->get('/', [$login, 'check']);
$router->get("/register", [$login, "register_page"]);
//$router->get('/posts/:id', function($id){ echo "Voila l'article $id"; });
$router->run();

