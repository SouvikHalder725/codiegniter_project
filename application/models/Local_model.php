<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Local_model extends CI_Model {



public function get_id_local_news_no(){
   $data_res= $this-> db ->get('local_story');
   return $data_res->num_rows();


}
public function get_id_local_photos_no(){
   $data_res= $this-> db ->get('local_photos');
   return $data_res->num_rows();


}
public function local_story_ad($data){

    $file_name=$data['file_name'];
    $text=$data['text'];
    $id=$data['id'];
    $file_date=$data['date'];   
      
      $this -> db -> where('file_name',$file_name);
      $this -> db -> where('date',$file_date);
      $data_res= $this-> db ->get('local_story');
      $data_res->num_rows();

      
       
    if($data_res->num_rows()>0){

        return false;
    }
    else{

        $this-> db ->insert('local_story',$data);
        return true;
    }
}
public function local_photos_ad($data){
    $file_name=$data['file_name'];
    $file_date=$data['date'];   
      
    $this -> db -> where('file_name',$file_name);
    $this -> db -> where('date',$file_date);
    $data_res= $this-> db ->get('local_photos');
    $data_res->num_rows();

    if($data_res->num_rows()>0){

        return false;
    }
    else{

        $this-> db ->insert('local_photos',$data);
        return true;
    }
}
public function get_local_story_file_by_date($tw){
    

    $data= $this-> db ->order_by("id", "DESC");
    // $data= $this-> db ->limit($limit, $arr_start);
    $data= $this -> db -> where('date', $tw); 
    $data= $this-> db ->get('local_story');
      return $data->result();  





}

public function get_local_photos_file_by_date($tw){
    

    $data= $this-> db ->order_by("id", "DESC");
    // $data= $this-> db ->limit($limit, $arr_start);
    $data= $this -> db -> where('date', $tw); 
    $data= $this-> db ->get('local_photos');
      return $data->result();  





}


public function get_local_story_file($arr_start,$created_by){
    $limit=5;
    $date=date('d-m-y');
    

    $data= $this-> db ->order_by("id", "DESC");
    $data= $this-> db ->limit($limit, $arr_start);
    $data= $this -> db -> where('date', $date);
    $data= $this -> db -> where('created_by', $created_by);  
    $data= $this-> db ->get('local_story');
      return $data->result();  


}

public function local_story_file_no($created_by){

    $date=date('d-m-y');
    $data= $this -> db -> where('date', $date); 
     $data= $this -> db -> where('created_by', $created_by);  
    $data_res= $this-> db ->get('local_story');
  
     return $data_res->num_rows();


}
 public function pick_local_story_get_det($data){

    $story_name=$data['story_name'];                
    $story_date=$data['story_date'];
    $pick_date=$data['pick_date'];
    $pick_by=$data['pick_by'];
    
      $data_res= $this -> db -> where('date', $story_date); 
      $data_res= $this -> db -> where('file_name', $story_name); 
      $data_res= $this-> db ->get('local_story');
      return $data_res->row(); 



}
public function pick_local_photos_get_det($data){

    $story_name=$data['story_name'];                
    $story_date=$data['story_date'];
    $pick_date=$data['pick_date'];
    $pick_by=$data['pick_by'];
    
      $data_res= $this -> db -> where('date', $story_date); 
      $data_res= $this -> db -> where('file_name', $story_name); 
      $data_res= $this-> db ->get('local_photos');
      return $data_res->row(); 



}

public function pick_local_story_db_store($data2){
     $this-> db ->insert('local_story_pick_realise',$data2);
         return true;

}
public function pick_local_photos_db_store($data2){
     $this-> db ->insert('local_photos_pick_realise',$data2);
         return true;

}
public function get_local_story_for_edit($id){

      $data_res= $this -> db -> where('id', $id); 
      $data_res= $this-> db ->get('local_story');
      return $data_res->row(); 

}
public function local_story_update($data){

     $id=$data['id']; 

    $res=$this->db->set($data);
    $res=$this->db->where('id',$id);   
    $res=$this->db->update('local_story');

    return true;
}
public function local_photos_form(){

  $this->load->view('header');
  $this->load->view('local/local_photos_form');
  $this->load->view('footer');



}
public function get_local_photos_file($arr_start,$created_by){

    $limit=5;
    $date=date('d-m-y');

    $data= $this-> db ->order_by("id", "DESC");
    $data= $this-> db ->limit($limit, $arr_start);
    $data= $this -> db -> where('date', $date); 
    $data= $this -> db -> where('created_by', $created_by);  
    $data= $this-> db ->get('local_photos');
      return $data->result();  


}
public function local_photos_file_no($created_by){

    $date=date('d-m-y');

    $data= $this -> db -> where('date', $date); 
    $data= $this -> db -> where('created_by', $created_by);  
    $data= $this-> db ->get('local_photos');
      return $data->num_rows(); 



}
public function local_story_realise_report($data,$realised_by,$file_id,$page_ed,$page_no){

       $data=$this->db->set($data);
       $data=$this->db->where('pick_by',$realised_by);
       $data=$this->db->where('story_id',$file_id);
       $data=$this->db->where('edition',$page_ed);
       $data=$this->db->where('page',$page_no);          
       $data=$this->db->update('local_story_pick_realise');
           return true;

}
public function local_photos_realise_report($data,$realised_by,$file_id,$page_ed,$page_no){

       $data=$this->db->set($data);
       $data=$this->db->where('pick_by',$realised_by);
       $data=$this->db->where('story_id',$file_id);
       $data=$this->db->where('edition',$page_ed);
       $data=$this->db->where('page',$page_no);          
       $data=$this->db->update('local_photos_pick_realise');
           return true;

   }








   




}
?>