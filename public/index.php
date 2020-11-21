<?php
require '../vendor/autoload.php';
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
$router = new AltoRouter();
$router->map('GET', '/', 'login');
// composer
$router->map('GET | POST' , '/home', 'home');
$router->map('GET', '/indexM', 'indexM');
$router->map('GET', '/checkApp', 'checkApp');
 $router->map('GET | POST', '/modifyDocperso', 'modifyDocperso');
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
$router->map('GET | POST', '/biochimie', 'biochimie');
$router->map('GET | POST', '/hemobiologie', 'hemobiologie');
$router->map('GET | POST', '/serologie', 'serologie');
$router->map('GET | POST', '/hemoglobine', 'hemoglobine');
$router->map('GET | POST', '/segmentation', 'segmentation');
$router->map('GET | POST', '/parasitologie', 'parasitologie');
$router->map('GET | POST', '/emergency', 'emergency');
$router->map('GET | POST', '/gestation', 'gestation');
$router->map('GET', '/passRegeneration', 'passRegeneration');
$router->map('GET | POST', '/teleconsult', 'teleconsult');
$router->map('GET | POST', '/showResult', 'showResult');
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
    elseif ($match['target'] === 'hemobiologie') {
        require "analyse/{$match['target']}.php";
    }
    elseif ($match['target'] === 'gestation') {
        require "analyse/{$match['target']}.php";
    }
    elseif ($match['target'] === 'info') {
        require "{$match['target']}.php";
    }elseif ($match['target'] === 'blog') {
        require "{$match['target']}.php";
    } elseif ($match['target'] === 'home') {
        require "{$match['target']}.php";
 
    }
     
    elseif ($match['target'] === 'modifyDocperso') {
        require "{$match['target']}.php";
 
    }
    elseif ($match['target'] === 'emergency') {
        require "{$match['target']}.php";
 
    }
    elseif ($match['target'] === 'teleconsult') {
        require "{$match['target']}.php";
 
    }
    elseif ($match['target'] === 'showResult') {
        require "{$match['target']}.php";
 
    }
    elseif ($match['target'] === 'indexM') {
        require "{$match['target']}.php";
 
    }
    elseif ($match['target'] === 'checkApp') {
        require "{$match['target']}.php";
 
    }
    elseif ($match['target'] === 'biochimie') {
        require "analyse/{$match['target']}.php";
 
    }
    elseif ($match['target'] === 'segmentation') {
        require "analyse/{$match['target']}.php";
 
    }
    elseif ($match['target'] === 'serologie') {
        require "analyse/{$match['target']}.php";
 
    }
    elseif ($match['target'] === 'hemoglobine') {
        require "analyse/{$match['target']}.php";
 
    }
    elseif ($match['target'] === 'parasitologie') {
        require "analyse/{$match['target']}.php";
 
    }elseif ($match['target'] === null) {
        require 'error.php';
    }
     else {
        require "../login/{$match['target']}.php";
    }
}
 