<?php 

    class C_AddUser extends C_Base{

        function View(){

             $this->title="Добавить пользователя" ;
             $this->fileName=$_SERVER['DOCUMENT_ROOT']."/templates/admin/users/addUser.php";

             $connectBase=DatabaseQueries::getInstance();
             $this-> render();
        
        }
    

        function  Add(){

             $answer=parent::AddUser('admin');

             if($answer == 'answer=Личный кабинет зарегистрирован'){

                 $answer.= '&c=ListUsers&act=View';

             } else {

                 $answer.='&c=AddUser&act=View';

             }

             header('location: index.php?'.$answer);

        }


    }

?>