<?php

// Login Routes
$route['auth/login']                        = 'Login/login';
$route['auth/logout']                       = 'Login/logout';
$route['auth/48auth/login-as-agent/(:num)'] = 'Login/login_as_agent/$1';
