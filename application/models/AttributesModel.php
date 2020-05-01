<?php

class AttributesModel extends MY_Model {

    public $_table = 'attributes';

    public function getAttributesDropdown($id = null)
    {
        if($id)
        {
            $this->db->where('id!=', $id);
        }
        $query = $this->db->get($this->_table);

        //echo $this->db->last_query();die();
        return $query->result_array();
    }

    public function getAttributesList($id)
    { 
        if($id)
        {
            $this->db->where('id=', $id);
        }
        $query = $this->db->get($this->_table);

        //echo $this->db->last_query();die();
        return $query->row_array();
    }





}
