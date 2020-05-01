<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CheckoutController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
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
     * Display the list of resource.
     */
    public function index()
    {
         $data['page5'] = $this->PagesModel->get(19); 
        $data['categories'] = $this->CategoriesModel->getParentCategory();
        $data['categoriesMenu'] = $this->CategoriesModel->getParentCategoryMenu();
        foreach ($data['categoriesMenu'] as $key => $value) {
            $child_category = $this->CategoriesModel->getChildCategories($value['id']);
            $data['categoriesMenu'][$key]['child']  = $child_category;
        }

        //if cart is empty,
        if(count($this->cart->contents()) == 0){
            $this->session->set_flashdata('error', 'Please add items  to cart first');
            redirect(base_url('/'));
            exit();
        }
        $data['cart'] = $this->cart->contents();

        $data['diff_address'] = 0 ;

        if($this->input->server('REQUEST_METHOD') == 'POST'){

            $this->load->model('OrdersModel');
        $this->load->model('OrderProductModel');

        $cart_contents = $this->cart->contents();

        $total_amt = $this->cart->total(); //Temperory set to cart total

        $inputs = $this->input->post();

        if(isset($inputs['diff_address'])){
             $diff_address = $inputs['diff_address'];
        }else {
             $diff_address = 0 ;
        }


        $this->setCheckoutValidationRules($diff_address);


        if($this->form_validation->run())
        {

            $billing_address =  array('billing_first_name' => $inputs['billing_first_name'] , 'billing_last_name' => $inputs['billing_last_name'] ,'billing_company' => $inputs['billing_company'] ,'billing_country' => $inputs['billing_country'] ,'billing_street_addr_1' => $inputs['billing_street_addr_1'] ,'billing_street_addr_2' => $inputs['billing_street_addr_2'] ,'billing_city' => $inputs['billing_city'] ,'billing_state' => $inputs['billing_state'] ,'billing_zip' => $inputs['billing_zip'] ,'billing_phone' => $inputs['billing_phone']  ,'billing_email' => $inputs['billing_email']   );

             $delivery_address =  array('delivery_first_name' => $inputs['delivery_first_name'] , 'delivery_last_name' => $inputs['delivery_last_name'] ,'delivery_company' => $inputs['delivery_company'] ,'delivery_country' => $inputs['delivery_country'] ,'delivery_street_addr_1' => $inputs['delivery_street_addr_1'] ,'delivery_street_addr_2' => $inputs['delivery_street_addr_2'] ,'delivery_city' => $inputs['delivery_city'] ,'delivery_state' => $inputs['delivery_state'] ,'delivery_zip' => $inputs['delivery_zip'] ,'delivery_phone' => $inputs['delivery_phone']  ,'delivery_email' => $inputs['delivery_email']   );


                $order_data = array(
                    'user_id' => $this->session->userdata('user')->id,//Logged in user id
                    'delivery_address' => serialize($delivery_address),
                    'billing_address'=> serialize($billing_address),
                    'order_status' => 'pending',
                    'total_amt'=> $total_amt
                );
                $order_id = $this->OrdersModel->insert($order_data);



                foreach ($cart_contents as $product){
                   if($product['options']['attributes'] != ''){
                      $attributes = serialize($product['options']['attributes']);
                    } else{
                       $attributes ='';
                    }


                    $order_product_data = array(
                        'product_id' => $product['id'],
                        'order_id'=>$order_id,
                        'qty'=>$product['qty'],
                        'attributes' => $attributes
                    );
                    $this->OrderProductModel->insert($order_product_data);
                }
                    if($order_id){

                         /********************* PDF Coversion Area ******************/
$pdf = '
// You can put your HTML code here
< h1 > Lorem Ipsum... </ h1 >
< h2 > Lorem Ipsum... </ h2 >
< h3 > Lorem Ipsum... </ h3 >
< h4 > Lorem Ipsum... </ h4 >
';

//require('TCPDF/tcpdf.php');

require_once(dirname(__FILE__) . '/TCPDF/tcpdf.php');


$tcpdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set default monospaced font
$tcpdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set title of pdf
$tcpdf->SetTitle('Bill Collection Letter');

// set margins
$tcpdf->SetMargins(10, 10, 10, 10);
$tcpdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$tcpdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set header and footer in pdf
$tcpdf->setPrintHeader(false);
$tcpdf->setPrintFooter(false);
$tcpdf->setListIndentWidth(3);

// set auto page breaks
$tcpdf->SetAutoPageBreak(TRUE, 11);

// set image scale factor
$tcpdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$tcpdf->AddPage();

$tcpdf->SetFont('times', '', 10.5);

$tcpdf->writeHTML($pdf, true, false, false, false, '');

//Close and output PDF document
//$tcpdf->Output('demo.pdf', 'F');


$filename= "demo.pdf"; 
$filelocation = "C:\\xampp\\htdocs\\JalousieScout";//windows
//$filelocation = "/httpdocs/assets/order_pdf/"; //Linux

$fileNL = $filelocation."\\".$filename;//Windows
//$fileNL = $filelocation."/".$filename; //Linux

$tcpdf->Output($fileNL, 'F');

                        /******************* PDF Conversion Area ****************************/



                        //$this->cart->destroy();
                        $this->session->set_flashdata('success', 'Order placed successfully');
                        redirect(base_url('index.php/payment/'.urlencode( base64_encode($order_id))));
                        exit;
                    }
                    else{
                        $this->session->set_flashdata('error', 'Oops! Something went wrong.');
                        redirect(base_url('/'));
                        exit;
                    }

        } else {
            $data['diff_address'] = $diff_address;
        }

        }

        $this->load->template('checkout/checkout',$data);
    }

    /**
     * Place order
     */
    public function placeOrder()
    {
        $this->load->model('OrdersModel');
        $this->load->model('OrderProductModel');

        $cart_contents = $this->cart->contents();

        $total_amt = $this->cart->total(); //Temperory set to cart total

        $inputs = $this->input->post();


        $this->setCheckoutValidationRules();


        if($this->form_validation->run())
        {

            $billing_address =  array('billing_first_name' => $inputs['billing_first_name'] , 'billing_last_name' => $inputs['billing_last_name'] ,'billing_company' => $inputs['billing_company'] ,'billing_country' => $inputs['billing_country'] ,'billing_street_addr_1' => $inputs['billing_street_addr_1'] ,'billing_street_addr_2' => $inputs['billing_street_addr_2'] ,'billing_city' => $inputs['billing_city'] ,'billing_state' => $inputs['billing_state'] ,'billing_zip' => $inputs['billing_zip'] ,'billing_phone' => $inputs['billing_phone']  ,'billing_email' => $inputs['billing_email']   );

             $delivery_address =  array('delivery_first_name' => $inputs['delivery_first_name'] , 'delivery_last_name' => $inputs['delivery_last_name'] ,'delivery_company' => $inputs['delivery_company'] ,'delivery_country' => $inputs['delivery_country'] ,'delivery_street_addr_1' => $inputs['delivery_street_addr_1'] ,'delivery_street_addr_1' => $inputs['delivery_street_addr_1'] ,'delivery_city' => $inputs['delivery_city'] ,'delivery_state' => $inputs['delivery_state'] ,'delivery_zip' => $inputs['delivery_zip'] ,'delivery_phone' => $inputs['delivery_phone']  ,'delivery_email' => $inputs['delivery_email']   );


                $order_data = array(
                    'user_id' => $this->session->userdata('user')->id,//Logged in user id
                    'delivery_address' => serialize($delivery_address),
                    'billing_address'=> serialize($billing_address),
                    'order_status' => '1',
                    'total_amt'=> $total_amt
                );
                $order_id = $this->OrdersModel->insert($order_data);



                foreach ($cart_contents as $product){
                   if($product['options']['attributes'] != ''){
                      $attributes = serialize($product['options']['attributes']);
                    } else{
                       $attributes ='';
                    }


                    $order_product_data = array(
                        'product_id' => $product['id'],
                        'order_id'=>$order_id,
                        'qty'=>$product['qty'],
                        'attributes' => $attributes
                    );
                    $this->OrderProductModel->insert($order_product_data);
                }
                    if($order_id){
                        $this->cart->destroy();
                        $this->session->set_flashdata('success', 'Order placed successfully');
                        redirect(base_url('/'));
                        exit;
                    }
                    else{
                        $this->session->set_flashdata('error', 'Oops! Something went wrong.');
                        redirect(base_url('/'));
                        exit;
                    }

        }

    }



    /**
     * Set validation rule for Rgister form
     */
    public function setCheckoutValidationRules($diff_address)
    {


        $this->form_validation->set_rules('billing_first_name','First Name','trim|required|max_length[128]');
        $this->form_validation->set_rules('billing_last_name','Last Name','trim|required|max_length[128]');
        $this->form_validation->set_rules('billing_company','Company','trim|required|max_length[128]');
        $this->form_validation->set_rules('billing_country','Country','trim|required|max_length[128]');
        $this->form_validation->set_rules('billing_street_addr_1','Street Address','trim|required|max_length[128]');
        $this->form_validation->set_rules('billing_city','City','trim|required|max_length[128]');
        $this->form_validation->set_rules('billing_state','State','trim|required|max_length[128]');
        $this->form_validation->set_rules('billing_zip', 'Zip', 'required|numeric|xss_clean');
        $this->form_validation->set_rules('billing_phone', 'Phone Number ', 'required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('billing_email','Email','trim|required|valid_email|max_length[128]');

        if($diff_address  == 1) {

        $this->form_validation->set_rules('delivery_first_name','First Name','trim|required|max_length[128]');
        $this->form_validation->set_rules('delivery_last_name','Last Name','trim|required|max_length[128]');
        $this->form_validation->set_rules('delivery_company','Company','trim|required|max_length[128]');
        $this->form_validation->set_rules('delivery_country','Country','trim|required|max_length[128]');
        $this->form_validation->set_rules('delivery_street_addr_1','Street Address','trim|required|max_length[128]');
        $this->form_validation->set_rules('delivery_city','City','trim|required|max_length[128]');
        $this->form_validation->set_rules('delivery_state','State','trim|required|max_length[128]');
        $this->form_validation->set_rules('delivery_zip', 'Zip', 'required|numeric|xss_clean');
        $this->form_validation->set_rules('delivery_phone', 'Phone Number ', 'required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('delivery_email','Email','trim|required|valid_email|max_length[128]');
       }



    }


}
