<?php

use Cake\Core\Plugin;
use Cake\Routing\Router;

Router::defaultRouteClass('DashedRoute');

Router::scope('/', function ($routes) {

  $routes->connect('/', ['controller' => 'Pages', 'action' => 'home', 'home']);

  $routes->connect('/login', ['controller' => 'Users', 'action' => 'login', 'login']);

  $routes->connect('/check-otp', ['controller' => 'Users', 'action' => 'users_otp']);

  $routes->connect('/logout', ['controller' => 'Users', 'action' => 'logout', 'logout']);

  $routes->connect('/forgot-password', ['controller' => 'Users', 'action' => 'forgot-password', 'forgotPassword']);

  $routes->connect('/signup', ['controller' => 'Users', 'action' => 'signup', 'signUp']);

  $routes->connect('/guest', ['controller' => 'Users', 'action' => 'guest', 'guest']);

  $routes->connect('/profile', ['controller' => 'Users', 'action' => 'profile', 'profile']);

  $routes->connect('/about-us', ['controller' => 'Pages', 'action' => 'about_us', 'about_us']);

  $routes->connect('/contributions', ['controller' => 'Shops', 'action' => 'contributions', 'contributions']);

  $routes->connect('/join-meeting', ['controller' => 'Pages', 'action' => 'joinMeeting', 'joinMeeting']);

  $routes->connect('/gallery-details/*', ['controller' => 'Pages', 'action' => 'galleryDetails', 'galleryDetails']);

  $routes->connect('/gallery', ['controller' => 'Pages', 'action' => 'gallery', 'gallery']);

  $routes->connect('/large-view', ['controller' => 'Pages', 'action' => 'largeView', 'largeView']);

  $routes->fallbacks('DashedRoute');
});

Plugin::routes();

Router::scope('/admin', function ($routes) {

  /* Routes For Admin */
  Router::prefix('admin', function ($routes) {

    $routes->connect('/', ['controller' => 'Users', 'action' => 'login']);

    $routes->fallbacks('DashedRoute');


    $routes->connect('/dashboard', ['controller' => 'Dashboard', 'action' => 'index']);

    $routes->connect('/admins', ['controller' => 'users', 'action' => 'admin_index']);

    $routes->connect('/admins/add/*', ['controller' => 'users', 'action' => 'add_admin']);

    $routes->connect('/admins/edit/*', ['controller' => 'users', 'action' => 'edit_admin']);

    $routes->connect('/products/combinations/add/*', ['controller' => 'Products', 'action' => 'combinationsAdd']);

    $routes->connect('/admins/send-email', ['controller' => 'events', 'action' => 'sendEmail']);

    $routes->connect('/admins/send-sms', ['controller' => 'events', 'action' => 'sendSms']);
  });

  $routes->fallbacks('DashedRoute');
});

Plugin::routes();

Router::defaultRouteClass('Route');
