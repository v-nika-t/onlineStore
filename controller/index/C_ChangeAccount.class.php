<?php 

    class C_ChangeAccount extends C_Base{

        function View(){//страница изменения данных

            session_start();
                $id_user=$_SESSION['idUser_rNzTWBtGEZNozETWvgM7'];

            $this->fileName=$_SERVER['DOCUMENT_ROOT']."/templates/index/changeAccount.php";

            $connectBase=DatabaseQueries::getInstance();
                $this->content=$connectBase->Select("user",['id_user'=>$id_user]);
                $this->content=$this->content[0];
        
            $this->title=$this->content["user_name"];
        
            $this-> render();
        
        }
    
    
        function Change(){//Изменение данных пользователя

            session_start();
                 $id_user=$_SESSION['idUser_rNzTWBtGEZNozETWvgM7'];

            $answer= parent:: ChangeUserDate($id_user);

            if($answer == 'answer=Информация изменена'){

                $connectBase=DatabaseQueries::getInstance();
                    $result=$connectBase->Select("user",['id_user'=>$id_user]);

                $_SESSION['userName_YTGn1t']=$result[0]['user_name'];

            }

            header('location: index.php?'.$answer.'&c=ChangeAccount&act=View');

        }
    

    }


    ?>