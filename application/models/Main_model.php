<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {




  

    
    public function pti_bhasha_store($data){

      $date=date('d-m-y');
      $file_name=$data['file_name'];
      $file_date=$data['date'];

      
      $this -> db -> where('file_name',$file_name);
      $this -> db -> where('date',$file_date);
     
      $data_res= $this-> db ->get('pti_bhasha');
      $data_res->num_rows();
      
       
      if($data_res->num_rows()>0){

         return false;
      }
      else{
         $this-> db ->insert('pti_bhasha',$data);
         return true;

      }

    }
    public function pti_bhasha_file_no(){
      $date=date('d-m-y');

      $this -> db -> where('date', $date); 
      $data= $this-> db ->get('pti_bhasha');
     
      return $data->num_rows();  
 


   }
    public function get_pti_bhasha_file($arr_start){

      $limit=5;
      $date=date('d-m-y');

      
      $data= $this-> db ->order_by("id", "DESC");
      $data= $this-> db ->limit($limit, $arr_start);
      $data= $this -> db -> where('date', $date); 
      $data= $this-> db ->get('pti_bhasha');
      return $data->result();  
    }
    
    public function pti_english_store($data){

      $date=date('d-m-y');
      $file_name=$data['file_name'];
      $file_date=$data['date'];

      $this -> db -> where('file_name',$file_name);
      $this -> db -> where('date',$file_date);
      $data_res= $this-> db ->get('pti_english');
      $data_res->num_rows();
      
       
      if($data_res->num_rows()>0){

         return false;
      }
      else{

         $this-> db ->insert('pti_english',$data);
               return true;
      }


    }
    public function get_pti_english_file($arr_start){
      $limit=5;
      $date=date('d-m-y');

      
      $data= $this-> db ->order_by("id", "DESC");
      $data= $this-> db ->limit($limit, $arr_start);
      $data= $this -> db -> where('date', $date); 
      $data= $this-> db ->get('pti_english');
      return $data->result();


    }
    
    public function pti_english_file_no(){
      $date=date('d-m-y');

      $this -> db -> where('date', $date); 
      $data= $this-> db ->get('pti_english');
     
      return $data->num_rows();  
 


   }
   
    public function uni_varta_store($data){
       $date=date('d-m-y');
      $file_name=$data['file_name'];
        $file_date=$data['date'];

      $this -> db -> where('file_name',$file_name);
      $this -> db -> where('date',$file_date); 
      $data_res= $this-> db ->get('uni_varta');
      $data_res->num_rows();
      
       
      if($data_res->num_rows()>0){

         return false;
      }
      else{

            $this-> db ->insert('uni_varta',$data);
            return true;
      }


    }
    public function get_uni_varta_file($arr_start){
      $limit=5;
      $date=date('d-m-y');

      
      $data= $this-> db ->order_by("id", "DESC");
      $data= $this-> db ->limit($limit, $arr_start);
      $data= $this -> db -> where('date', $date); 
      $data= $this-> db ->get('uni_varta');
      return $data->result();


    }
    public function uni_varta_file_no(){
      $date=date('d-m-y');

      $this -> db -> where('date', $date); 
      $data= $this-> db ->get('uni_varta');
     
      return $data->num_rows();  
 


   }
   
    public function uni_photos_store($data){
       $date=date('d-m-y');
      $file_name=$data['file_name'];
      $file_date=$data['date'];

      $this -> db -> where('file_name',$file_name);
      $this -> db -> where('date',$file_date);
      $data_res= $this-> db ->get('uni_photos');
      $data_res->num_rows();
      
       
      if($data_res->num_rows()>0){

         return false;
      }
      else{

            $this-> db ->insert('uni_photos',$data);
            return true;
         }


    }
    public function get_uni_photos_file($arr_start){
      $limit=5;
      $date=date('d-m-y');

      
      $data= $this-> db ->order_by("id", "DESC");
      $data= $this-> db ->limit($limit, $arr_start);
      $data= $this -> db -> where('date', $date); 
      $data= $this-> db ->get('uni_photos');
      return $data->result();


    }
    public function uni_photos_file_no(){
      $date=date('d-m-y');

      $this -> db -> where('date', $date); 
      $data= $this-> db ->get('uni_photos');
     
      return $data->num_rows();  
 


   }
   
    public function pti_photos_store($data){
      $date=date('d-m-y');
      $file_name=$data['file_name'];
      $file_date=$data['date'];

      $this -> db -> where('file_name',$file_name);
      $this -> db -> where('date',$file_date);
     
      $data_res= $this-> db ->get('pti_photos');
      $data_res->num_rows();
      
       
      if($data_res->num_rows()>0){

         return false;
      }
      else{

            $this-> db ->insert('pti_photos',$data);
            return true;
         }


    }
    public function get_pti_photos_file($arr_start){
      $limit=5;
      $date=date('d-m-y');

      
      $data= $this-> db ->order_by("id", "DESC");
      $data= $this-> db ->limit($limit, $arr_start);
      $data= $this -> db -> where('date', $date); 
      $data= $this-> db ->get('pti_photos');
      return $data->result();


    }
    public function pti_photos_file_no(){
      $date=date('d-m-y');

      $this -> db -> where('date', $date); 
      $data= $this-> db ->get('pti_photos');
     
      return $data->num_rows();  
 


   }
   
    
 

   



   




}
?>