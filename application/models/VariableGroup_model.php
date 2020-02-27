<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'models/custom/SYS_Model.php';


class VariableGroup_model extends SYS_model{
    public function create($input){
        return $this->db->insert('pmis_variable_grupo', $input);
    }
    public function update($input, $id){}
    public function delete(){}
    public function list(){}
    public function findById($id){}

    public function checkVariable($idVariable, $idGroup){
        $this->db->select('*');
        $this->db->from('pmis_variable_grupo');
        $this->db->where('id_variable',$idVariable);
        $this->db->where('id_grupo',$idGroup);
        $this->db->where('estado_reg',ESTADO_REG_VALID);
        $this->db->where('estado',ESTADO_ACTIVO);

        $query = $this->db->get();
        $result = $query->num_rows();
        if($result > 0)
            return false;
        else
            return true;

    }

    /**
     * return all variables in group
     *
     * @param [int] $idGroup
     * @return array of variables
     */
    public function listVariable($idGroup){
        $this->db->select('pv.id_variable, id_archivo, id_unidad, id_formato, nombre, descripcion, label, codigo, requerida, estatica, formula, operable, "table", orden, pvg.estado, pvg.usuario_mod, pvg.fecha_mod, pvg.estado_reg');
        $this->db->from('pmis_variable_grupo pvg');
        $this->db->join('pmis_variable pv','pv.id_variable = pvg.id_variable');
        $this->db->where('pvg.estado_reg',ESTADO_REG_VALID);
        $this->db->where('pv.estado_reg',ESTADO_REG_VALID);
        $this->db->where('pvg.estado',ESTADO_ACTIVO);
        $this->db->where('pvg.id_grupo', $idGroup);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
}