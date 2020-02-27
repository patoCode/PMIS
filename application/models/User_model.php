<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'models/custom/SYS_Model.php';

class User_model extends SYS_Model {

    public function create($input){}
    public function update($input, $id){}
    public function delete(){}
    public function list(){
        $this->db->where('estado_reg',ESTADO_REG_VALID);
        $this->db->where('estado',ESTADO_ACTIVO);
        $query = $this->db->get('pmis_usuario');
        $result = $query->result();
        return $result;
    }
    public function findById($id){
        $this->db->select("username, email, nombre, apellido_pat, apellido_mat, CONCAT(nombre, ' ', apellido_pat, ' ', apellido_mat) as fullname");
        $this->db->from('pmis_usuario u');
        $this->db->join('pmis_persona p', 'p.id_persona = u.id_persona');
        $this->db->where('u.id_usuario', $id);
        $this->db->where('u.estado_reg',ESTADO_REG_VALID);
        $this->db->where('p.estado_reg',ESTADO_REG_VALID);
        $this->db->where('u.estado',ESTADO_ACTIVO);
        $query = $this->db->get();
        $result = $query->num_rows();
        if($result > 0)
            return $query->row();
        else
            return null;
    }

    public function checkUser($username, $password){
        $this->db->select('id_usuario, username, password, estado, ldap, usuario_mod, fecha_mod, estado_reg, email');
        $this->db->from('pmis_usuario');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->where('estado_reg',ESTADO_REG_VALID);
        $this->db->where('estado',ESTADO_ACTIVO);
        $query = $this->db->get();
        $result = $query->num_rows();
        if($result > 0)
            return $query->row();
        else
            return null;
    }

}
