<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Usercontroller');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

/*
 *  LOGIN/REGISTER ROUTES
 */
$routes->match(['post', 'get'],'/', 'Loginregister\Logincontroller::login', ['filter' => 'guest']);
$routes->match(['post', 'get'],'register', 'Loginregister\Registercontroller::register', ['filter' => 'guest']);
$routes->match(['post', 'get'],'registercontinue', 'Loginregister\Registercontroller::registercontinue', ['filter' => 'guest']);
$routes->get('logout', 'Loginregister\Logincontroller::logout', ['filter' => 'logout']);

/*
 *  ADMIN ROUTES
 */
$routes->get('admin', function() {
    return redirect()->to('admin/challenges');
}, ['filter' => 'admin']);
$routes->group('admin', ['filter' => 'admin'], function ($routes) {
    $routes->get('challenges', 'Admin\Challengescontroller::allchallenges');
    $routes->post('deletechallenge/(:any)', 'Admin\Challengescontroller::deletechallenge/$1');
    $routes->get('trainers', 'Admin\Trainercontroller::alltrainers');
    $routes->post('deletetrainer/(:any)', 'Admin\Trainercontroller::deletetrainer/$1');
    $routes->get('users', 'Admin\Usercontroller::allusers');
    $routes->post('deleteuser/(:any)', 'Admin\Usercontroller::deleteuser/$1');
});

/*
 *  USER ROUTES
 */
$routes->get('user', function() {
    return redirect()->to('user/daily-log');
}, ['filter' => 'user']);
$routes->group('user', ['filter' => 'user'],function ($routes) {
    //DAILY LOG
    $routes->post('water', 'User\Dailylogcontroller::waterInput');
    $routes->post('training','User\Dailylogcontroller::trainingInput');
    $routes->post('food', 'User\Dailylogcontroller::foodInput');
    $routes->get('daily-log', 'User\Dailylogcontroller::dailyLog');
    $routes->get('cancel', 'User\Dailylogcontroller::cancel');
    $routes->add('charts', function() { return redirect()->to('user/charts/water'); });
    $routes->get('current-challenges', 'User\Currentchallengescontroller::currChallenges');
    $routes->post('acceptchallenge/(:any)', 'User\Currentchallengescontroller::acceptchallenge/$1');
    $routes->get('my-challenges', 'User\Mychallengescontroller::myChallenges');
    $routes->post('leavechallenge/(:any)', 'User\Mychallengescontroller::leavechallenge/$1');
    $routes->get('done-challenges', 'User\Donechallengescontroller::doneChallenges');
    $routes->post('likechallenge/(:any)', 'User\DonechallengesController::likechallenge/$1');
    $routes->add('charts/(:any)', 'User\Chartscontroller::chart/$1');
    //BADGES
    $routes->get('badges', 'User\Badgescontroller::allBadges');
    $routes->get('rank', 'User\Rankcontroller::allRegUsers');
    //MY ACCOUNT
});

/*
 *  TRAINER ROUTES
 */
$routes->get('trainer', function() {
    return redirect()->to('trainer/challenges');
}, ['filter' => 'trainer']);
$routes->group('trainer', ['filter' => 'trainer'], function ($routes) {
    $routes->get('challenges', 'Trainer\Currentchallengescontroller::index');
    $routes->get('make-new-challenge', 'Trainer\Newchallengecontroller::index');
    $routes->get('my-account', 'Trainer\Namechange::index');
});


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
