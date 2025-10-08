<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell
 */

use Illuminate\Foundation\Application;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If The Application Is In Maintenance Mode
|--------------------------------------------------------------------------
|
| If the application is in maintenance mode, we will return a simple response
| to the user. Otherwise, we will boot the framework and handle the request.
|
*/

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to bootstrap the framework for this request, and then send it
| to the proper handlers. The first thing we will do is create an
| instance of the Laravel application, then we can handle the request.
|
*/

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application instance, we can handle the incoming request
| through the application's HTTP kernel and send the response back to
| the browser. The response will be sent back to the user's browser.
|
*/

$response = $app->make(Application::class)->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$app->terminate($request, $response);
