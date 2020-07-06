<?php

require_once('app/autoload.php');

$url = $_SERVER['REQUEST_URI'];

$url = explode('/',$url);

if(file_exists('controller/'.$url[2].'Controller.php')){

    require_once('controller/'.$url[2].'Controller.php');

    $url[2] = ucfirst($url[2]).'Controller';

    if(class_exists($url[2])){
        $c = new $url[2]();
        // var_dump($url[2]);
        // die;
        if (isset($url[3])) {
            if(method_exists($url[2],$url[3])){
                try {
                    if (isset($url[4])) {
                        $c->{$url[3]}($url[4]);
                    } else {
                        $c->{$url[3]}();
                    }
                } catch (ArgumentCountError $argc) {
                    $error = 'Ce Fonction a des parametres';
                    require_once('view/erreur/404.php');
                }
            }else {
                $error = "la methode ".$url[3]." n'existe pas ";
                require_once('view/erreur/404.php');
            }
        } else {
            if (method_exists($url[2],"liste")) {
                $c->liste();
            } else {
                $error = "Pas de view correspondant";
                require_once('view/erreur/404.php');
            }
        }
    }else{
        $error = "La Class ".$url[2]." n'existe pas";
        require_once('view/erreur/404.php');
    }

} else {
    $error = "Le controller ".$url[2]." n'existe pas";
    require_once('view/erreur/404.php');
}