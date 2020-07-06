<?php 

    class C_Main extends C_Base {

        function View(){
    
            session_start();

                $this->title="Главная";
                $this->fileName=$_SERVER['DOCUMENT_ROOT']."/templates/index/main.php";

                $connectBase=DatabaseQueries::getInstance();
                $this->content=$connectBase->Select('goods');
                $this-> render();

        }
     
    }
     




?>