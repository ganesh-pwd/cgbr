<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CartController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProductsModel');
        $this->load->model('ProductImagesModel');
        $this->load->model('CategoriesModel');
        $this->load->model('PagesModel');

    }

    /**
     * Add product to cart.
     */
	public function addToCart()
	{
	    $product_id = $this->input->post('id');


        

	    $product = $this->ProductsModel->get($product_id);
        $qty = 1;
	    if($this->input->post('qty'))
	    {
            $qty = $this->input->post('qty');
        }
        $product_display_img ="";
        $image = $product->cover_image;
	    if($image){
            $product_display_img = $image;
        }
        $price = $this->input->post('current_price');
        $attribute = $this->input->post('attribute');
        $data = array(
            'id'      => $product->id,
            'slug'      => $product->slug,
            'qty'     => $qty,
            'price'   => $price,
            'name'    => $product->name,
            'options' => array('product_image'=> $product_display_img , 'attributes' => $attribute )
        );

        

        $status = $this->cart->insert($data);
        if($status)
        {
            $this->session->set_flashdata('success', 'Product added to cart successfully');
        }
        else{
            $this->session->set_flashdata('error', 'Failed to add product to cart');
        }


        redirect($_SERVER['HTTP_REFERER']);
        exit;

	}

    /**
     * Update cart
     */
	public function updateCart()
    {
        $input_cart = $product_id = $this->input->post('cart');
        $status = $this->cart->update($input_cart);

        if($status)
        {
            $this->session->set_flashdata('success', 'Cart updated successfully');
        }
        redirect($_SERVER['HTTP_REFERER']);
        exit;
    }

    public function removeItem() {
       //echo $this->input->post("product_id");


       if($this->input->server('REQUEST_METHOD')=='POST')
        {
            $status = $this->cart->remove($this->input->post("product_id"));
            if($status){
                $this->session->set_flashdata('info', 'Product deleted successfully.');
            }
            else{
                $this->session->set_flashdata('error', 'Failed to delete Product.');
            }

            redirect(redirect($_SERVER['HTTP_REFERER']));
        }



    }


    /**
     * Display the list of resource.
     *
     *
     */
    public function show()
    { 
        $data['categories'] = $this->CategoriesModel->getParentCategory();
        $data['categoriesMenu'] = $this->CategoriesModel->getParentCategoryMenu();

        foreach ($data['categoriesMenu'] as $key => $value) {
            $child_category = $this->CategoriesModel->getChildCategories($value['id']);
            $data['categoriesMenu'][$key]['child']  = $child_category;
        }

        $data['cart'] = $this->cart->contents();

         $data['page5'] = $this->PagesModel->get(19); 


        //print_r($data['cart'] ); exit();



        $this->load->template('cart/cart',$data);
    }
}
