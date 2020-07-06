<?php

    class C_AddOrder extends C_Base{

        function View(){//страница добавить заказ

            $this->title="Добавить заказ" ;

            $this->fileName=$_SERVER['DOCUMENT_ROOT']."/templates/admin/orders/addOrder.php";

            $connectBase=DatabaseQueries::getInstance();

            $this->content=$connectBase->Select("goods","","`goods`.`nameGoods`,`goods`.`id_good`");
                $this-> render();

        }

        function Add(){ //Добавить заказ

            $_POST['email']=parent::CheckForm($_POST['email']);
            $_POST['id_goods']=parent::CheckForm($_POST['id_goods']);
            $_POST['count']=parent::CheckForm($_POST['count']);


            if($_POST['email']  && $_POST['id_goods'][0]){//если не пустые поля

                $connectBase=DatabaseQueries::getInstance();
                    $result=$connectBase->Select('user',['user_login'=>$_POST['email']]);

                if($result){//если пользователь есть в БД

                     $column='`id_orders`, `id_user` , `id_good` , `count` ,`id_order_status`';
                     $table='orders';

                     $reg_count='/^[0-9]+$/';

                     for($i=0 ; $i<count($_POST['id_goods']); $i++){//проверяем на регулярные выражения и составляем значения для внесения в БД

                         $result_reg=preg_match_all($reg_count,$_POST['count'][$i]);

                         if($_POST['id_goods'][$i] && $result_reg ){

                         $values[]= ",".$result[0]['id_user'].','.$_POST['id_goods'][$i].','.$_POST['count'][$i].',2';


                         } else if($_POST['id_goods'][$i] && !$result_reg ){//если не прошло проверку на регулярные выражения, то ставим  $flag

                               $answer="answer=Введите корретно количество&email=".$_POST['email'];
                               $flag='not';

                         }

                     }

                     if(!$flag){// если прошло проверку на реглулярные выражени

                         $resultTransaction=$connectBase->Transaction($table, $values , $column);

                         if($resultTransaction){

                             $answer="answer=Заказ оформлен";
                             $controller='OpenOrder';

                         } else {

                           $answer="answer=Заказ НЕ оформлен.Попробуйте еще раз";

                         }

                     }

                } else {

                      $answer="answer=Пользователь не найден&email=".$_POST['email'];

                }

            } else {

                   $answer="answer=Заполните данные&email=".$_POST['email'];

            }

            if(!$controller){

              $controller="AddOrder";

            }

            header('location: index.php?'.$answer.'&c='.$controller.'&act=View');

        }
    }
    
    
    
    
    
    
    
?>
