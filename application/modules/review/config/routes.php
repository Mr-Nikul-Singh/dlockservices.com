<?php

// Review Routes
$route['review/reviews']            = 'Review/index';
$route['review/reviews/(:num)']     = 'Review/index/$1';
$route['review/add-review']         = 'Review/add_review';
$route['review/edit-review/(:num)'] = 'Review/edit_review/$1';
$route['review/delete-review']      = 'Review/delete_review';
