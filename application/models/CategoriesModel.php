<?php

class CategoriesModel extends MY_Model {

    public $_table = 'categories';

    public function getCategoriesDropdown($id = null)
    {
        if($id)
        {
            $this->db->where('id!=', $id);
        }
        $query = $this->db->get($this->_table);

        //echo $this->db->last_query();die();
        return $query->result_array();
    }


    public function getSliderCategory()
    {

        $this->db->select('categories.* , min(products.price) as min_price');
        $this->db->where('slider=', 1);
        $this->db->join('products','categories.id = products.category_id');
        $this->db->group_by('categories.id');

        $query = $this->db->get($this->_table);


        //echo $this->db->last_query();die();
        return $query->result();
    }



    public function getSubCategories($id)
    {
        if($id)
        {
            $this->db->where('parent_id=', $id);
        }
        $query = $this->db->get($this->_table);

        //echo $this->db->last_query();die();
        return $query->result();
    }


    public function getChildCategories($id)
    {
        if($id)
        {
            $this->db->where('parent_id=', $id);
        }
        $query = $this->db->get($this->_table);

        return $query->result_array();
    }


    public function getCategory($id)
    {
        if($id)
        {
            $this->db->where('id=', $id);
        }
        $query = $this->db->get($this->_table);

        //echo $this->db->last_query();die();
        return $query->result_array();
    }


    public function getParentCategory()
    {
        
        $this->db->where('parent_id=', 0);
        $query = $this->db->get($this->_table);

        //echo $this->db->last_query();die();
        return $query->result();
    }


     public function getParentCategoryMenu()
    {
        
        $this->db->where('parent_id=', 0);
        $query = $this->db->get($this->_table);

        //echo $this->db->last_query();die();
        return $query->result_array();
    }


     public function getCategoryIdBySlug($slug)
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
