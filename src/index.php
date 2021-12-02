<?php

require_once './vendor/autoload.php';
session_start();

use CMS_PHP\Controllers\{Router, Articles, Homepage, DotEnv, Users};
use CMS_PHP\Models\{Database, UsersRepo};
(new DotEnv('.env'))->load();

$router = new Router($_SERVER["REDIRECT_URL"]);
$db = new Database(getenv('DB_DNS'), getenv('DB_LOGIN'), getenv('DB_PASS'));
$user_rep = new UsersRepo($db);
$render = new Homepage();

$user_controller = new Users($user_rep, $render);

/*User Part*/
$router->get('/', [$user_controller, 'check']);
$router->get("/register", [$render, "register_page"]);
$router->post("/submit_register_form", [$user_controller, "register_form"]);
/*Content Part*/
$router->get("articles", []);
$router->get("articles/:id", []);
$router->post("article", []);
//$router->get('/posts/:id', function($id){ echo "Voila l'article $id"; });
$router->run();

