<?php 

    class C_ListGood extends C_Base{

        function View(){

            $this->title="Товары" ;

            $this->fileName=$_SERVER['DOCUMENT_ROOT']."/templates/admin/changeGoods/listGood.php";

            $connectBase=DatabaseQueries::getInstance();
                $this->content=$connectBase->Select("goods");

            $this-> render();
        
        }

        function Delete(){

            $id_good=parent::CheckForm( $_GET['id_good']);

            $reg_id='/^[0-9]+$/';
            $result_reg=preg_match_all($reg_id,$id_good);

            if($result_reg){

                $where=['id_good'=>$id_good];
                $connectBase=DatabaseQueries::getInstance();

                $result=$connectBase->Select('goods', $where);
                    $bigImage=$_SERVER['DOCUMENT_ROOT'].'/public/images/bigImage/'.$result[0]['nameImage'];
                    $smallImage=$_SERVER['DOCUMENT_ROOT'].'/public/images/smallImage/'.$result[0]['nameImage'];

                $result=$connectBase->Delete('goods',$where);

                if($result ){

                    $answer="answer=Товар удален";
                    unlink($bigImage);
                    unlink($smallImage);

                } else {

                      $answer="answer=Товар не удален.Попробуйте ещё раз";

                }

            }

            if(!$result_reg || !$result ){

                $answer="answer=Что-то пошло не так. Попробуйте ещё раз";

            }

            header('location: index.php?'.$answer.'&c=ListGood&act=View');

        }

    }




    

    
  
    
    
    
    
    
    
    
    
    
?>