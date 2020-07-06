<?php 

    class C_OneOrder extends C_Base{//отображение страницы с одним товаром

        function View(){

            $id_order=$_GET['id_order'];
            $status=$_GET['status'];

            $this->title=$id_order;

            if($status == 'open'){

               $this->vars['status']= "Закрыть заказ";

            } else {

                $this->vars['status']= "Открыть заказ";

            }

            $this->fileName=$_SERVER['DOCUMENT_ROOT']."/templates/admin/orders/oneOrder.php";
        
            $connectBase= DatabaseQueries::getInstance();
                $this->content=$connectBase->Select('orders',["id_orders"=>$id_order], "`orders`.`id_orders`,`orders`.`count`, `goods`.`nameGoods`, `goods`.`prices`, `user`.`user_login`, `user`.`user_name`,`user`.`user_adress`, `user`.`user_telephone`" , ['goods'=>['id_good','id_good'], 'user'=>['id_user','id_user']]);

            foreach ($this->content as $array){

                $this->vars['sum']+=$array['count']*$array['prices'];
        
            }

            $this->render();
          
        }

        function ChangeStatus(){

            if($_GET['status'] == 'Закрыть заказ'){

                $value=1;

            } else {

                 $value=2;

            }

            $connectBase= DatabaseQueries::getInstance();
                $connectBase->Update('orders','id_order_status', $value , ['id_orders'=>$_GET['id_order']]);


            header('location: index.php?c=OpenOrder&act=View');

        }

    }

?>