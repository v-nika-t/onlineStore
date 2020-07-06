<?php 

class C_ChangeUser extends C_Base{
    
    

    function View(){

     $id_user=$_GET['id_user'];
     $this->fileName=$_SERVER['DOCUMENT_ROOT']."/templates/admin/users/changeUser.php";

     $connectBase=DatabaseQueries::getInstance();
          $this->content=$connectBase->Select("user",['id_user'=>$id_user]);
          $this->content=$this->content[0];

     $this->title= $this->content['user_name'] ;
     $this->vars['result']= $result ;

     $this-> render();
        
                             }



     function Change(){

         $id_user=$_GET['id_user'];

         $answer= parent:: ChangeUserDate($id_user);

         header('location: index.php?'.$answer.'&c=ChangeUser&act=View&id_user='.$id_user);

     }



   
}



    
    
  
    
    
    
    
    
    
    
    
    
?>