<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
class StripeController extends CI_Controller {
    
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->library("session");
       $this->load->helper('url');

       $this->load->model('ProductsModel');
        $this->load->model('ProductImagesModel');
        $this->load->model('CategoriesModel');
        $this->load->model('PagesModel');
        
        if(!$this->session->userdata('logged_in'))
        {
            $this->session->set_userdata('redirect_to',base_url('index.php/'.uri_string()));
            redirect(base_url('customer-login'));
        }


    }
    
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index($order_id)
    {
        //$this->load->view('my_stripe');

        echo $decoded_str=base64_decode(urldecode($order_id));


        $data['page5'] = $this->PagesModel->get(19); 
        $data['categories'] = $this->CategoriesModel->getParentCategory();
        $data['categoriesMenu'] = $this->CategoriesModel->getParentCategoryMenu();
        foreach ($data['categoriesMenu'] as $key => $value) {
            $child_category = $this->CategoriesModel->getChildCategories($value['id']);
            $data['categoriesMenu'][$key]['child']  = $child_category;
        }

        $data['diff_address'] = 0 ;
        $data['order_id'] = $decoded_str ;
        
        $this->load->template('checkout/payment',$data);
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function stripePost()
    {  
        require_once('application/libraries/stripe-php/init.php');
    
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));

        /* \Stripe\Customer::create([
              'name' => 'Jenny Rosen',
              "source" => $this->input->post('stripeToken'),
              'address' => [
                'line1' => '510 Townsend St',
                'postal_code' => '98140',
                'city' => 'San Francisco',
                'state' => 'CA',
                'country' => 'US',
              ],
            ]);*/
     
        \Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "inr",
                "source" => $this->input->post('stripeToken'),
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
            
        $this->session->set_flashdata('success', 'Payment made successfully.');
             
        redirect('index.php/payment/36', 'refresh');

        //redirect('index.php/my-stripe', 'refresh');

    }
}