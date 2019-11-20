<?php

use MVC\Classes\Routing\Route;

/*
    TODO change this to object context rather than static
    - Change methods to post and get
    - then we can inject the Request Class into the Route Class

*/
//web routes will go in this file
//Route::set('about-us', 'AboutController@createView');
//Route::set('contact-us', 'ContactController@createView');

$route->set('about-us', 'AboutController@createView');