<?php 

    class C_OpenOrder extends C_Base {
    
        function View(){

            $this->title="Открытые закзазы" ;
            $this->fileName=$_SERVER['DOCUMENT_ROOT']."/templates/admin/orders/openOrder.php";
    
            $connectBase=DatabaseQueries::getInstance();
            $this->content=$connectBase->Select('orders',['id_order_status'=>2], "DISTINCT `orders`.`id_orders`, `user`.`user_login`" ,['user'=>['id_user','id_user']]);

            $this-> render();

        }

    }




?>