<?php

// Setting Routes
$route['setting/change-password']          = 'Setting/change_password';
$route['setting']                          = 'Setting/settings';
$route['setting/smtp-setting']             = 'Setting/smtp_setting';
$route['setting/smtp-setting/(:num)']      = 'Setting/smtp_setting/$1';
$route['setting/add-smtp']                 = 'Setting/add_smtp';
$route['setting/edit-smtp/(:num)']         = 'Setting/edit_smtp/$1';
$route['setting/delete-smtp']              = 'Setting/delete_smtp';
$route['setting/update-leads-permissions'] = 'Setting/update_leads_permissions';
$route['setting/profile-details']          = 'Setting/profile_details';
$route['setting/profile-update']           = 'Setting/profile_update';
$route['setting/generate-secret-pin']      = 'Setting/generate_secret_pin';


$route['setting/site-settings'] = 'MetaSettings/settingofsite';
$route['setting/save-setting'] = 'MetaSettings/save';
