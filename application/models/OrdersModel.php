<?php

class OrdersModel extends MY_Model {
    public $_table = 'orders';
	public $belongs_to = array( 'user' );


    public function getOrder($id){

        $this->db->select("$this->_table.*");
        $this->db->select("users.name as user_name, users.email");
        $this->db->select("order_product.product_id as product_id , order_product.attributes as attributes , order_product.qty as qty ");
        $this->db->select("products.name as product_name");
        $this->db->join('users',"users.id = $this->_table.user_id","inner");
        $this->db->join('order_product',"order_product.order_id = $this->_table.id","inner");
        $this->db->join('products'," products.id = order_product.product_id","inner");
        $this->db->from($this->_table);

        $this->db->where("orders.id",$id);
        $result = $this->db->get();

        return $result->result();
    }

    public function countNew(){
        $this->db->select("$this->_table.id");
        $this->db->from($this->_table);
        $this->db->where("order_status","1");
        $query = $this->db->get();

        return $query->num_rows();

    }

    public function getUserOrders($user_id){
        $this->db->select("*");
        $this->db->from($this->_table);
        $this->db->where("user_id",$user_id);

        $query = $this->db->get();

        //$return = $query->result();
        return $query->result();


    }

    public function getUserOrderIds($user_id)
    {
        $this->db->select("id");
        $this->db->from($this->_table);
        $this->db->where("user_id",$user_id);
        $query = $this->db->get();
        $results = $query->result();

        $order_ids = array();
        foreach ($results as $row){
            $order_ids[] =  $row->id;
        }

        //$return = $query->result();
        return $order_ids;

    }


    public function getAllOrders(){

        $this->db->select("$this->_table.*");
        $this->db->select("users.name as user_name, users.email as email");
        $this->db->join('users',"users.id = $this->_table.user_id","inner");
        $this->db->from($this->_table);
        $query = $this->db->get();
        return  $results = $query->result();

    }
}
