<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {



public function get_id_no(){
   $data_res= $this-> db ->get('user_list');
   return $data_res->num_rows();


}
public function user_ad($data){


    $user_name=$data['user_name'];
    $emp_id=$data['emp_id'];
    $user_id=$data['user_id'];
    $password=$data['password'];


      
      
      $this -> db -> where('user_name',$user_name);
      $data_res= $this-> db ->get('user_list');
      $data_res->num_rows();

      
       
      if($data_res->num_rows()>0){

         return false;
      }
      else{
         $this-> db ->insert('user_list',$data);
         return true;

      }

}
public function user_login($data){

    $user_id=$data['user_id'];
    $password=$data['password'];
    
              
      $this -> db -> where('password',$password);
      $this -> db -> where('user_id',$user_id);
      $data_res= $this-> db ->get('user_list');
      $data_res->row();
      
     
       
      if($data_res->row()){
        
         return $data_res->row(); 
        
      }
      else{
         return false;


      }

}
public function user_no_login(){
      $logged_in=1;
         
   
      $data_res=$this->db->where('logged_in',$logged_in);
      $data_res= $this-> db ->get('user_list');
      $data_res->num_rows();
      
     
       
      if($data_res->num_rows()>0){
        
         return $data_res->num_rows(); 
        
      }
      else{
         return false;


      }

}
public function login_update($data){

    $user_id=$data['user_id'];
    $password=$data['password'];
    $logged_in=1;


    $data2=$this->db->set('logged_in',$logged_in);
    $data=$this -> db -> where('user_id',$user_id);
    $data2=$this -> db -> where('password',$password);  
    $data2=$this->db->update('user_list');
          return true;



}
public function logout_update($user_id,$password){

   
    $logged_in=0;


    $data2=$this->db->set('logged_in',$logged_in);
    $data=$this -> db -> where('user_id',$user_id);
    $data2=$this -> db -> where('password',$password);  
    $data2=$this->db->update('user_list');
          return true;



}
public function user_list($arr_start){

      $limit=4;

      $data_res= $this-> db ->order_by("id", "DESC");
      $data_res= $this-> db ->limit($limit, $arr_start);

      $data_res= $this-> db ->get('user_list');
      $data_res->result();            
      if($data_res->result()){
        
         return $data_res->result(); 
        
      }
      else{
         return false;


      }

}
public function user_number(){

      $data_res= $this-> db ->get('user_list');
      $data_res->num_rows();
            
      if($data_res->num_rows()>0){
        
         return $data_res->num_rows(); 
        
      }
      else{
         return false;


      }

}
public function user_data($id){
              
      $this -> db -> where('id',$id);
      $data_res= $this-> db ->get('user_list');
      $data_res->row();
       
      if($data_res->row()){
        
         return $data_res->row(); 
        
      }
      else{
         return false;


      }

}
public function profile_update($data){

   $id=$data['id'];

    $data=$this->db->set($data);
    $data=$this->db->where('id',$id);
   
    $data=$this->db->update('user_list');
          return true;



}
public function password_update($data,$id){

    $data=$this->db->set($data);
    $data=$this->db->where('id',$id);
   
    $data=$this->db->update('user_list');
          return true;





}







   




}
?>