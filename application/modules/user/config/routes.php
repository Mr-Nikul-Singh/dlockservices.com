<?php



// User Routes & Role Management
$route['user/users']              = 'Users/users';
$route['user/users/(:num)']       = 'Users/users/$1';
$route['user/add-user']           = 'Users/add_user';
$route['user/edit-user/(:num)']   = 'Users/edit_user/$1';
$route['user/view-user/(:num)']   = 'Users/view_user/$1';
$route['user/login-access']       = 'Users/login_access';
$route['delete-access']           = 'Users/delete_access';
$route['user/fetch-roles/(:num)'] = 'Users/get_create_users_underLevel/$1';


$route['user/roles']                       = 'Users/add_role';
$route['user/roles/(:num)']                = 'Users/add_role/$1';
$route['user/assingn-function']            = 'Users/add_role';
$route['user/assign-functionality/(:num)'] = 'Users/assign_functionality/$1';
$route['user/permissions/(:num)']          = 'Users/permissions/$1';

$route['user/modules-access-by-role'] = 'Users/modules_access_by_role';
$route['user/menu-permission-access'] = 'Users/menu_permission_access';
$route['user/menu-permissions']       = 'Users/menu_permissions';
$route['user/modules-access']       = 'Users/modules_access';

// $route['export-users']        = 'User/export_users';

