<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileController extends CI_Controller {
    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CategoriesModel');
        $this->load->model('ProductsModel');
        $this->load->model('UsersModel');
        $this->load->model('PagesModel');

        if(!$this->session->logged_in){
            redirect(base_url('customer-login'));
            exit;
        }
    }

    public function setRegValidationRules()
    {
        $this->form_validation->set_rules('password','Password','trim|required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
    }

    /**
     * Display user Profile page
     */
    public function index()
    {
        $this->load->model('UsersModel');
        $auth_user = $this->session->userdata("user");
        $user = $this->UsersModel->get($auth_user->id);
        $data['categories'] = $this->CategoriesModel->getParentCategory();
        $data['page5'] = $this->PagesModel->get(19); 
        $data['categoriesMenu'] = $this->CategoriesModel->getParentCategoryMenu();
        foreach ($data['categoriesMenu'] as $key => $value) {
            $child_category = $this->CategoriesModel->getChildCategories($value['id']);
            $data['categoriesMenu'][$key]['child']  = $child_category;
        }

        $inputs = $this->input->post();
        if($this->input->server('REQUEST_METHOD')=='POST')
        {

                    $details = array('salutation' =>  $inputs['salutation'] , 'phone' =>  $inputs['phone'] , 'country' =>  $inputs['country'] , 'city' =>  $inputs['city'] , 'postcode' =>  $inputs['postcode'] , 'house_no' =>  $inputs['house_no'] , 'road' =>  $inputs['road'] );

                    $data = array(
                                'name' =>  $inputs['first_name']." ".$inputs['surname'],
                                'details' => serialize($details),
                                'updated_at' => date('Y-m-d H:i:s') 
                    );
                    

                    $user_id = $this->UsersModel->updateUser($data,$auth_user->id);
                    if($user_id){
                             //Success.
                            $this->session->set_flashdata('success', 'Update succesfull');
                            //Redirect back
                            redirect($_SERVER['HTTP_REFERER']);
                            exit;
                    }
                        else{
                            //Invalid credentials.
                            $this->session->set_flashdata('error', 'Temporary server error');
                            //Redirect back
                            redirect($_SERVER['HTTP_REFERER']);
                            exit;
                    }     
          
        }     

        $data['user'] = $user;
        $this->load->template('profile/profile',$data);
    }


     public function updatePassword()
    {
        $this->load->model('UsersModel');
        $auth_user = $this->session->userdata("user");
        $user = $this->UsersModel->get($auth_user->id);
        $data['categories'] = $this->CategoriesModel->getParentCategory();

        $data['categoriesMenu'] = $this->CategoriesModel->getParentCategoryMenu();
        foreach ($data['categoriesMenu'] as $key => $value) {
            $child_category = $this->CategoriesModel->getChildCategories($value['id']);
            $data['categoriesMenu'][$key]['child']  = $child_category;
        }

        if($this->input->server('REQUEST_METHOD')=='POST')
        {


            $this->setRegValidationRules();
            
             if($this->form_validation->run())
            {
                   
                $data = array(             
                    'password' =>  md5($this->input->post('password')),
                    'updated_at' => date('Y-m-d H:i:s') 
                );
 

                $user_id = $this->UsersModel->updateUser($data,$auth_user->id);
                if($user_id){
                         //Success.
                        $this->session->set_flashdata('success', 'Update succesfull');
                        //Redirect back
                        redirect($_SERVER['HTTP_REFERER']);
                        exit;
                    }
                    else{
                        //Invalid credentials.
                        $this->session->set_flashdata('error', 'Temporary server error');
                        //Redirect back
                        redirect($_SERVER['HTTP_REFERER']);
                        exit;
                    }

                   
          }  
        }     

        $data['user'] = $user;
        $this->load->template('profile/profile',$data);
    }

    /**
     * Display user's orders page
     */
    public function myOrders()
    {
        $data['page5'] = $this->PagesModel->get(19); 
        $data['categoriesMenu'] = $this->CategoriesModel->getParentCategoryMenu();
        $data['categories'] = $this->CategoriesModel->getParentCategory();
        foreach ($data['categoriesMenu'] as $key => $value) {
            $child_category = $this->CategoriesModel->getChildCategories($value['id']);
            $data['categoriesMenu'][$key]['child']  = $child_category;
        }
        
        $this->load->model('OrdersModel');
        $this->load->model('OrderProductModel');
        $user = $this->session->userdata('user');

        //Get user's orders
        $orders = $this->OrdersModel->getUserOrders($user->id);

        $data['orders'] = $orders;
        $order_ids = $this->OrdersModel->getUserOrderIds($user->id);
        $data['order_products'] = $this->OrderProductModel->getProductsByOrderIds($order_ids);
        $data['user'] = "";
        $this->load->template('profile/my-orders',$data);
    }

    /**
     * Show My wishlist table
     */
    public function myWishList()
    {
        $data = array();
        $data['page5'] = $this->PagesModel->get(19); 
        $data['categories'] = $this->CategoriesModel->getParentCategory();

        $data['categoriesMenu'] = $this->CategoriesModel->getParentCategoryMenu();
        foreach ($data['categoriesMenu'] as $key => $value) {
            $child_category = $this->CategoriesModel->getChildCategories($value['id']);
            $data['categoriesMenu'][$key]['child']  = $child_category;
        }
        $user = $this->session->userdata('user');
        $this->load->model('UserWishListModel');

        $data["user_wishlist"] = $this->UserWishListModel->getUserWishList($user->id);

        //print_r(json_encode($data["user_wishlist"]));exit();

        $this->load->template('profile/my-wishlist',$data);
    }
}
