<?php

    abstract class C_Base extends C_Controller {

        protected $title;//Заголовок
        protected $fileName;//Имя шаблона
        protected $content;
        protected $vars;
    
        function render(){

            $this->vars['title']=$this->title;
            $this->vars['content']=$this->content;
            $page=$this->Template($this->fileName, $this->vars);
            echo  $page;
    
    }
    
                                           
        function  ChangeIdBasket(){//Изменить IdBasket на IdUser при регистрации в корзине

            if($_COOKIE['id_basket']){
        
                session_start();
                    $id_user=$_SESSION['idUser_rNzTWBtGEZNozETWvgM7'];

                $connectBase=DatabaseQueries::getInstance();
                    $connectBase->Update('basket',['`id_user`','`id_basket`'], [$id_user , 0] ,['id_basket'=>$_COOKIE['id_basket']]);

                setcookie ("id_basket", "");

            }

        }

        function ChangeUserDate($id_user){//Изменение данных пользователя

            $_POST=parent::CheckForm($_POST);

            $result_regular=parent::Regular($_POST['user_login'],$_POST['user_telephone'],$_POST['user_name']);//проверка данных регулярными выражениями

            if(!$result_regular){//если проверка регулярными выражениями НЕ нашла ошибку


                $connectBase=DatabaseQueries::getInstance();
                    $result=$connectBase->Select('user',['id_user'=>$id_user]);
                    $result=$result[0];

                $newResult=$connectBase->Select('user',['user_login'=>$_POST['user_login']]);
                     $newResult=$newResult[0];


                if($newResult){//проверка на наличие в БД нового email

                    if($result['user_login'] == $newResult['user_login']){//исключаем текущего user

                        $flag= "true";

                    } else {

                          $flag= "";

                    }

                } else {

                      $flag= "true";
                }

                if($flag){//Если такого email нет, то вносим изменения

                    $name_column=['`user_name`','`user_adress`', '`user_login`', '`user_password`' , '`user_telephone`'];
                    $password=md5($_POST['user_password'].$result['salt']);
                    $value=[$_POST['user_name'],$_POST['user_adress'],$_POST['user_login'],$password,$_POST['user_telephone']];

                    $result=$connectBase->Update('user',$name_column, $value, ['id_user'=>$id_user] );

                    if($result){

                       $answer='answer=Информация изменена';

                    } else {

                           $answer='answer=Информация не изменена. Попробуйте ещё раз';
                    }

                } else {

                       $answer='answer=Пользователь с таким логином уже существует';

                }

            } else { //если проверка регулярными выражениями нашла ошибку

                  $length=count($result_regular)-1;
                  $i=0;

                  foreach($result_regular as $array){

                      if($i == $length){

                          $answer.= $array;

                      } else {

                            $answer.= $array.",";

                      }

                      $i++;

                  }

                  $answer='answer=Введите корректно '.$answer;


            }

            return $answer;

        }

        function AddUser($who){//$who- если это регистрация самими пользователем, то == user, если админам, то == admin

            $_POST=parent::CheckForm($_POST);

            if($_POST['user_name'] &&  $_POST['user_adress'] && $_POST['user_login'] && $_POST['user_password'] && $_POST['user_telephone']){//если все данные заполнены

                $result_regular=parent::Regular($_POST['user_login'],$_POST['user_telephone'],$_POST['user_name']);//проверка данных регулярными выражениями

                if($result_regular){

                    $length=count($result_regular)-1;
                    $i=0;

                    foreach($result_regular as $array){

                        if($i == $length){

                            $answer.= $array;
                        } else {

                            $answer.= $array.",";

                        }

                        $i++;

                    }

                    $answer='answer=Введите корректно '.$answer;

                } else {

                    $connectBase=DatabaseQueries::getInstance();
                        $result=$connectBase->Select('user',['user_login'=>$_POST['user_login']]);//есть ли в базе user c данным логином
                        $result=$result[0];

                    if(!$result){// если нет юзера, c данным логином, то даем задание на внесение в БД

                        $connectBase=DatabaseQueries::getInstance();

                            $salt=parent::generateSalt();
                            $password=md5($_POST['user_password'].$salt);

                            $name_column='`user_name`,`user_adress`, `user_login`, `user_telephone`, `user_password` , `salt`';
                            $value_column= ["'".$_POST['user_name']."','".$_POST['user_adress']."','".$_POST['user_login']."','".$_POST['user_telephone']."','".$password."','".$salt."'"];

                            $b=$connectBase->Insert('user',$name_column , $value_column );

                            if($who == 'user'){

                                $result=$connectBase->Select('user',['user_login'=>$_POST['user_login']]);
                                $result=$result[0];

                                session_start();
                                    $_SESSION['idUser_rNzTWBtGEZNozETWvgM7']=$result['id_user'];
                                    $_SESSION['userName_YTGn1t']=$result['user_name'];
                                    $this->ChangeIdBasket();

                            }

                        $answer='answer=Личный кабинет зарегистрирован';
                        $flag=true;

                    } else {//если есть юзер, c данным логином

                          $answer='answer=Пользователь уже зарегистрирован';

                    }

                }

            } else {//Если есть пустые поля

                  $answer='answer=Заполните все поля';

            }

            if(!$flag){

                $user_data="&user_login=".$_POST['user_login']."&user_password=".$_POST['user_password']."&user_adress=".$_POST['user_adress'];
                    $user_data.="&user_name=".$_POST['user_name']."&user_telephone=".$_POST['user_telephone'];

                $answer.=$user_data;
            }


            return $answer;
        }

    }

