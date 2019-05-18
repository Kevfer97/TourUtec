<?php
  class clEdificios extends CI_Model {
       
      public function __construct(){        
        $this->load->database();
        $this->tblName = 'adm_sec_seccion';
      }            
    
      public function getEdificios_fil($dat){
        $sp = "CALL sp_crud_edificios(?, ?, ?, ?, ?, ?, ?);";
        // $data = array('opc' => 1, 't' => $top, 'c' => $edf_codigo, 'n' => $edf_nombre, 'o' => $edf_orden, 'l' => $edf_latitud, 'lo' => $edf_longitud, 'a' => $edf_acronimo);
        // if ($dat['t'] > 0) {
        //   $this->db->limit($dat['t']);
        // }else {
        //   $this->db->limit(100);
        // }
        $result = $this->db->query($sp, $dat);
        // if($top > 0){
        //   $this->db->limit($top);
        // }        
        // $this->db->where('edf_codigo',$edf_codigo);
        // $this->db->or_where('edf_nombre',$edf_nombre);  
        // $this->db->or_where('edf_orden',$edf_orden);
        // $this->db->or_where('edf_latitud',$edf_latitud);  
        // $this->db->or_where('edf_longitud',$edf_longitud);
        // $this->db->or_where('edf_acronimo',$edf_acronimo);  
        // $query = $this->db->get($this->tblName);
        if($result->num_rows()> 0){
          return $result->result_array();
        }else{
          return 0;
        }
    }

    //API call - get all user record
    public function getEdificios(){ 
      $sp = "CALL sp_crud_edificios(?, ?, ?, ?, ?, ?, ?);";
      $data = array('opc' => 1, 'c' => 0, 'n' => '', 'o' => 0, 'l' => 0, 'lo' => 0, 'a' => '');
      // if ($top > 0) {
      //   $this->db->limit($top);
      // }else {
      //   $this->db->limit(5);
      // }
      $result = $this->db->query($sp, $data);
      // if($top > 0){
      //   $this->db->limit($top);
      // }        
      // $this->db->where('edf_codigo',$edf_codigo);
      // $this->db->or_where('edf_nombre',$edf_nombre);  
      // $this->db->or_where('edf_orden',$edf_orden);
      // $this->db->or_where('edf_latitud',$edf_latitud);  
      // $this->db->or_where('edf_longitud',$edf_longitud);
      // $this->db->or_where('edf_acronimo',$edf_acronimo);  
      // $query = $this->db->get($this->tblName);
      if($result->num_rows() > 0){
        return $result->result_array();
      }else{
        return 0;
      }
    }
   
   //API call - delete a user record
    public function borrarDatos($id){
        $sp = "CALL sp_crud_edificios(?, ?, ?, ?, ?, ?, ?, ?);";
        $data = array('opc' => 5, 't' => 0, 'c' => $id, 'n' => '', 'o' => 0, 'l' => 0, 'lo' => 0, 'a' => '');
        $result = $this->db->query($sp, $data);
        if($result->num_rows() > 0){
          return $result->num_rows();
        }else{
          return 0;
        }
      //  if($this->db->affected_rows()>0){
      //     return true;
      //   }else{
      //     return false;
      //   }
   }
   
   //API call - add/update user record
    public function guardarDatos($id, $data){
      $sp = "CALL sp_crud_edificios(?, ?, ?, ?, ?, ?, ?, ?);";
      // $data = array('opc' => 1, 't' => 0, 'c' => $id, 'n' => '', 'o' => 0, 'l' => 0, 'lo' => 0, 'a' => '');      
      $result = $this->db->query($sp, $data);
      if($id > 0){
        $this->db->where('edf_codigo',$id);
        $query = $this->db->get($this->tblName);
        return $query->result_array();
      }else {
        return $this->db->insert_id();
      }
             

      // if ($id == 0) {
      //   if($this->db->insert($this->tblName, $data)){
      //   $this->db->where('edf_codigo',$this->db->insert_id());
      //   $query = $this->db->get($this->tblName);
      //   return $query->result_array();
      //   // return ;
      // }else{
      //     return 0;
      // }
      //   }else{
      //       $this->db->where('edf_codigo', $id);
      //       if($this->db->update($this->tblName, $data)){
      //         $this->db->where('edf_codigo',$id);
      //         $query = $this->db->get($this->tblName);
      //           return $query->result_array();
      //       }else{
      //           return 0;
      //       }
      //   }
        
    }
}