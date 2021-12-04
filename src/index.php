<?php

require_once './vendor/autoload.php';
session_start();

use CMS_PHP\Controllers\Routing\Router;
use CMS_PHP\Controllers\Config\{DotEnv, Jwt_generator};
use CMS_PHP\Controllers\{Articles, ViewLoader, Users, Api};
use CMS_PHP\Models\{Database, UsersRepo};
(new DotEnv('.env'))->load();
// $_SERVER["argc"] contient les données du DOTENV ce qui n'est pas souhaitable


$db = new Database(getenv('DB_DNS'), getenv('DB_LOGIN'), getenv('DB_PASS'));
$renderer = new ViewLoader();
$user_rep = new UsersRepo($db);
$user_controller = new Users($user_rep, $renderer);

$router = new Router($_SERVER["REDIRECT_URL"], $renderer);
/*View Part*/
$router->get('/', [$renderer, 'homepage']);
$router->get('/homepage', [$renderer, 'homepage']);
$router->get("/register", [$renderer, "register"]);
$router->get("/login", [$renderer, "login"]);
$router->get("error", [$renderer, "error"]);
/*User Part*/
$router->post("/submit_register_form", [$user_controller, "register_form"]);
$router->post("/login_check", [$user_controller, "login_verify"]);
$router->post("/update_user/:id", [$user_controller, ""]); //TODO
$router->get("/user_office", [$user_controller, "user_profile"]); // Pour récupérer la clé API
$router->get("/logout", [$user_controller, "logout"]);
/*Admin Part*/
$router->get("/users", [$user_controller, "get_users"]);
$router->get("/delete_user/:id", [$user_controller, "delete_user"]);
$router->get("/user/:id", [$user_controller, "get_user"]);
/*Content Part*/
$router->get("/articles", [$user_controller, 'check']);
$router->get("/article/:id", []);
$router->post("/submit_article", []);
$router->post("/delete_article/:id", []);
$router->post("/update_article/:id", [$user_controller, ""]);

/*API Parts*/
 /*API User Part*/
$router->get("/api/:key/users", [$user_controller,]);
$router->get("/api/:key/user/:id", [$user_controller,]);
$router->post("/api/:key/user/:id/:action", [$user_controller, "delete_user"]);
/*API Article Part*/
$router->get("/api/:key/articles", [$user_controller,]);
$router->get("/api/:key/article/:id", [$user_controller,]);
$router->post("/api/:key/article/:id/:action", [$user_controller,]);

$router->run();


