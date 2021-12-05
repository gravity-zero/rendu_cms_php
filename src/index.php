<?php

require_once './vendor/autoload.php';
session_start();

use CMS_PHP\Controllers\Routing\Router;
use CMS_PHP\Controllers\Config\{DotEnv};
use CMS_PHP\Controllers\{Articles, ViewLoader, Users, Api};
use CMS_PHP\Models\{Database, UsersRepo, ArticlesRepo};
(new DotEnv('.env'))->load();
// $_SERVER["argc"] contient les données du DOTENV ce qui n'est pas souhaitable


$db = new Database(getenv('DB_DNS'), getenv('DB_LOGIN'), getenv('DB_PASS'));

if(getenv("APP_ENV") !== "prod") $renderer = new ViewLoader(); else $renderer = new ViewLoader(getenv('PROD_PATH'));
$user_rep = new UsersRepo($db);
$user_controller = new Users($user_rep, $renderer);
$article_rep = new ArticlesRepo($db);
$article_controller = new Articles($article_rep, $renderer);

$router = new Router($_SERVER["REDIRECT_URL"], $renderer);
/*View Part*/
$router->get('/', [$article_controller, 'getArticles']);
$router->get('/homepage', [$article_controller, 'getArticles']);
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
$router->get("/articles", [$article_controller, 'getArticles']);
$router->get("/article/:id", [$article_controller, "getArticle"]);
$router->get("/article_form", [$renderer, "article_form"]);
$router->post("/submit_article", [$article_controller, 'submitArticle']);
$router->post("/delete_article/:id", [$article_controller, "removeArticle"]);
$router->post("/edit_article/:id", [$article_controller, ""]);

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


