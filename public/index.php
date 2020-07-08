<?php
require '../vendor/autoload.php';
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
$router = new AltoRouter();
$router->map('GET', '/', 'login');
// composer
$router->map('GET', '/home', 'home');
// $router->map('GET', '/homeP', 'homeP');
$router->map('GET', '/contact', 'contact');
$router->map('GET | POST', '/addInfo', 'addInfo');
$router->map('GET', '/info', 'info');
$router->map('POST | GET', '/signIn', 'signIn');
$router->map('POST | GET', '/signUp', 'signUp');
$router->map('GET', '/test', 'test');
$router->map('GET', '/Doctors', 'Doctors');
$router->map('GET', '/about', 'about');
$router->map('GET', '/Department', 'Department');
$router->map('GET', '/elements', 'elements');
$router->map('GET', '/blog', 'blog');
$router->map('GET', '/single-blog', 'single-blog');
$router->map('GET', '/passRegeneration', 'passRegeneration');
$match = $router->match();
if ($match !== null) {
    if (is_callable($match['target'])) {
        call_user_func_array($match['target'], $match['params']);
    } elseif ($match['target'] === 'contact') {
        require "../vue/contact/{$match['target']}.php";
    } elseif ($match['target'] === 'passRegeneration') {
        require "../login/{$match['target']}.php";
    } elseif ($match['target'] === 'Doctors') {
        require "{$match['target']}.php";
    } elseif ($match['target'] === 'about') {
        require "{$match['target']}.php";
    } elseif ($match['target'] === 'Department') {
        require "{$match['target']}.php";
    } elseif ($match['target'] === 'elements') {
        require "{$match['target']}.php";
    }
    elseif ($match['target'] === 'addInfo') {
        require "{$match['target']}.php";
    } elseif ($match['target'] === 'single-blog') {
        require "{$match['target']}.php";
    } 
    elseif ($match['target'] === 'info') {
        require "{$match['target']}.php";
    }elseif ($match['target'] === 'blog') {
        require "{$match['target']}.php";
    } elseif ($match['target'] === 'home') {
        require "{$match['target']}.php";
    // } elseif ($match['target'] === 'homeP') {
    //     require "{$match['target']}.php";
    // } elseif ($match['target'] === 'signUp') {
    //     require "{$match['target']}.php";
    // } elseif ($match['target'] === 'home') {
        // require "../login/{$match['target']}.php";
    } elseif ($match['target'] === null) {
        require 'error.php';
    } else {
        require "../login/{$match['target']}.php";
    }
}

// if ($match !== null) {
//    $target=$match['target'];
//    switch ($target) {
//        case 'home':
//         require "{$match['target']}.php";
//            break;
//            case empty($match['target']):
//             require "error.php";
//                break;

//        default:
//        require "../login/login.php";
//            break;
//    }

// }
