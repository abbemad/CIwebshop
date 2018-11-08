<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['posts/index'] = 'posts/index';
$route['posts/create'] = 'posts/create';
$route['posts/update'] = 'posts/update';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts'] = 'posts/index';

$route['products/index'] = 'products/index';
$route['products/create'] = 'products/create';
$route['products/update'] = 'products/update';
$route['products/(:any)'] = 'products/view/$1';
$route['products'] = 'products/index';

// $route['default_controller'] = 'pages/view';
$route['default_controller'] = 'User';

$route['categories'] = 'categories/index';
$route['categories/create'] = 'categories/create';
$route['categories/posts/(:any)'] = 'categories/posts/$1';
$route['categories/products/(:any)'] = 'categories/products/$1';

$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
