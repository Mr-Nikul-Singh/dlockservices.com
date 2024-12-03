<?php


// History Routes
$route['history/login-history']        = 'History/login_history';
$route['history/login-history/(:num)'] = 'History/login_history/$1';
$route['history/export-history']       = 'History/export_history';
$route['history/delete-login-history'] = 'History/delete_login_history';
$route['history/view-history/(:num)'] = 'History/view_history_details/$1';

