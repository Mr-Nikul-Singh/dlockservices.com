<?php


// Subscriptions
$route['subscription/plans']                  = 'Subscription/plans';
$route['subscription/add-plan']               = 'Subscription/add_plan';
$route['subscription/edit-plan/(:num)']       = 'Subscription/edit_plan/$1';
$route['subscription/delete-plan']            = 'Subscription/delete_plan';
$route['subscription/payment-history']        = 'Subscription/payment_history';
$route['subscription/payment-history/(:num)'] = 'Subscription/payment_history/$1';
$route['subscription/plan-details/(:num)']    = 'Subscription/get_plan_details/$1';
$route['subscription/check-plan-price']       = 'Subscription/check_plan_price';
$route['subscription/update-order']           = 'Subscription/update_order_id';
$route['subscription/configurations']         = 'Subscription/configurations';
$route['subscription/add-configurations']     = 'Subscription/add_configurations';

 