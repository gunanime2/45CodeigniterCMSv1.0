<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['process_register'] = 'public_controller/process_register';
$route['register'] = 'public_controller/register';
$route['login'] = 'public_controller/login';
$route['logout'] = 'main_controller/logout';

$route['install'] = 'install_controller';
$route['install/start_install'] = 'install_controller/start_install';

$route['dashboard'] = 'main_controller/dashboard';
$route['admin']	= 'public_controller/login';
$route['create'] = 'main_controller/create';
$route['create/process_create'] = 'main_controller/process_create';
$route['delete/(:any)'] = 'main_controller/delete/$1';
$route['update/(:any)'] = 'main_controller/update/$1';
$route['(:any)'] = 'public_controller/read/$1';

$route['update/image_remove'] = 'main_controller/image_remove';
$route['update/update_new_image'] = 'main_controller/update_new_image';
$route['update/update_post'] = 'main_controller/update_post';

//default_controller must be set to 'install_controller' before starting installation
//then set to 'public_controller' after installation
$route['default_controller'] = 'install_controller'; 
$route['not_found'] = 'public_controller/not_found';
$route['404_override'] = 'public_controller/not_found';


/* End of file routes.php */
/* Location: ./application/config/routes.php */