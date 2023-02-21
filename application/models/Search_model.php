<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search_model extends CI_Model {


    public function get_pti_bhasha_search($search_news_subject){

    
      $date=date('d-m-y');

      
    
      $data= $this -> db -> where('date', $date);
      $data=$this-> db ->like('text', $search_news_subject);
      $data=$this-> db ->or_like('text',$search_news_subject,'before');
      $data= $this-> db ->get('pti_bhasha');
      return $data->result();  
    }
    public function pti_bhasha_file_no($search_news_subject){
      $date=date('d-m-y');

      $this -> db -> where('date', $date); 
      $data=$this-> db ->like('text', $search_news_subject);
      $data= $this-> db ->get('pti_bhasha');
     
      return $data->num_rows();  
 


    }
    public function get_pti_english_search($search_news_subject){

    
      $date=date('d-m-y');

      
    
      $data= $this -> db -> where('date', $date);
      $data=$this-> db ->like('text', $search_news_subject);
      $data=$this-> db ->or_like('text',$search_news_subject,'before');
      $data= $this-> db ->get('pti_english');
      return $data->result();  
    }
    public function pti_english_file_no($search_news_subject){
      $date=date('d-m-y');

      $this -> db -> where('date', $date); 
      $data=$this-> db ->like('text', $search_news_subject);
      $data= $this-> db ->get('pti_english');
     
      return $data->num_rows();  
 


    }
    public function get_uni_varta_search($search_news_subject){

    
      $date=date('d-m-y');

      
    
      $data= $this -> db -> where('date', $date);
      $data=$this-> db ->like('text', $search_news_subject);
      $data=$this-> db ->or_like('text',$search_news_subject,'before');
      $data= $this-> db ->get('uni_varta');
      return $data->result();  
    }
    public function uni_varta_file_no($search_news_subject){
      $date=date('d-m-y');

      $this -> db -> where('date', $date); 
      $data=$this-> db ->like('text', $search_news_subject);
      $data= $this-> db ->get('uni_varta');
     
      return $data->num_rows();  
 


     }
     public function get_local_news_search($search_news_subject){

    
      $date=date('d-m-y');

      
    
      $data= $this -> db -> where('date', $date);
      $data=$this-> db ->like('text', $search_news_subject);
      $data=$this-> db ->or_like('text',$search_news_subject,'before');
      $data= $this-> db ->get('local_story');
      return $data->result();  
    }
    public function local_news_file_no($search_news_subject){
      $date=date('d-m-y');

      $this -> db -> where('date', $date); 
      $data=$this-> db ->like('text', $search_news_subject);
      $data= $this-> db ->get('local_story');
     
      return $data->num_rows();  
 


     }
      public function get_other_news_search($search_news_subject){

    
      $date=date('d-m-y');

      
    
      $data= $this -> db -> where('date', $date);
      $data=$this-> db ->like('text', $search_news_subject);
      $data=$this-> db ->or_like('text',$search_news_subject,'before');
      $data= $this-> db ->get('bengali_story');
      return $data->result();  
    }
    public function other_news_file_no($search_news_subject){
      $date=date('d-m-y');

      $this -> db -> where('date', $date); 
      $data=$this-> db ->like('text', $search_news_subject);
      $data= $this-> db ->get('bengali_story');
     
      return $data->num_rows();  
 


     }
      public function get_pti_photos_search($search_news_subject){

    
      $date=date('d-m-y');

      
    
      $data= $this -> db -> where('date', $date);
      $data=$this-> db ->like('title', $search_news_subject);
      $data=$this-> db ->or_like('subject',$search_news_subject);
      $data= $this-> db ->get('pti_photos');
      return $data->result();  
    }
    public function pti_photos_file_no($search_news_subject){
      $date=date('d-m-y');

      $this -> db -> where('date', $date); 
      $data=$this-> db ->like('title', $search_news_subject);
        $data=$this-> db ->or_like('subject',$search_news_subject);
      $data= $this-> db ->get('pti_photos');
     
      return $data->num_rows();  
 


     }

     public function get_uni_photos_search($search_news_subject){

    
      $date=date('d-m-y');

      
    
      $data= $this -> db -> where('date', $date);
      $data=$this-> db ->like('title', $search_news_subject);
      $data=$this-> db ->or_like('subject',$search_news_subject);
      $data= $this-> db ->get('uni_photos');
      return $data->result();  
    }
    public function uni_photos_file_no($search_news_subject){
      $date=date('d-m-y');

      $this -> db -> where('date', $date); 
      $data=$this-> db ->like('title', $search_news_subject);
        $data=$this-> db ->or_like('subject',$search_news_subject);
      $data= $this-> db ->get('uni_photos');
     
      return $data->num_rows();  
 


     }


      public function get_other_photos_search($search_news_subject){

    
      $date=date('d-m-y');

      
    
      $data= $this -> db -> where('date', $date);
      $data=$this-> db ->like('title', $search_news_subject);
      $data=$this-> db ->or_like('subject',$search_news_subject);
      $data= $this-> db ->get('bengali_photos');
      return $data->result();  
    }
    public function other_photos_file_no($search_news_subject){
      $date=date('d-m-y');

      $this -> db -> where('date', $date); 
      $data=$this-> db ->like('title', $search_news_subject);
        $data=$this-> db ->or_like('subject',$search_news_subject);
      $data= $this-> db ->get('bengali_photos');
     
      return $data->num_rows();  
 


     }
     public function get_local_photos_search($search_news_subject){

    
      $date=date('d-m-y');

      
    
      $data= $this -> db -> where('date', $date);
      $data=$this-> db ->like('title', $search_news_subject);
      $data=$this-> db ->or_like('subject',$search_news_subject);
      $data= $this-> db ->get('local_photos');
      return $data->result();  
    }
    public function local_photos_file_no($search_news_subject){
      $date=date('d-m-y');

      $this -> db -> where('date', $date); 
      $data=$this-> db ->like('title', $search_news_subject);
        $data=$this-> db ->or_like('subject',$search_news_subject);
      $data= $this-> db ->get('local_photos');
     
      return $data->num_rows();  
 


     }
    
   
    
 

   



   




}
?>