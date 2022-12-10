<?php

use Illuminate\Support\Str;

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// The router allows you to register routers that respond to any HTTP verb:

// $router->get('/get', function () {
//     return 'GET';
// });

// $router->get('/post', function () {
//     return 'POST';
// });

// $router->get('/put', function () {
//     return 'PUT';
// });

// $router->get('/patch', function () {
//     return 'PATCH';
// });

// $router->get('/delete', function () {
//     return 'DELETE';
// });

// $router->get('/options', function () {
//     return 'OPTIONS';
// });

// Generate application key
$router->get('/key', function () {
    return Str::random(32);
});

// Basic route parameter
$router->get('/user/{id}', function ($id) {
    return 'User id = ' . $id;
});

$router->get('/foo', function () {
    return 'Hellow Heaven, GET Method';
});

$router->post('/bar', function () {
    return 'Hellow Heaven, POST Method';
});

$router->get('/post/{postId}/comments/{commentId}', function ($postId, $commentId) {
    return 'Post ID = ' . $postId . ' Comment ID = ' . $commentId;
});

// Optional route parameter
$router->get('/optional/[{param}]', function ($param = null) {
    return $param;
});

$router->get('profile', function () {
    return redirect()->route('route.profile');
});

$router->get('profile/santreTanjung', ['as' => 'route.profile', function () {
    return 'Route SantreTanjung';
}]);

$router->group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => ''], function () use ($router) {
    $router->get('home', function () {
        return 'Home Admin';
    });

    $router->get('profile', function () {
        return 'Profile Admin';
    });
});

$router->get('/admin/home', ['middleware' => 'age', function () {
    return 'Old Enough';
}]);

$router->get('/fail', function () {
    return 'Not yet mature';
});
