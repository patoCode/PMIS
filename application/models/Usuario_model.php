<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model {

  public function getAll(){
    $q = $this->db->get('usuario');
    $response = $q->result();
    return $response;
  }

  public function insert($data){
    if($this->db->insert('usuario', $data)){
      return true;
    }
      else{
        return false;
      }
  }

  public function delete($data){
    if($this->db->delete('usuario', $data)){
      return true;
    }
      else{
        return false;
      }
  }

}
