<?php
  class clEdificios extends CI_Model {
       
      public function __construct(){        
        $this->load->database();
        $this->tblName = 'adm_edf_edificio';
      }
      
      //API call - get a book user by credentials
      public function getUsuarioPorCred($user, $pass){  
           $this->db->where('usr_usuario',$user);
           $this->db->where('usr_contrasenia',$pass);           
           $query = $this->db->get($this->tblName);           
           if($query->num_rows() == 1)
           {
               return $query->result_array();
           }
           else
           {
             return 0;
          }
      }

    //API call - get all user record
    public function getEdificios(){   
        $query = $this->db->get($this->tblName);
        if($query->num_rows() > 0){
          return $query->result_array();
        }else{
          return 0;
        }
    }
   
   //API call - delete a user record
    public function borrarDatos($id){
       $this->db->where('id', $id);
       $this->db->delete($this->tblName);
       if($this->db->affected_rows()>0){
          return true;
        }else{
          return false;
        }
   }
   
   //API call - add/update user record
    public function guardarDatos($id, $data){
        if (condition) {
            if($this->db->insert($this->tblName, $data)){
                return true;
            }else{
                return false;
            }
        }else{
            $this->db->where('id', $id);
            if($this->db->update($this->tblName, $data)){
                return true;
            }else{
                return false;
            }
        }
        
    }
}