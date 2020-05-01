<?php

class OrderProductModel extends MY_Model {
    public $_table = 'order_product';

    public function getProductsByOrderIds(array $order_ids)
    {
        $this->db->select("$this->_table.*");
        $this->db->select("products.name as product_name");
        $this->db->select("product_images.path as product_img");
        $this->db->select("orders.total_amt as total");
        $this->db->select("orders.order_status as status");
        $this->db->from($this->_table);

        $this->db->where_in("order_id",$order_ids);

        $this->db->join("products","$this->_table.product_id = products.id");
        $this->db->join("product_images","product_images.product_id = products.id");
        $this->db->join("orders","orders.id = order_product.order_id");
        $this->db->group_by("$this->_table.id");

        $query = $this->db->get();

       return $query->result();




    }
}