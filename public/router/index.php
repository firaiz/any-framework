<?php

use Firaiz\Ufl\Dispatcher;
use Firaiz\Ufl\Router\ClassRouter;

include_once '../front.init.php';
$router = Dispatcher::getInstance();
// simple router pattern
//$router->init();
//$router->add('/write/comment', function ($id, $comment = '') {
//    $user = 'anonymous';
//    switch ($id) {
//        case 1:
//            $user = 'foo';
//            break;
//        case 2:
//            $user = 'bar';
//            break;
//    }
//    echo $user, ' wrote a comment: ', $comment, PHP_EOL;
//});
//
//$router->add('/timeline', function ($mode) {
//    include_once '../Timeline.php';
//    $timeline = new Timeline();
//    $timeline->setMode($mode);
//    $timeline->execute();
//});

// class router pattern
$router->init(new ClassRouter());
// class route   e.g. /pdf -> Pdf::index, /pdf/to/foo/var -> Pdf::to(foo,bar)
$router->add('/pdf', 'Pdf');
// static route  e.g. /timeline -> no detect route, /timeline/show/foo/var -> Timeline::display(foo,bar)
//$router->add('/timeline/show', array('class' => \Service\Controller\Timeline::class, 'method' => 'display'));
$router->add('/timeline', \Service\Controller\Timeline::class);
// no detect route
$router->initNoRoute(function ($route) {
    echo 'no detected call-path:', $route;
});
$router->dispatch();