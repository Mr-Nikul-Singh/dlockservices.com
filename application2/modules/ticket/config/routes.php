<?php

// Ticket Routes
$route['ticket/tickets']            = 'Ticket/index';
$route['ticket/tickets/(:num)']     = 'Ticket/index/$1';
$route['ticket/add-ticket']         = 'Ticket/add';
$route['ticket/edit-ticket/(:num)'] = 'Ticket/edit/$1';
$route['ticket/delete-ticket']      = 'Ticket/delete';
$route['ticket/view/(:num)']        = 'Ticket/view/$1';
$route['ticket/add-reply/(:num)']   = 'Ticket/add_reply/$1';