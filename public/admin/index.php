<?php

    session_start();

    require_once($_SERVER['DOCUMENT_ROOT']."/Autoloader.class.php");
    Autoloader::register();

    if(!$_SESSION['id_user']){

        if($_GET['act'] == 'Form'){

            $b = new C_MainAdmin();
                $b->Form();

        } else {

              $b = new C_MainAdmin();
              $b->View();
        }

    } else {

          if($_GET['c'] && $_GET['act']){

              $class='C_'.$_GET['c'];
              $object= new $class();

              $method=$_GET['act'];
              $object->$method();

          } else {

                $b = new C_MainAdmin();
                $b->View();
          }

    }



   ?>