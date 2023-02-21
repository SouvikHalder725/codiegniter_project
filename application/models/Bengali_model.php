<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bengali_model extends CI_Model {




  

    
    public function other_news_store($data){

      $date=date('d-m-y');
      $file_name=$data['file_name'];
      $file_date=$data['date'];

      
      $this -> db -> where('file_name',$file_name);
      $this -> db -> where('date',$file_date);
      $data_res= $this-> db ->get('bengali_story');
      $data_res->num_rows();
      
       
      if($data_res->num_rows()>0){

        return false;
      }
      else{

        $this-> db ->insert('bengali_story',$data);
        return true;

      }

    }
    public function other_news_file_no(){
      $date=date('d-m-y');

      $this -> db -> where('date', $date); 
      $data= $this-> db ->get('bengali_story');
     
      return $data->num_rows();  
 


    }
    public function get_other_news_file($arr_start){

      $limit=5;
      $date=date('d-m-y');

      
      $data= $this-> db ->order_by("id", "DESC");
      $data= $this-> db ->limit($limit, $arr_start);
      $data= $this -> db -> where('date', $date); 
      $data= $this-> db ->get('bengali_story');
      return $data->result();  
    }
    public function pick_other_news_get_det($data){

    $story_name=$data['story_name'];                
    $story_date=$data['story_date'];
    $pick_date=$data['pick_date'];
    $pick_by=$data['pick_by'];
    
      $data_res= $this -> db -> where('date', $story_date); 
      $data_res= $this -> db -> where('file_name', $story_name); 
      $data_res= $this-> db ->get('bengali_story');
      return $data_res->row(); 



   }
   public function pick_other_news_db_store($data2){
     $this-> db ->insert('bengali_story_pick_realise',$data2);
         return true;

   }



    public function other_photos_store($data){

      $date=date('d-m-y');
      $file_name=$data['file_name'];

      $file_date=$data['date'];

      
      $this -> db -> where('file_name',$file_name);
      $this -> db -> where('date',$file_date);
    
      $data_res= $this-> db ->get('bengali_photos');
      $data_res->num_rows();
      
       
      if($data_res->num_rows()>0){

        return false;
      }
      else{

        $this-> db ->insert('bengali_photos',$data);
        return true;

      }

    }
    public function other_photos_file_no(){
      $date=date('d-m-y');

      $this -> db -> where('date', $date); 
      $data= $this-> db ->get('bengali_photos');
     
      return $data->num_rows();  
 


    }
    public function get_other_photos_file($arr_start){

      $limit=5;
      $date=date('d-m-y');

      
      $data= $this-> db ->order_by("id", "DESC");
      $data= $this-> db ->limit($limit, $arr_start);
      $data= $this -> db -> where('date', $date); 
      $data= $this-> db ->get('bengali_photos');
      return $data->result();  
    }
    public function pick_other_photos_get_det($data){

    $story_name=$data['story_name'];                
    $story_date=$data['story_date'];
    $pick_date=$data['pick_date'];
    $pick_by=$data['pick_by'];
    
      $data_res= $this -> db -> where('date', $story_date); 
      $data_res= $this -> db -> where('file_name', $story_name); 
      $data_res= $this-> db ->get('bengali_photos');
      return $data_res->row(); 



   }
   public function pick_other_photos_db_store($data2){
     $this-> db ->insert('bengali_photos_pick_realise',$data2);
         return true;

   }
    




    public function get_other_news_file_by_date($value1){

       // $limit=5;
      // $date=date('dmy');

      
      $data= $this-> db ->order_by("id", "DESC");
      // $data= $this-> db ->limit($limit, $arr_start);
      $data= $this -> db -> where('date', $value1); 
      $data= $this-> db ->get('bengali_story');
      return $data->result();  
    }

     public function get_other_photos_file_by_date($value1){

       // $limit=5;
      // $date=date('dmy');

      
      $data= $this-> db ->order_by("id", "DESC");
      // $data= $this-> db ->limit($limit, $arr_start);
      $data= $this -> db -> where('date', $value1); 
      $data= $this-> db ->get('bengali_photos');
      return $data->result();  
    }

    

   
   


}
?>