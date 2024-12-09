<?php

$route['order/orders']                 = 'Order/list';
$route['order/orders/(:num)']          = 'Order/list/$1';
$route['order/new']                    = 'Order/list';
$route['order/new/(:num)']             = 'Order/list/$1';
$route['order/payment-history']        = 'Order/payment_history';
$route['order/payment-history/(:num)'] = 'Order/payment_history/$1';
$route['order/add-order']              = 'Order/add_order';
$route['order/view-order/(:num)']      = 'Order/view_order/$1';
$route['order/delete-order']           = 'Order/delete_order';
$route['order/export-retailers']       = 'Order/export_order';
$route['order/payment-receipt/(:num)'] = 'Order/payment_receipt/$1';
$route['order/update-order-status']    = 'Order/update_order_status';
