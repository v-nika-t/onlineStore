<?php

class C_MainAdmin extends C_Base{

    function View(){//Главная страница

        $this->title="Главная" ;
        $this->fileName=$_SERVER['DOCUMENT_ROOT']."/templates/admin/main.php";
        
        $connectBase=DatabaseQueries::getInstance();
            $this->content=$connectBase->Select("goods","","`goods`.`nameGoods`");

        $this-> render();
        
    }

    function Form(){ //Форма чтобы залогиниться

        $connectBase=DatabaseQueries::getInstance();
            $result=$connectBase->Select('admin_user',['login'=>$_POST['login']]);
            $result=$result[0];

        if($result){

             $password=md5($_POST['password'].$result['salt']);
             if($password == $result['password']){

                  $_SESSION['id_user']=$result['id'];

             } else {

                     $answer="answer=Неверный пароль";

             };

        } else {

              $answer='answer=Пользователь не зарегистрирован';

        }

        if($answer){

           $data_user='&login='.$_POST['login'].'&password='.$_POST['password'];
           $answer.=$data_user;
        }

         header('location: index.php?'.$answer);

    }



    function Logout(){//Разлогиниться

        session_start();
        session_destroy();
        session_abort();
        session_reset();

        header('location: index.php?');
    }


}