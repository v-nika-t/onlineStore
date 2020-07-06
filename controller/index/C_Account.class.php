<?php 

    class C_Account extends C_Base{

        function View(){ //страница личного кабинета

            session_start();
                $id_user=$_SESSION['idUser_rNzTWBtGEZNozETWvgM7'];

            $this->title="Личный кабинет";
            $this->fileName=$_SERVER['DOCUMENT_ROOT']."/templates/index/account.php";

            $connectBase=DatabaseQueries::getInstance();
                $this->content=$connectBase->Select("user",['id_user'=>$id_user]);
                $this->content=$this->content[0];
        
            $this-> render();
        
        }

        function Form(){//проверка входа в личный кабинет

            $_POST=parent::CheckForm($_POST);//проверка внесённых данных

            if($_POST['Войти'] && $_POST['user_login'] && $_POST['user_password'] ){

                $connectBase=DatabaseQueries::getInstance();
                    $result=$connectBase->Select('user',['user_login'=>$_POST['user_login']]);
                    $result=$result[0];

                if($result){ //есть user c данным логином

                    if(md5($_POST['user_password'].$result['salt']) == $result['user_password']){//совпадает  пароль введенный и с БД

                        session_start();

                        $_SESSION['idUser_rNzTWBtGEZNozETWvgM7']=$result['id_user'];
                        $_SESSION['userName_YTGn1t']=$result['user_name'];

                        parent::ChangeIdBasket();//поменяли в корзине с незарегистрированного на зарегистрированного пользователя

                    } else { //если пароль неверный

                          $answer='answer=Неверный пароль';

                    }

                } else {// пользователь не найден

                      $answer='answer=Пользователь не найден';

                }

            }else if($_POST['Войти'] && (!$_POST['user_login'] || !$_POST['user_password'])){//Не заполнено одно из полей

                 $answer='answer=Заполните все поля';

            } else { //Нажата кнопка  регистрации

                 $answer='form=registration';

            }

            if($answer){

             $user_data="&user_login=".$_POST['user_login']."&user_password=".$_POST['user_password'];
             $answer.=$user_data;

            }

            header('location: index.php?'.$answer);

        }

        function Registration(){ //регистрация

            $answer=parent::AddUser('user');

                if(!($answer == 'answer=Личный кабинет зарегистрирован')){

                   $answer.= '&form=registration';


                }

            header('location: index.php?'.$answer);

         }

        function Logout(){//Выход с личного кабинета

            session_start();
            session_destroy();
            session_abort();
            session_reset();

            header('location: index.php');
        
        }

    }


    ?>