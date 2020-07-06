<?php 


class C_Basket extends C_Base{

    function View(){ //Отображение страницы корзины

        session_start();

        $this->title="Корзина";
        $this->fileName=$_SERVER['DOCUMENT_ROOT']."/templates/index/basket.php";

        if($_SESSION['idUser_rNzTWBtGEZNozETWvgM7'] || $_COOKIE['id_basket']){
            
            if($_SESSION['idUser_rNzTWBtGEZNozETWvgM7']){

                $where= ["id_user"=>$_SESSION['idUser_rNzTWBtGEZNozETWvgM7']];
                                                        
            } else {

                  $where= ["id_basket"=>$_COOKIE['id_basket']];
                
            }
        
            $connectBase= DatabaseQueries::getInstance();
                $this->content=$connectBase->Select('basket',$where , "`basket`.`count`,`basket`.`id_good`, `goods`.`nameGoods`, `goods`.`prices`" , ['goods'=>['id_good','id_good']]);
                if($this->content){

                    foreach ($this->content as $array){
            
                        $this->vars['sum']+=$array['count']*$array['prices'];

                    }

                }


        }

        $this->render();

    }

     function Add(){ //Добавить заказ


        $id_good=$_GET['id_good'];
        session_start();

        $connectBase=DatabaseQueries::getInstance();

        if($_COOKIE['id_basket']  || $_SESSION['idUser_rNzTWBtGEZNozETWvgM7'] ){ //если есть товары в корзине или пользователь  зарегистрирован

            if($_COOKIE['id_basket']){

                $where=['id_basket'=>$_COOKIE['id_basket'],'id_good'=>$id_good ];
                $value=[$_COOKIE['id_basket'].', 3 ,'.$id_good.',1'];

            } else {

                  $where=['id_user'=>$_SESSION['idUser_rNzTWBtGEZNozETWvgM7'],'id_good'=>$id_good ];
                  $value=['0,'.$_SESSION['idUser_rNzTWBtGEZNozETWvgM7'].','.$id_good.',1'] ;
            
            }
        
            $result=$connectBase->Select('basket', $where);
        
            if($result){ //проверяем есть ли данный товар у пользователя/корзины в базе
             
                $connectBase->Update('basket','count','count+1',$where);
                $answer="Товар  добавлен в корзину";

            } else {

                  $connectBase->Insert('basket','`id_basket`, `id_user` ,`id_good`,`count`', $value);
                  $answer="Товар  добавлен в корзину";

                   }

        } else { //если нет товаров в корзине или пользователь не зарегистрирован

              $table='basket';
              $values[]=', 3 ,'.$id_good.",1";
              $column="`id_basket`,`id_user`,`id_good`,`count`";

              $resultTransaction=$connectBase->Transaction($table, $values , $column);

              if($resultTransaction){

              setcookie('id_basket', $resultTransaction, time()+3600 * 24*30);

              $answer="Товар  добавлен в корзину";

              } else {

                    $answer="Товар НЕ добавлен в корзину.Произошла ошибка";

              }

        }

        header('location: index.php?answer='.$answer.'&c='.$_GET['ReturnView'].'&act=View&id_good='.$_GET['id_good']);

    }

   function CheckOut(){//Оформить заказ
        
       session_start();

       if($_SESSION['idUser_rNzTWBtGEZNozETWvgM7']){//если пользователь зарегистрирован

           foreach($_POST as $key=>$array){

               $values[]=",".$_SESSION['idUser_rNzTWBtGEZNozETWvgM7'].','.$key.','.$array.',2';

           }

           $table='orders';
           $column='`id_orders`,`id_user`,`id_good`,`count`,`id_order_status`';

           $connectBase=DatabaseQueries::getInstance();
           $resultTransaction=$connectBase->Transaction($table,$values,$column);

           if($resultTransaction){


               $connectBase->Delete('basket',['id_user'=>$_SESSION['idUser_rNzTWBtGEZNozETWvgM7']]);
               $answer="Заказ оформлен";

           } else {

            $answer="Заказ НЕ оформлен.Попробуйте еще раз";

           }


       } else { //если пользователь не зарегистрирован

             $answer="Зайдите в личный кабинет или зарегистрируйтесь";

       }

       header('location: index.php?answer='.$answer.'&c=Basket&act=View');
   }
        
   function Delete(){ //Удалить товар из корзины

       $id_good=$_GET['id_good'];

       if($_COOKIE['id_basket']){

           $where=['id_basket'=>$_COOKIE['id_basket'], 'id_good'=>$id_good];

       } else {

         session_start();
         $where=['id_user'=>$_SESSION['idUser_rNzTWBtGEZNozETWvgM7'], 'id_good'=>$id_good];

       }

       $connectBase=DatabaseQueries::getInstance();
           $result=$connectBase->Delete('basket',$where);

       if($result){

           $answer="Товар удален";
       } else {

             $answer="НЕ удалено. Попробуйте ещё раз";

       }

       header('location: index.php?answer='.$answer.'&c=Basket&act=View');

   }

        
    

}


?>