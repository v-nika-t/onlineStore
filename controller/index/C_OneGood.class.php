<?php 

    class C_OneGood extends C_Base{

        function View(){ //страница с одним товаром

            session_start();
            $this->fileName=$_SERVER['DOCUMENT_ROOT']."/templates/index/oneGood.php";

            $connectBase=DatabaseQueries::getInstance();
                $this->content=$connectBase->Select("goods",['id_good'=>$_GET['id_good']]);
                $this->content=$this->content[0];
        
            $this->title=$this->content['nameGoods'];
        
            $this-> render();
        
        }

    }


    
  
    
    
    
    
    
    
    
    
    
?>