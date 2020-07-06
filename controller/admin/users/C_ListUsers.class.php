<?php 

    class C_ListUsers extends C_Base{

        function View(){//страница Пользователи

            $this->title="Пользователи" ;
            $this->fileName=$_SERVER['DOCUMENT_ROOT']."/templates/admin/users/listUsers.php";

            $connectBase=DatabaseQueries::getInstance();
                $this->content=$connectBase->Select("user");
                    $this->content=array_slice($this->content,1);

                $this-> render();
        
        }

        function Delete(){//Удалить пользователя

            $id_user=$_GET['id_user'];
            $where=['id_user'=>$id_user];

            $connectBase=DatabaseQueries::getInstance();

            $result_orders=$connectBase->Select('orders',['id_user'=>$id_user]);
                $result_orders=$result_orders[0];

            $result_basket=$connectBase->Select('basket',['id_user'=>$id_user]);

            if(($result_orders['id_order_status'] == 1) || $result_basket ){

                if($result_orders['id_order_status']){

                    $table='orders';

                } else {

                    $table='basket';

                }

                $connectBase->Delete($table,$where);

            } else if($result_orders['id_order_status'] == 2){

                 $answer="answer=Не удалено.У пользователя есть заказ. Закройте заказы и попробуйте снова.";
                 $flag='is_order';

            }

            if(!$flag){

                $result=$connectBase->Delete('user',$where);

                    if($result){

                        $answer="answer=Удалено успешно";

                    } else {

                        $answer="answer=Не удалено.Попробуйте ещё раз";

                    }
            }

            header('location: index.php?'.$answer.'&c=ListUsers&act=View');

        }

   
    }

    
    
    
  
    
    
    
    
    
    
    
    
    
?>