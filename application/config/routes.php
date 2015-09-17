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

$route['default_controller'] = "home";
$route['404_override'] = '';
$route['dashboard/curriculums'] = "dashboard_curriculums";
$route['dashboard/settings'] = "dashboard_settings";

$route['dashboard/curriculums/list'] = "dashboard_curriculums/curriculum_list";
$route['dashboard/curriculums/(:num)'] = "dashboard_curriculums/curriculum_info/$1";
$route['dashboard/curriculums/(:num)/edit'] = "dashboard_curriculums/edit_curriculum_info/$1";
$route['dashboard/curriculums/(:num)/delete'] = "dashboard_curriculums/delete_curriculum_info/$1";

$route['dashboard/curriculums/(:num)/subjects'] = "dashboard_curriculums/curriculum_subjects/$1";
$route['dashboard/curriculums/(:num)/subjects/add'] = "dashboard_curriculums/add_curriculum_subject/$1";
$route['dashboard/curriculums/(:num)/subjects/(:num)/edit'] = "dashboard_curriculums/edit_curriculum_subject/$1/$2";
$route['dashboard/curriculums/(:num)/subjects/(:num)/delete'] = "dashboard_curriculums/delete_curriculum_subject/$1/$2";
$route['dashboard/curriculums/(:num)/subjects/(:num)'] = "dashboard_curriculums/curriculum_subject_info/$1/$2";
$route['dashboard/curriculums/(:num)/subjects/(:num)/classtypes/add'] = "dashboard_curriculums/add_curriculum_subject_type/$1/$2";
$route['dashboard/curriculums/(:num)/subjects/(:num)/classtypes/(:num)/edit'] = "dashboard_curriculums/edit_curriculum_subject_type/$1/$2/$3";
$route['dashboard/curriculums/(:num)/subjects/(:num)/classtypes/(:num)/delete'] = "dashboard_curriculums/delete_curriculum_subject_type/$1/$2/$3";

$route['dashboard/curriculums/information'] = "dashboard_curriculums/curriculum_info";
$route['dashboard/curriculums/create'] = "dashboard_curriculums/curriculum_create";
$route['dashboard/curriculums/settings'] = "dashboard_curriculums/curriculum_settings";


$route['dashboard/curriculums/settings/types'] = "dashboard_curriculums/curriculum_types_settings";
$route['dashboard/curriculums/settings/types/add'] = "dashboard_curriculums/add_curriculum_type";
$route['dashboard/curriculums/settings/types/(:num)'] = "dashboard_curriculums/edit_curriculum_type/$1";
$route['dashboard/curriculums/settings/types/(:num)/edit'] = "dashboard_curriculums/edit_curriculum_type/$1";
$route['dashboard/curriculums/settings/types/(:num)/delete'] = "dashboard_curriculums/delete_curriculum_type/$1";


$route['dashboard/curriculums/settings/classtypes'] = "dashboard_curriculums/curriculum_settings_classtypes";
$route['dashboard/curriculums/settings/classtypes/add'] = "dashboard_curriculums/curriculum_settings_add_classtype";
$route['dashboard/curriculums/settings/classtypes/(:num)'] = "dashboard_curriculums/curriculum_settings_classtype_info/$1";
$route['dashboard/curriculums/settings/classtypes/(:num)/edit'] = "dashboard_curriculums/curriculum_settings_edit_classtype/$1";
$route['dashboard/curriculums/settings/classtypes/(:num)/delete'] = "dashboard_curriculums/curriculum_settings_delete_classtype/$1";

$route['dashboard/curriculums/settings/subjects'] = "dashboard_curriculums/curriculum_settings_subjects";
$route['dashboard/curriculums/settings/subjects/add'] = "dashboard_curriculums/curriculum_settings_add_subject";
$route['dashboard/curriculums/settings/subjects/(:num)'] = "dashboard_curriculums/curriculum_settings_subject/$1";
$route['dashboard/curriculums/settings/subjects/(:num)/edit'] = "dashboard_curriculums/curriculum_settings_edit_subject/$1";
$route['dashboard/curriculums/settings/subjects/(:num)/delete'] = "dashboard_curriculums/curriculum_settings_delete_subject/$1";

$route['dashboard/curriculums/settings/yearlevels'] = "dashboard_curriculums/curriculum_settings_yearlevels";
$route['dashboard/curriculums/settings/yearlevels/add'] = "dashboard_curriculums/curriculum_settings_add_yearlevel";
$route['dashboard/curriculums/settings/yearlevels/(:num)'] = "dashboard_curriculums/curriculum_settings_yearlevel/$1";
$route['dashboard/curriculums/settings/yearlevels/(:num)/edit'] = "dashboard_curriculums/curriculum_settings_edit_yearlevel/$1";
$route['dashboard/curriculums/settings/yearlevels/(:num)/delete'] = "dashboard_curriculums/curriculum_settings_delete_yearlevel/$1";

$route['dashboard/curriculums/settings/courses'] = "dashboard_curriculums/curriculum_settings_courses";
$route['dashboard/curriculums/settings/courses/add'] = "dashboard_curriculums/curriculum_settings_add_course";
$route['dashboard/curriculums/settings/courses/(:num)'] = "dashboard_curriculums/curriculum_settings_course/$1";
$route['dashboard/curriculums/settings/courses/(:num)/edit'] = "dashboard_curriculums/curriculum_settings_edit_course/$1";
$route['dashboard/curriculums/settings/courses/(:num)/delete'] = "dashboard_curriculums/curriculum_settings_delete_course/$1";

$route['dashboard/curriculums/settings/majors'] = "dashboard_curriculums/curriculum_settings_majors";
$route['dashboard/curriculums/settings/majors/add'] = "dashboard_curriculums/curriculum_settings_add_major";
$route['dashboard/curriculums/settings/majors/(:num)'] = "dashboard_curriculums/curriculum_settings_major/$1";
$route['dashboard/curriculums/settings/majors/(:num)/edit'] = "dashboard_curriculums/curriculum_settings_edit_major/$1";
$route['dashboard/curriculums/settings/majors/(:num)/delete'] = "dashboard_curriculums/curriculum_settings_delete_major/$1";

$route['dashboard/curriculums/settings/semesters'] = "dashboard_curriculums/curriculum_settings_semesters";
$route['dashboard/curriculums/settings/semesters/add'] = "dashboard_curriculums/curriculum_settings_add_semester";
$route['dashboard/curriculums/settings/semesters/(:num)'] = "dashboard_curriculums/curriculum_settings_semester/$1";
$route['dashboard/curriculums/settings/semesters/(:num)/edit'] = "dashboard_curriculums/curriculum_settings_edit_semester/$1";
$route['dashboard/curriculums/settings/semesters/(:num)/delete'] = "dashboard_curriculums/curriculum_settings_delete_semester/$1";

/* End of file routes.php */
/* Location: ./application/config/routes.php */