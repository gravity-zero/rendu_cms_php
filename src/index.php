<?php

require_once './vendor/autoload.php';
session_start();

use CMS_PHP\Controllers\{Router, Articles, ViewLoader, DotEnv, Users};
use CMS_PHP\Models\{Database, UsersRepo};
(new DotEnv('.env'))->load();


$db = new Database(getenv('DB_DNS'), getenv('DB_LOGIN'), getenv('DB_PASS'));
$renderer = new ViewLoader();
$user_rep = new UsersRepo($db);
$user_controller = new Users($user_rep, $renderer);

$router = new Router($_SERVER["REDIRECT_URL"], $renderer);
/*User Part*/
$router->get('/', [$user_controller, 'check']);
$router->get("/register", [$renderer, "register"]);
$router->post("/submit_register_form", [$user_controller, "register_form"]);
$router->get("/users", [$user_controller, ""]);
$router->get("/user/:id", [$user_controller, "get_users"]);
$router->post("/delete_user/:id", [$user_controller, ""]);
$router->post("/update_user/:id", [$user_controller, ""]);
$router->get("error", [$renderer, "error"]);
/*Content Part*/
$router->get("/articles", []);
$router->get("/article/:id", []);
$router->post("/submit_article", []);
$router->post("/delete_article/:id", []);
$router->post("/update_article/:id", [$user_controller, ""]);
$router->run();

