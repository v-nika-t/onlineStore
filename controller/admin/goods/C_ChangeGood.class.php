<?php 

    class C_ChangeGood extends C_Base{

        function View(){//Страница с измененим товара

           $id_good=$_GET['id_good'];
           $this->fileName=$_SERVER['DOCUMENT_ROOT']."/templates/admin/changeGoods/changeGood.php";
        
           $connectBase=DatabaseQueries::getInstance();
               $this->content=$connectBase->Select("goods",['id_good'=>$id_good]);
               $this->content=$this->content[0];

           $this->title= $this->content['nameGoods'] ;

           $this-> render();   
        
        }

        function Change(){ //Изменение товара

            $_POST=parent::CheckForm($_POST);

            $id_good=$_POST['id'];

            if($_FILES['dowladfile']['error']== 0 || $_FILES['dowladfile']['error']== 4 ){//Устанавливаем метку, есть ли закгруженный новый файл или нет

                if($_FILES['dowladfile']['error']== 0){

                    $filename=$_FILES['dowladfile']['tmp_name'];

                    $nameImage=time().$_FILES['dowladfile']['name'];

                    $destination=$_SERVER['DOCUMENT_ROOT'].'/public/images/bigImage/'.$nameImage;
                    move_uploaded_file(  $filename,  $destination);
                    parent::resize($destination, 573 , 335);

                    $smallImage=$_SERVER['DOCUMENT_ROOT'].'/public/images/smallImage/'.$nameImage;
                    copy($destination , $smallImage);
                    parent::resize($smallImage, 287 , 168);

                    $flag= true;

                } else if($_FILES['dowladfile']['error']== 4) {

                    $flag=false;

                }

                $reg='/^[0-9]+$/';//проверка id и price
                    $result_reg_prices=preg_match_all($reg,$_POST['prices']);
                    $result_reg_id=preg_match_all($reg,$_POST['id']);

                if($_POST['namegoods'] && $result_reg_prices && $result_reg_id && $_POST['shortDescription'] && $_POST['fullDescription']){// Если поля не пустые и соответсвую регулярным выражениям

                    $connectBase=DatabaseQueries::getInstance();

                    $result=$connectBase->Select('goods',['id_good'=>$id_good]);
                        $result=$result[0];

                    $oldNameImage=$result['nameImage'];

                    $result=['nameGoods'=>$result['nameGoods'], 'prices'=>$result['prices'] ,'shortDescription'=>$result['shortDescription'], 'fullDescription'=>$result['fullDescription']];
                    $_POST=['nameGoods'=>$_POST['namegoods'], 'prices'=>$_POST['prices'] ,'shortDescription'=>$_POST['shortDescription'], 'fullDescription'=>$_POST['fullDescription']];

                   if($flag){

                       $result['nameImage']= $oldNameImage;
                       $_POST['nameImage']=   $nameImage;

                       $bigImage=$_SERVER['DOCUMENT_ROOT'].'/public/images/bigImage/'.$oldNameImage;
                       $smallImage=$_SERVER['DOCUMENT_ROOT'].'/public/images/smallImage/'.$oldNameImage;

                   }

                   foreach($_POST as $key=>$array){//Формируем значения на изменения, если они были изменены

                       if(!($result[$key] == $array)){

                           $name_column[]='`'.$key.'`';

                           $value_column[]=$array;

                       }

                   }

                   $result=$connectBase->Update('goods',$name_column,$value_column,['id_good'=>$id_good]);//меняем значение

                   if($result){

                      if($bigImage && $smallImage){

                          unlink($bigImage);
                          unlink($smallImage);

                      }

                      $answer='answer=Изменено успешно';

                   } else {

                         $answer='answer=Не изменено.Попробуй ещё раз';
                   }


                } else {

                 $answer='answer=Заполните корректно все поля';

                }

            }  else {

                 $answer='answer=Ошибка:'.$_FILES['dowladfile']['error'];

            };

             header('location: index.php?'.$answer.'&c=ChangeGood&act=View&id_good='.$id_good);

        }
    }



    
    
  
    
    
    
    
    
    
    
    
    
?>