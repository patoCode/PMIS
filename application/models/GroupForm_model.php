<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'models/custom/SYS_Model.php';


class GroupForm_model extends SYS_model{

    public function create($input){
        print_r($input);
        return $this->db->insert('pmis_grupo_form', $input);
    }
    public function update($input, $id){}
    public function delete(){}
    public function list(){}
    public function findById($id){}
    /**
     * Undocumented function
     *
     * @param [type] $idGroup
     * @param [type] $idForm
     * @return void
     */
    public function checkGroup($idGroup, $idForm){
        $this->db->select('*');
        $this->db->from('pmis_grupo_form');
        $this->db->where('id_grupo',$idGroup);
        $this->db->where('id_formulario',$idForm);
        $this->db->where('estado_reg',ESTADO_REG_VALID);
        $this->db->where('estado',ESTADO_ACTIVO);

        $query = $this->db->get();
        $result = $query->num_rows();
        if($result > 0)
            return false;
        else
            return true;

    }
    public function listGroup($idForm){
        $this->db->select('*');
        $this->db->from('pmis_grupo_form gf');
        $this->db->join('pmis_grupo g','g.id_grupo = gf.id_grupo');
        $this->db->where('g.estado_reg',ESTADO_REG_VALID);
        $this->db->where('gf.estado_reg',ESTADO_REG_VALID);
        $this->db->where('gf.estado',ESTADO_ACTIVO);
        $this->db->where('gf.id_formulario', $idForm);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

}
