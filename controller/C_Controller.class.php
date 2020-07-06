<?php

    abstract class C_Controller{

        abstract function render();//дизайн каждой страницы

        protected function Template($fileName, $vars=[]){

            foreach($vars as $key=>$values){

                $$key=$values;
           
            }

            ob_start();
            include($fileName);

            return ob_get_clean();

        }

        function  CheckForm($value){

            if(is_array($value)){

                foreach($value as $key=>$array){

                    $array = trim($array);
                    $array = stripslashes($array);
                    $array = strip_tags($array);
                    $array = htmlspecialchars($array);

                    $value[$key]=$array;

                }

            } else {

                  $value = trim($value);
                  $value = stripslashes($value);
                  $value = strip_tags($value);
                  $value = htmlspecialchars($value);

            }

            return $value;

        }
                        
        function generateSalt() {

            $salt = '';
            $length = rand(5,10);

            for($i=0; $i<$length; $i++) {

                $salt .= chr(rand(33,126));

            }

            return $salt;

        }

    function Regular($str_email,$str_telephone,$str_name){

        $reg_email="/^((([0-9A-Za-z]{1}[-0-9A-z\.]{1,}[0-9A-Za-z]{1})|([0-9А-Яа-я]{1}[-0-9А-я\.]{1,}[0-9А-Яа-я]{1}))@([-A-Za-z]{1,}\.){1,2}[-A-Za-z]{2,})$/u";

        $result=preg_match_all($reg_email,$str_email);

        if(!$result){

            $answer['email']= 'Email';

        }

        $reg_telephone="/^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){7,14}(\s*)?$/";

        $result=preg_match_all($reg_telephone,$str_telephone);

        if(!$result){

           $answer['telephone']= 'Телефон';

        }

        $reg_name='/^[а-яА-ЯёЁa-zA-Z ]+$/u';

        $result=preg_match_all($reg_name,$str_name);

        if(!$result){

           $answer['name']= 'ФИО';

        }

        return($answer);

     }

      /*
      $w_o и h_o - ширина и высота выходного изображения
      */
    function resize($image, $w_o = false, $h_o = false) {

        if (($w_o < 0) || ($h_o < 0)) {

            echo "Некорректные входные параметры";
            return false;
        }

        list($w_i, $h_i, $type) = getimagesize($image);
        $types = array("", "gif", "jpeg", "png");
        $ext = $types[$type];

        if ($ext) {

              $func = 'imagecreatefrom'.$ext;
              $img_i = $func($image);

        } else {

              echo 'Некорректное изображение';
              return false;
        }

        /* Если указать только 1 параметр, то второй подстроится пропорционально */
        if (!$h_o) $h_o = $w_o / ($w_i / $h_i);
        if (!$w_o) $w_o = $h_o / ($h_i / $w_i);

        $img_o = imagecreatetruecolor($w_o, $h_o);
        imagecopyresampled($img_o, $img_i, 0, 0, 0, 0, $w_o, $h_o, $w_i, $h_i);
        $func = 'image'.$ext;

        return $func($img_o, $image); // Сохраняем изображение в тот же файл, что и исходное, возвращая результат этой операции
      }



                          

    }
?>