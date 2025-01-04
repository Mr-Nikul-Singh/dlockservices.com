<?php


// Blog Routes
$route['blog/add-blog-category']         = 'Category/add_category';
$route['blog/edit-blog-category/(:num)'] = 'Category/edit_category/$1';
$route['blog/blog-categories']           = 'Category/list';
$route['blog/categories/(:num)']         = 'Category/categories/$1';
$route['blog/delete-blog-category']      = 'Category/delete_blog_category';

$route['blog/blogs']                  = 'Blog/list';
$route['blog/posts/(:num)']           = 'Blog/list/$1';

$route['blog/add-blog']               = 'Blog/add_blog';
$route['blog/edit-blog/(:num)']       = 'Blog/edit_blog/$1';
$route['history/export-history']      = 'History/export_history';
$route['blog/delete-post']            = 'Blog/delete_blog_post';
$route['history/view-history/(:num)'] = 'History/view_history_details/$1';
