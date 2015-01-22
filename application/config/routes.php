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

$route['default_controller'] = "pages";
$route['about_us'] = "pages/about_us";
$route['contact'] = "pages/contact";
$route['testimonial'] = "pages/testimonial";
$route['samples'] = "pages/samples";
$route['chat'] = "pages/chat";
$route['privacy'] = "pages/privacy";
$route['terms'] = "pages/terms";
$route['registration'] = "pages/registration";

$route['login'] = "pages/login";
$route['dashboard'] = "pages/dashboard";
$route['blank'] = "pages/blank";
$route['search'] = "pages/search";
$route['add_user'] = "pages/add_user";
$route['add_client'] = "pages/add_client";

$route['submit_assignment'] = "pages/submit_assignment";
$route['404_override'] = 'error';


/* End of file routes.php */
/* Location: ./application/config/routes.php */	