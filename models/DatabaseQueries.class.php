<?php

    require_once ($_SERVER['DOCUMENT_ROOT']."/config/config.default.php");

    class DatabaseQueries{

        private static $instance;
        private static $db;

        private function __construct(){

            self::$db=new PDO(TYPE_DB . ':host=' . DB_HOST . ';port='.DB_PORT.';dbname='.DB_NAME_BASE, DB_USER, DB_PASS);

        }

        public static function getInstance(){

            if(self:: $instance == null){

                self::$instance=new DatabaseQueries();

            }

            return self::$instance;

        }


        //$where- массив вида, ['id1'=>1,'id2'=>2]
    
         public function Where($where_array){

             $count_array=count($where_array)-1;
             $i=0;

             foreach($where_array as $key=>$array){

                 if($i == $count_array){
            
                     $query.=" `$key`= ?;" ;
                     $execute_array[]= $array;
          
                 } else {

                       $query.=" `$key`=? AND";
                       $execute_array[]= $array;
                 };

                 $i++;
        
             }
       
             return ['query'=>$query,'execute_array'=>$execute_array];
    
         }
    

         //$value_column-массив вида ['1,1,4,3,1','1,1,5,1,1']
         public function Insert($table,$name_column, $value_column){

             $end_array=count($value_column)-1;

             foreach($value_column as $key=>$array ){
  
                 if($key == $end_array){

                     $values.="($array);";

                 } else {

                      $values.="($array),";
                 }
             };
    
             $query="INSERT INTO `$table`($name_column) VALUES $values";

             $sth1=self::$db->prepare($query);
                 $result=$sth1->execute();//отдает true или faulse

             return $result;
   
         }

         public function Delete($table,$where_array){
      
             $query="DELETE FROM `$table` WHERE";
             $array_query_execute=$this->Where($where_array);
             $query.= $array_query_execute['query'];

             $sth1=self::$db->prepare($query);
             $result=$sth1->execute($array_query_execute['execute_array']);

             return $result;

         }

      
         public function Update($table,$column,$value_column,$where_array){
    
             if(is_array($value_column) && is_array($column) ){
         
                 $query="UPDATE `$table` SET ";
         
                 for($i=0; $i<count($column); $i++){
            
                     if($i == count($column)-1){
            
                         $query.= $column[$i]."="."'$value_column[$i]'"." WHERE";

                     } else {

                           $query.= $column[$i]."="."'$value_column[$i]'".',';
                     }

                 }
         
             } else {
        
                   $query="UPDATE `$table` SET `$column`=  $value_column WHERE";
     
             }
    
             $array_query_execute=$this->Where($where_array);
             $query.= $array_query_execute['query'];

             $sth1=self::$db->prepare($query);
             $result=$sth1->execute($array_query_execute['execute_array']);

             return $result ;

         }
    
   
    
        //$other_table-массив для INNER JOIN вида:["table"=>['id_table1','id_table2']];
        //table-имя второй таблицы, id_table1- id таблицы1, id_table2- id таблицы2
        //$query-любой запрос;
        //$where_array- массив вида, ['id1'=>1,'id2'=>2]

         public  function Select($table_1,$where_array="",$column="*", $other_table="",$query=""){

             if(!$query){//если нет своего запроса
    
                 $query="SELECT $column FROM $table_1";
                 $array_execute=[];

             };
    
             if($other_table && is_array($other_table)){//если надо использовать INNER JOIN
    
                 foreach($other_table as $key=>$array){
        
                     $query.=" INNER JOIN `$key` ON `$table_1`.`$array[0]`=`$key`.`$array[1]`";

                 }

                 $array_execute=[];
   
             }

             if($where_array){//если надо использовать where
    
                 $array_query_execute=$this->Where($where_array);
                 $query.= " WHERE".$array_query_execute['query'];
                 $array_execute=$array_query_execute['execute_array'];
 
             }

             $sth1=self::$db->prepare($query);
             $sth1->execute($array_execute);

             return($sth1->fetchAll());//отдает массив

         }
    
         function Transaction($table,$values,$column){//определет максимальный id в таблице и добавляет заказ

             $id='id_'.$table;
             self::$db->beginTransaction();

             $max_id=$this->Select('`'.$table.'`','','MAX(`'.$id.'`)');
             $max_id=$max_id[0][0]+1;

             foreach ($values as $array){

                 $values1[]=$max_id.$array;

             }

             $values=$values1;

             $resultInsert=$this->Insert($table , $column , $values );

             $max_id2=$this->Select('`'.$table.'`','','MAX(`'.$id.'`)');

             if($max_id2[0][0] == $max_id ){

                 self::$db->commit();
                 return $max_id;

             } else {

                   self::$db->rollback();

             }

         }



    }



       





?>