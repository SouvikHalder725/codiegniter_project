<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Archivepick_model extends CI_Model {



   public function pick_bhasha_get_det($data){

    $story_name=$data['story_name'];                
    $story_date=$data['story_date'];
  
    
      $data_res= $this -> db -> where('date', $story_date); 
      $data_res= $this -> db -> where('file_name', $story_name); 
      $data_res= $this-> db ->get('pti_bhasha');
      return $data_res->row(); 



   }
   public function pick_bhasha_archive($id,$file_name,$archive_date){

    $date=date('d-m-y');

    $data2=$this->db->set('date',$date);

    $data2=$this -> db -> where('id',$id);  
    $data2=$this -> db -> where('file_name',$file_name);
    $data2=$this -> db -> where('date',$archive_date); 
   
    $data2=$this->db->update('pti_bhasha');
          return true;

    }


    // for pti english
    public function pick_pti_eng_get_det($data){

    $story_name=$data['story_name'];                
    $story_date=$data['story_date'];
  
    
      $data_res= $this -> db -> where('date', $story_date); 
      $data_res= $this -> db -> where('file_name', $story_name); 
      $data_res= $this-> db ->get('pti_english');
      return $data_res->row(); 



   }
   public function pick_pti_eng_archive($id,$file_name,$archive_date){

    $date=date('d-m-y');

    $data2=$this->db->set('date',$date);

    $data2=$this -> db -> where('id',$id);  
    $data2=$this -> db -> where('file_name',$file_name);
    $data2=$this -> db -> where('date',$archive_date); 
   
    $data2=$this->db->update('pti_english');
          return true;

    }

    // for uni varta
    public function pick_uni_varta_get_det($data){

    $story_name=$data['story_name'];                
    $story_date=$data['story_date'];
  
    
      $data_res= $this -> db -> where('date', $story_date); 
      $data_res= $this -> db -> where('file_name', $story_name); 
      $data_res= $this-> db ->get('uni_varta');
      return $data_res->row(); 



   }
   public function pick_uni_varta_archive($id,$file_name,$archive_date){

    $date=date('d-m-y');

    $data2=$this->db->set('date',$date);

    $data2=$this -> db -> where('id',$id);  
    $data2=$this -> db -> where('file_name',$file_name);
    $data2=$this -> db -> where('date',$archive_date); 
   
    $data2=$this->db->update('uni_varta');
          return true;

    }

    // for pti photos
    public function pick_pti_photos_get_det($data){

    $story_name=$data['story_name'];                
    $story_date=$data['story_date'];
  
    
      $data_res= $this -> db -> where('date', $story_date); 
      $data_res= $this -> db -> where('file_name', $story_name); 
      $data_res= $this-> db ->get('pti_photos');
      return $data_res->row(); 



   }
   public function pick_pti_photos_archive($id,$file_name,$archive_date){

    $date=date('d-m-y');

    $data2=$this->db->set('date',$date);

    $data2=$this -> db -> where('id',$id);  
    $data2=$this -> db -> where('file_name',$file_name);
    $data2=$this -> db -> where('date',$archive_date); 
   
    $data2=$this->db->update('pti_photos');
          return true;

    }
     // for uni photos
    public function pick_uni_photos_get_det($data){

    $story_name=$data['story_name'];                
    $story_date=$data['story_date'];
  
    
      $data_res= $this -> db -> where('date', $story_date); 
      $data_res= $this -> db -> where('file_name', $story_name); 
      $data_res= $this-> db ->get('uni_photos');
      return $data_res->row(); 



   }
   public function pick_uni_photos_archive($id,$file_name,$archive_date){

    $date=date('d-m-y');

    $data2=$this->db->set('date',$date);

    $data2=$this -> db -> where('id',$id);  
    $data2=$this -> db -> where('file_name',$file_name);
    $data2=$this -> db -> where('date',$archive_date); 
   
    $data2=$this->db->update('uni_photos');
          return true;

    }

    // for other news
    public function pick_other_news_get_det($data){

    $story_name=$data['story_name'];                
    $story_date=$data['story_date'];
  
    
      $data_res= $this -> db -> where('date', $story_date); 
      $data_res= $this -> db -> where('file_name', $story_name); 
      $data_res= $this-> db ->get('bengali_story');
      return $data_res->row(); 



   }
   public function pick_other_news_archive($id,$file_name,$archive_date){

    $date=date('d-m-y');

    $data2=$this->db->set('date',$date);

    $data2=$this -> db -> where('id',$id);  
    $data2=$this -> db -> where('file_name',$file_name);
    $data2=$this -> db -> where('date',$archive_date); 
   
    $data2=$this->db->update('bengali_story');
          return true;

    }


    // for other photos
    public function pick_other_photos_get_det($data){

    $story_name=$data['story_name'];                
    $story_date=$data['story_date'];
  
    
      $data_res= $this -> db -> where('date', $story_date); 
      $data_res= $this -> db -> where('file_name', $story_name); 
      $data_res= $this-> db ->get('bengali_photos');
      return $data_res->row(); 



   }
   public function pick_other_photos_archive($id,$file_name,$archive_date){

    $date=date('d-m-y');

    $data2=$this->db->set('date',$date);

    $data2=$this -> db -> where('id',$id);  
    $data2=$this -> db -> where('file_name',$file_name);
    $data2=$this -> db -> where('date',$archive_date); 
   
    $data2=$this->db->update('bengali_photos');
          return true;

    }


     // for Local  news
    public function pick_local_news_get_det($data){

    $story_name=$data['story_name'];                
    $story_date=$data['story_date'];
  
    
      $data_res= $this -> db -> where('date', $story_date); 
      $data_res= $this -> db -> where('file_name', $story_name); 
      $data_res= $this-> db ->get('local_story');
      return $data_res->row(); 



   }
   public function pick_local_news_archive($id,$file_name,$archive_date){

    $date=date('d-m-y');

    $data2=$this->db->set('date',$date);

    $data2=$this -> db -> where('id',$id);  
    $data2=$this -> db -> where('file_name',$file_name);
    $data2=$this -> db -> where('date',$archive_date); 
   
    $data2=$this->db->update('local_story');
          return true;

    }

     // for local photos
    public function pick_local_photos_get_det($data){

    $story_name=$data['story_name'];                
    $story_date=$data['story_date'];
  
    
      $data_res= $this -> db -> where('date', $story_date); 
      $data_res= $this -> db -> where('file_name', $story_name); 
      $data_res= $this-> db ->get('local_photos');
      return $data_res->row(); 



   }
   public function pick_local_photos_archive($id,$file_name,$archive_date){

    $date=date('d-m-y');

    $data2=$this->db->set('date',$date);

    $data2=$this -> db -> where('id',$id);  
    $data2=$this -> db -> where('file_name',$file_name);
    $data2=$this -> db -> where('date',$archive_date); 
   
    $data2=$this->db->update('local_photos');
          return true;

    }

  

    
    








   




}
?>