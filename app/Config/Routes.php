<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}


$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);



$routes->group('{locale}', function ($routes){

    $routes->match(['get','post'],'/', 'Home::index');

    if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
    {
        require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
    }

    if (file_exists(APPPATH . 'Routes/admin.php'))
    {
        require APPPATH . 'Routes/admin.php';
    }

    if (file_exists(APPPATH . 'Routes/web.php'))
    {
        require APPPATH . 'Routes/web.php';
    }

    if (file_exists(APPPATH . 'Routes/api.php'))
    {
        require APPPATH . 'Routes/api.php';
    }

});

if (file_exists(APPPATH . 'Routes/install.php'))
{
    require APPPATH . 'Routes/install.php';
}