<?php
class MY_Model extends CI_Model
{
    public function insertData($table, $data)
    {
        return $this->db->insert($table, $data);
    }
    public function replaceData($table, $data)
    {
        return $this->db->replace($table, $data);
    }

    public function updateData($table, $valId, $idName, $data)
    {
        $this->db->where($idName, $valId);
        return $this->db->update($table, $data);
    }

    public function deleteData($table, $valId, $idName)
    {
        $this->db->where($idName, $valId);
        return $this->db->delete($table);
    }

    public function insertGetID($table, $data)
    {
        $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    public function deleteDataParam($table, $where1, $where2, $where3 = null)
    {
        $this->db->where($where1);
        $this->db->where($where2);
        if ($where3 != null) {
            $this->db->where($where3);
        }
        return $this->db->delete($table);
    }

    public function getAllData($table, $order_by = null, $order_type = "asc")
    {
        $this->db->select("*");
        $this->db->from($table);
        if($order_by != null){
            $this->db->order_by($order_by, $order_type);
        }
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getDataWhere($table, $where, $value)
    {
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($where, $value);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDataKota()
    {
        $this->db->select("*");
        $this->db->from('kota');
        $this->db->where("kode_provinsi", '33');
        $query = $this->db->get();
        return $query->result_array();
    }
}
