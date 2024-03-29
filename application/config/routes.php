<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'Home_Controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route["home"] = "Home_Controller/index";
$route["indotaku/s-f"] = "Home_Controller/index";
$route["indotaku/s-f/([0-9]*)"] = "Home_Controller/index/$1";


$route["indotaku/clear-filter"] = "Home_Controller/clear_filter_session";

$route["indotaku/daftar-komik"] = "Home_Controller/comic_lists";
$route["indotaku/daftar-komik/s-f"] = "Home_Controller/comic_lists";
$route["indotaku/daftar-komik/s-f/([0-9]*)"] = "Home_Controller/comic_lists/$1";


$route["indotaku/find"] =  "Home_controller/search_comic/";

$route["indotaku/chapter/([a-zA-Z 0-9 \-.]*)"] = "Comic_controller/get_comic_chapter/$1";
$route["indotaku/komik/([a-zA-Z 0-9 \-]*)"] =   function ($comic_slug) {
   return 'comic_controller/get_comic/' . $comic_slug;
};
