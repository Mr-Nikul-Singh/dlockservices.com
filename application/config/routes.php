<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller']   = 'Home/index';
$route['404_override']         = 'Home/error_404';
$route['translate_uri_dashes'] = FALSE;

$route['login']           = 'Auth/login';
$route['logout']          = 'Auth/logout';
$route['flogout']         = 'Auth/front_end_logout';
$route['registration']    = 'Auth/registration';
$route['forgot-password'] = 'Auth/forgot_password';

$route['home']              = 'Home/index';
$route['my-account']        = 'Account/my_account';
$route['view-order/(:num)'] = 'Account/view_orders/$1';
$route['about']             = 'Home/about';
$route['faq']               = 'Home/faq';
$route['contact-us']        = 'Home/contact_us';
$route['submit-contact']    = 'Home/submit_contact';
$route['plans']             = 'Home/plans';
$route['privacy']           = 'Home/privacy';
$route['terms']             = 'Home/terms';
$route['refund-policy']     = 'Home/refund_policy';
$route['disclaimer']        = 'Home/disclaimer';
$route['blog']              = 'Blog/blog';
$route['blog-view/(:any)']  = 'Blog/view_blog/$1';
$route['sitemap.xml']       = 'Home/sitemap';
$route['save-address']      = 'Account/save_address';
$route['save-info']         = 'Account/save_info';
$route['update-password']   = 'Account/update_password';
$route['support-center']    = 'Support/support_center';

$route['vps-servers']            = 'Server/vps_server';
$route['cloud-servers']          = 'Server/cloud_server';
$route['dedicated-server']       = 'Server/dedicated_server';
$route['billing-details/(:num)'] = 'Billing/billing_details/$1';


// Dashboard Routes
$route['dashboard']           = 'dashboard/Dashboard';
$route['update-setting']      = 'Utility/update_setting';
$route['utility/bulk-delete'] = 'Utility/bulk_delete';


  //============//
 // API\V1.2.0 /////////////////////////////////////////////////
//============//                                            __/
$route['api/v1.2.0/authenticate']      = 'Api/login';
$route['api/v1.2.0/login']             = 'Api/login_with_EP';
$route['api/v1.2.0/login-with-mobile'] = 'Api/login_with_mobile';
$route['api/v1.2.0/registration']      = 'Api/registration';
$route['api/v1.2.0/update-profile']    = 'Api/update_profile';
$route['api/v1.2.0/update-password']   = 'Api/update_password';
$route['api/v1.2.0/login-history']     = 'Api/login_history';