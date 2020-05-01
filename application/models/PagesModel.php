<?php

class PagesModel extends MY_Model {

    public $_table = 'pages';


    public function getPageIdBySlug($slug)
    {
        if($slug)
        {
             $this->db->select('id'); 
            $this->db->where('slug=', $slug);
        }
        $query = $this->db->get($this->_table);

        //echo $this->db->last_query();die();
        return $query->row('id');
    }

    



}
