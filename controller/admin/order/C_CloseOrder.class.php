<?php 

    class C_CloseOrder extends C_Base {

        function View(){

            $this->title="Закрытые закзазы" ;
            $this->fileName=$_SERVER['DOCUMENT_ROOT']."/templates/admin/orders/closeOrder.php";

            $connectBase=DatabaseQueries::getInstance();
                $this->content=$connectBase->Select('orders',['id_order_status'=>1], "DISTINCT `orders`.`id_orders`, `user`.`user_login`" ,['user'=>['id_user','id_user']]);

            $this-> render();

        }
     

    }







?>