<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {
    /**
     * LoginController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        if($this->session->logged_in){
            redirect(base_url());
        }
        $this->load->model('UsersModel');
        $this->load->model('CategoriesModel');
        $this->load->model('PagesModel');
        
    }

    /**
     * Set validation rule for Login form
     */
    public function setValidationRules()
    {
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
        $this->form_validation->set_rules('password','Password','trim|required');
    }


    /**
     * Set validation rule for Forget Password form
     */
    public function setForgetPasswordValidationRules()
    {
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
        //$this->form_validation->set_rules('password','Password','trim|required');
    }


    /**
     * Show Login form. Attempt Login if POST request.
     */
    public function showLoginForm()
    { 
        $data['categories'] = $this->CategoriesModel->getParentCategory();
        $data['categoriesMenu'] = $this->CategoriesModel->getParentCategoryMenu();
        foreach ($data['categoriesMenu'] as $key => $value) {
            $child_category = $this->CategoriesModel->getChildCategories($value['id']);
            $data['categoriesMenu'][$key]['child']  = $child_category;
        }

        $data['page5'] = $this->PagesModel->get(19);

        if($this->input->server('REQUEST_METHOD') == 'POST'){
            //Set Validation rules
            $this->setValidationRules();
            if($this->form_validation->run())
            {
                $email = $this->input->post('email');
                //Encrypt password using MD5
                $password = md5($this->input->post('password'));
                $user = $this->UsersModel->attemptLogin($email,$password);
                if($user){
                    //Set user session
                    $this->setUserSession($user);

                    //If user attempted to access session protected page.
                   /* $redirect_url = $this->session->userdata('redirect_to');
                    if($redirect_url){
                        redirect($redirect_url);
                    }
                    else{
                        redirect(base_url());
                    }*/
                    redirect(base_url());
                    

                }
                else{
                    //Invalid credentials.
                    $this->session->set_flashdata('error', 'Email or password incorrect');
                    //Redirect back
                    redirect($_SERVER['HTTP_REFERER']);
                    exit;
                }
            }
        }
        $this->load->template("customer_auth/login",$data);
    }

    /**
     * Set Users Login session
     *
     * @param $user
     */
    private function setUserSession($user)
    {

        $logged_in = array(
            'user'  => $user,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($logged_in);
    }

    /**
     * Set validation rule for Rgister form
     */
    public function setRegValidationRules()
    {
        $this->form_validation->set_rules('salutation','Salutation','trim|required');
        $this->form_validation->set_rules('first_name','First Name','trim|required|max_length[128]');
        $this->form_validation->set_rules('surname','Surname','trim|required|max_length[128]');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
        $this->form_validation->set_rules('confirm_email', 'Confirm Email', 'required|matches[email]');
        $this->form_validation->set_rules('phone', 'Phone Number ', 'required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('country','Country','trim|required|max_length[128]');
        $this->form_validation->set_rules('city','City','trim|required|max_length[128]');
        $this->form_validation->set_rules('postcode', 'Postcode', 'required|numeric|xss_clean');
        $this->form_validation->set_rules('house_no','House No','trim|required');
        $this->form_validation->set_rules('road','Road','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
    }



    /**
     * Show Register form.
     */
    public function showRegisterForm()
    { 
        $data['categories'] = $this->CategoriesModel->getParentCategory();
        $data['categoriesMenu'] = $this->CategoriesModel->getParentCategoryMenu();
        foreach ($data['categoriesMenu'] as $key => $value) {
            $child_category = $this->CategoriesModel->getChildCategories($value['id']);
            $data['categoriesMenu'][$key]['child']  = $child_category;
        }

        $data['page5'] = $this->PagesModel->get(19);

        if($this->input->server('REQUEST_METHOD') == 'POST'){
            //Set Validation rules
            $this->setRegValidationRules();
            if($this->form_validation->run())
            {

                $inputs = $this->input->post();

                $email = $this->input->post('email');
                $user = $this->UsersModel->checkUser($email);

                if($user){
                    //User Exists.
                    $this->session->set_flashdata('error', 'Email already exists!');
                    //Redirect back
                    redirect($_SERVER['HTTP_REFERER']);
                    exit;
                } else {


                        //Encrypt password using MD5
                        $inputs['password'] = md5($this->input->post('password'));
                        $inputs['created_at'] = date('Y-m-d H:i:s');
                        $inputs['updated_at'] = date('Y-m-d H:i:s');

                        $details = array('salutation' =>  $inputs['salutation'] , 'phone' =>  $inputs['phone'] , 'country' =>  $inputs['country'] , 'city' =>  $inputs['city'] , 'postcode' =>  $inputs['postcode'] , 'house_no' =>  $inputs['house_no'] , 'road' =>  $inputs['road'] );

                        $data = array(
                                'name' =>  $inputs['first_name']." ".$inputs['surname'],
                                'email' => $inputs['email'],
                                'password' =>  $inputs['password'],
                                'details' => serialize($details),
                                'role_id'  => 3 ,
                                'created_at' => $inputs['created_at'] ,
                                'updated_at' => $inputs['updated_at'] 
                        );

                        $insert_id = $this->UsersModel->register($data);
                        if($insert_id){
                             //Success.
                            $this->session->set_flashdata('success', 'Registration succesfull');
                            //Redirect back
                            redirect($_SERVER['HTTP_REFERER']);
                            exit;
                        }
                        else{
                            //Invalid credentials.
                            $this->session->set_flashdata('error', 'Email or password incorrect');
                            //Redirect back
                            redirect($_SERVER['HTTP_REFERER']);
                            exit;
                        }


                }


            }
        }
        $this->load->template("customer_auth/register",$data);
    }






    /**
     * Show Forget Password form. Attempt Login if POST request.
     */
    public function forgetPasswordForm()
    {   
        $data['categories'] = $this->CategoriesModel->getParentCategory();
        $data['categoriesMenu'] = $this->CategoriesModel->getParentCategoryMenu();
        foreach ($data['categoriesMenu'] as $key => $value) {
            $child_category = $this->CategoriesModel->getChildCategories($value['id']);
            $data['categoriesMenu'][$key]['child']  = $child_category;
        }

        $data['page5'] = $this->PagesModel->get(19);

        if($this->input->server('REQUEST_METHOD') == 'POST'){ 
            //Set Validation rules
            $this->setForgetPasswordValidationRules();
            if($this->form_validation->run())
            {
                $email = $this->input->post('email');
                $user = $this->UsersModel->checkUser($email);

               
                if($user){


                    /************** Email Template Area ****************/

                             $this->load->library('email');
                             
                                       $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                        <html xmlns="http://www.w3.org/1999/xhtml">
                        <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <title>JalousieScout</title>
                        </head>

                        <body style="background-color:#ffffff;">
                        <table width="750" border="0" cellspacing="0" cellpadding="0" align="center">
                          <tr>
                            <td bgcolor="#ffffff" style="color: #000; font:bold 24px Arial, Helvetica, sans-serif; padding: 25px 0 20px 0; text-align: center;"><img src="https://shadow-eu.de/assets/html/images/logo.jpg" alt="" border="0" style="display: inline-block; height: auto; margin: 0 0 10px 0; vertical-align: middle; width: 150px;" /></td>
                          </tr>
                          <tr>
                            <td style="color: #000; font: normal 16px Arial, Helvetica, sans-serif; padding: 25px 0 15px 0;">
                              <a href="'.base_url('reset-password').'"> Passwort zurücksetzen </a>
                            </td>
                          </tr>

                          
                          
                          
                          

                          <tr>
                            <td align="center" valign="middle" style="color:#000; font:normal 13px Arial, Helvetica, sans-serif; padding: 20px 0 30px 0;"><img src="https://shadow-eu.de/assets/html/images/footer-logo.jpg" alt="" border="0" style="display: inline-block; height: auto; margin: 0 0 10px 0; vertical-align: middle; width: 150px;" />
                              </td>
                          </tr>
                        </table>
                        </body>
                        </html>
                        ';

                    $this->email->from("info@shadow-eu.de",'Passwort vergessen');
                    //$this->email->to('info@shadow-eu.de');
                    $this->email->to($email);
                    $this->email->set_mailtype("html");
                    $this->email->subject('Passwort vergessen');
                    $this->email->message($message);


                    $this->email->send();


                            /***************** Email Template Area ***********************/


                    
                    $this->session->set_flashdata('success', 'Please check your email to reset password!');
                    //Redirect back
                    redirect($_SERVER['HTTP_REFERER']);
                    exit;
                    

                }
                else{
                    //Invalid credentials.
                    $this->session->set_flashdata('error', 'Email not exist!');
                    //Redirect back
                    redirect($_SERVER['HTTP_REFERER']);
                    exit;
                }
            }
        }
        $this->load->template("customer_auth/forget_password",$data);
    }



    /**
     * Show Reset Password form. Attempt Reset Password if POST request.
     */
    public function resetPasswordForm()
    { 
        $data['categories'] = $this->CategoriesModel->getParentCategory();
        $data['categoriesMenu'] = $this->CategoriesModel->getParentCategoryMenu();
        foreach ($data['categoriesMenu'] as $key => $value) {
            $child_category = $this->CategoriesModel->getChildCategories($value['id']);
            $data['categoriesMenu'][$key]['child']  = $child_category;
        }

        $data['page5'] = $this->PagesModel->get(19);

        if($this->input->server('REQUEST_METHOD') == 'POST'){
            //Set Validation rules
            $this->setValidationRules();
            if($this->form_validation->run())
            {
                $email = $this->input->post('email');
                //Encrypt password using MD5
                $password = md5($this->input->post('password'));
                $user = $this->UsersModel->checkUser($email);


                if($user){

                    $data = array(             
                    'password' =>  md5($this->input->post('password')),
                    'updated_at' => date('Y-m-d H:i:s') 
                );
 

                $user_id = $this->UsersModel->updateUser($data,$user->id);

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
                else{
                    //Invalid credentials.
                    $this->session->set_flashdata('error', 'Email does not exist!');
                    //Redirect back
                    redirect($_SERVER['HTTP_REFERER']);
                    exit;
                }
            }
        }
        $this->load->template("customer_auth/reset_password",$data);
    }




}
