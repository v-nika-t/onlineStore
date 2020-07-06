<?php 

    class C_AddGood extends C_Base{

        function View(){//Страница добавить товар

            $this->title="Добавить товар" ;

            $this->fileName=$_SERVER['DOCUMENT_ROOT']."/templates/admin/changeGoods/addGood.php";
        
            $connectBase=DatabaseQueries::getInstance();
                $this-> render();
        }

        function Add(){//Добавление товара

            $_POST=parent::CheckForm($_POST);

            if($_FILES['dowladfile']['error']== 0){//Работа с файлом

                if(TRUE){

                    $filename=$_FILES['dowladfile']['tmp_name'];
                    $nameImage=time().$_FILES['dowladfile']['name'];

                    $destination=$_SERVER['DOCUMENT_ROOT'].'/public/images/bigImage/'.$nameImage;
                        move_uploaded_file(  $filename,  $destination);
                    parent::resize($destination, 573 , 335);

                    $smallImage=$_SERVER['DOCUMENT_ROOT'].'/public/images/smallImage/'.$nameImage;
                    copy($destination , $smallImage);
                    parent::resize($smallImage, 287 , 168);

                } else {

                      $answer="answer=Папка не найдена";

                }

                $reg='/^[0-9]+$/';//проверка id и price
                $result_reg_prices=preg_match_all($reg,$_POST['prices']);

                if($_POST['namegoods'] && $result_reg_prices && $_POST['shortdescription'] && $_POST['fulldescription'] && $_FILES['dowladfile']){//если не пустые поля

                    $value_column[]="'".$_POST['namegoods']."','".$_POST['shortdescription']."','".$_POST['fulldescription']."','".$_POST['prices']."','".$nameImage."'"; //формируем значения
                    $name_column='`nameGoods`, `shortDescription`, `fullDescription` , `prices` , `nameImage`';

                    $connectBase=DatabaseQueries::getInstance();
                    $result=$connectBase-> Insert('goods', $name_column ,$value_column);//вносим товар

                    if($result){

                        $answer="answer=Добавлено успешно";

                    } else {

                          $answer="answer=Не добавлено.Попробуй ещё раз";

                    }

                } else {

                      $answer="answer=Заполните все поля корректно";

                }

            } else if($_FILES['dowladfile']['error']== 4){ //если файл не загружен

                  $answer="answer=Загрузите файл";

            } else {

                  $answer='answer=Ошибка:'.$_FILES['dowladfile']['error'];

            }

            $data_user='&namegoods='.$_POST['namegoods'].'&prices='.$_POST['prices'].'&shortdescription='.$_POST['shortdescription'].'&fulldescription='.$_POST['fulldescription'];

            header('location: index.php?'.$answer.'&c=AddGood&act=View'.$data_user);


        }

    }




    
    
  
    
    
    
    
    
    
    
    
    
?>