<?php
use Slim\App;

require_once __DIR__. "/../vendor/autoload.php";

$settings = require_once  __DIR__ ."/settings.php";

$app = new App($settings);

$container = $app->getContainer();

require_once __DIR__. '/errHandler.php';

$routeContainers = require_once __DIR__. '/routecontainers.php';

$routeContainers($container);


require_once __DIR__. '/routes.php';

require_once __DIR__."/database.php";

$middleware = require_once __DIR__."/middleware.php";

$middleware($app);


$app->run();
