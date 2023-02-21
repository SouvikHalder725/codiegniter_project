<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class New_model extends CI_Model {




  

    
    public function pti_bhasha_pick_file_no(){
      $date=date('d-m-y');
      $picked=1;

      $this -> db -> where('date', $date); 
      $this -> db -> where('picked', $picked); 
      $data= $this-> db ->get('pti_bhasha');
     
      return $data->num_rows();  
 


   }
    public function get_pti_bhasha_pick_file($arr_start){

      $limit=5;
      $date=date('d-m-y');
      $picked=1;
      $pick_by=$this->session->userdata('name');
      $pick_by_emp_id=$this->session->userdata('emp_id');
      $new_pick_by=''.$pick_by.''.$pick_by_emp_id.'';

      
      $data= $this -> db ->order_by("id", "DESC");
      $data= $this -> db ->limit($limit, $arr_start);
      $data= $this -> db -> where('date', $date); 
      $data= $this -> db -> where('picked', $picked);
      $data= $this -> db -> where('pick_by', $new_pick_by);  
      $data= $this -> db ->get('pti_bhasha');
      return $data->result();  
    }
     public function pti_bhasha_file_no($value1){
     

      $this -> db -> where('date', $value1); 
      $data= $this-> db ->get('pti_bhasha');
     
      return $data->num_rows();  
 


   }
   public function get_pti_bhasha_file_by_date($value1){

       // $limit=5;
      // $date=date('dmy');

      
      $data= $this-> db ->order_by("id", "DESC");
      // $data= $this-> db ->limit($limit, $arr_start);
      $data= $this -> db -> where('date', $value1); 
      $data= $this-> db ->get('pti_bhasha');
      return $data->result();  
    }
    public function get_pti_english_file_by_date($value1){

       // $limit=5;
      // $date=date('dmy');

      
      $data= $this-> db ->order_by("id", "DESC");
      // $data= $this-> db ->limit($limit, $arr_start);
      $data= $this -> db -> where('date', $value1); 
      $data= $this-> db ->get('pti_english');
      return $data->result();  
    }
    public function pti_english_file_no($value1){
     

      $this -> db -> where('date', $value1); 
      $data= $this-> db ->get('pti_english');
     
      return $data->num_rows();  
 


   }
   public function get_uni_varta_file_by_date($value1){

       // $limit=5;
      // $date=date('dmy');

      
      $data= $this-> db ->order_by("id", "DESC");
      // $data= $this-> db ->limit($limit, $arr_start);
      $data= $this -> db -> where('date', $value1); 
      $data= $this-> db ->get('uni_varta');
      return $data->result();  
    }
    public function uni_varta_file_no($value1){
     

      $this -> db -> where('date', $value1); 
      $data= $this-> db ->get('uni_varta');
     
      return $data->num_rows();  
 


   }

    public function get_pti_photos_file_by_date($value1){

       // $limit=5;
      // $date=date('dmy');

      
      $data= $this-> db ->order_by("id", "DESC");
      // $data= $this-> db ->limit($limit, $arr_start);
      $data= $this -> db -> where('date', $value1); 
      $data= $this-> db ->get('pti_photos');
      return $data->result();  
    }
    public function pti_photos_file_no($value1){
     

      $this -> db -> where('date', $value1); 
      $data= $this-> db ->get('pti_photos');
     
      return $data->num_rows();  
 


   }

    public function get_uni_photos_file_by_date($value1){

       // $limit=5;
      // $date=date('dmy');

      
      $data= $this-> db ->order_by("id", "DESC");
      // $data= $this-> db ->limit($limit, $arr_start);
      $data= $this -> db -> where('date', $value1); 
      $data= $this-> db ->get('uni_photos');
      return $data->result();  
    }
    public function uni_photos_file_no($value1){
     

      $this -> db -> where('date', $value1); 
      $data= $this-> db ->get('uni_photos');
     
      return $data->num_rows();  
 


   }

   public function get_pti_bhasha_pick_news_by_date($value1){

      
      $data= $this-> db ->order_by("id", "DESC");
      // $data= $this-> db ->limit($limit, $arr_start);
      $data= $this -> db -> where('date', $value1); 
      $data= $this-> db ->get('pti_bhasha');
      return $data->result();  
    }

    public function pti_bhasha_pick_news_file_no($value1){
     

      $this -> db -> where('date', $value1); 
      $data= $this-> db ->get('pti_bhasha');
     
      return $data->num_rows();  
 


   }


   public function pick_bhasha_get_det($data){

    $story_name=$data['story_name'];                
    $story_date=$data['story_date'];
    $pick_date=$data['pick_date'];
    $pick_by=$data['pick_by'];
    
      $data_res= $this -> db -> where('date', $story_date); 
      $data_res= $this -> db -> where('file_name', $story_name); 
      $data_res= $this-> db ->get('pti_bhasha');
      return $data_res->row(); 



   }
   public function pick_bhasha_db_store($data2){
     $this-> db ->insert('pti_bhasha_pick_realise',$data2);
         return true;

   }

    public function pick_english_get_det($data){

    $story_name=$data['story_name'];                
    $story_date=$data['story_date'];
    $pick_date=$data['pick_date'];
    $pick_by=$data['pick_by'];
    
      $data_res= $this -> db -> where('date', $story_date); 
      $data_res= $this -> db -> where('file_name', $story_name); 
      $data_res= $this-> db ->get('pti_english');
      return $data_res->row(); 



   }
   public function pick_english_db_store($data2){
     $this-> db ->insert('pti_english_pick_realise',$data2);
         return true;

   }


    public function pick_pti_photos_get_det($data){

    $story_name=$data['story_name'];                
    $story_date=$data['story_date'];
    $pick_date=$data['pick_date'];
    $pick_by=$data['pick_by'];
    
      $data_res= $this -> db -> where('date', $story_date); 
      $data_res= $this -> db -> where('file_name', $story_name); 
      $data_res= $this-> db ->get('pti_photos');
      return $data_res->row(); 



   }
   public function pick_pti_photos_db_store($data2){
     $this-> db ->insert('pti_photos_pick_realise',$data2);
         return true;

   }



    public function pick_uni_photos_get_det($data){

    $story_name=$data['story_name'];                
    $story_date=$data['story_date'];
    $pick_date=$data['pick_date'];
    $pick_by=$data['pick_by'];
    
      $data_res= $this -> db -> where('date', $story_date); 
      $data_res= $this -> db -> where('file_name', $story_name); 
      $data_res= $this-> db ->get('uni_photos');
      return $data_res->row(); 



   }
   public function pick_uni_photos_db_store($data2){
     $this-> db ->insert('uni_photos_pick_realise',$data2);
         return true;

   }

   public function pick_uni_varta_get_det($data){

    $story_name=$data['story_name'];                
    $story_date=$data['story_date'];
    $pick_date=$data['pick_date'];
    $pick_by=$data['pick_by'];
    
      $data_res= $this -> db -> where('date', $story_date); 
      $data_res= $this -> db -> where('file_name', $story_name); 
      $data_res= $this-> db ->get('uni_varta');
      return $data_res->row(); 



   }
   public function pick_uni_varta_db_store($data2){
     $this-> db ->insert('uni_varta_pick_realise',$data2);
         return true;

   }


   public function pti_bhasha_realise_report($data,$realised_by,$file_id,$page_ed,$page_no){

       $data=$this->db->set($data);
       $data=$this->db->where('pick_by',$realised_by);
       $data=$this->db->where('story_id',$file_id);
       $data=$this->db->where('edition',$page_ed);
       $data=$this->db->where('page',$page_no);          
       $data=$this->db->update('pti_bhasha_pick_realise');
           return true;

   }

   public function pti_english_realise_report($data,$realised_by,$file_id,$page_ed,$page_no){

       $data=$this->db->set($data);
       $data=$this->db->where('pick_by',$realised_by);
       $data=$this->db->where('story_id',$file_id);
       $data=$this->db->where('edition',$page_ed);
       $data=$this->db->where('page',$page_no);          
       $data=$this->db->update('pti_english_pick_realise');
           return true;

   }

   public function pti_photos_realise_report($data,$realised_by,$file_id,$page_ed,$page_no){

       $data=$this->db->set($data);
       $data=$this->db->where('pick_by',$realised_by);
       $data=$this->db->where('story_id',$file_id);
       $data=$this->db->where('edition',$page_ed);
       $data=$this->db->where('page',$page_no);          
       $data=$this->db->update('pti_photos_pick_realise');
           return true;

   }


   public function uni_photos_realise_report($data,$realised_by,$file_id,$page_ed,$page_no){

       $data=$this->db->set($data);
       $data=$this->db->where('pick_by',$realised_by);
       $data=$this->db->where('story_id',$file_id);
       $data=$this->db->where('edition',$page_ed);
       $data=$this->db->where('page',$page_no);          
       $data=$this->db->update('uni_photos_pick_realise');
           return true;

   }

   public function uni_varta_realise_report($data,$realised_by,$file_id,$page_ed,$page_no){

       $data=$this->db->set($data);
       $data=$this->db->where('pick_by',$realised_by);
       $data=$this->db->where('story_id',$file_id);
       $data=$this->db->where('edition',$page_ed);
       $data=$this->db->where('page',$page_no);          
       $data=$this->db->update('uni_varta_pick_realise');
           return true;

   }








   




}
?>