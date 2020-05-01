<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewsLetterController extends CI_Controller {
    /**
     * ContactUsController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CategoriesModel');
        $this->load->model('PagesModel');
    }

    /**
     * Show Contact us form
     */
    public function index()
    {

    	$this->load->model('NewsLetterModel');

    	if($this->input->server('REQUEST_METHOD') == 'POST'){

			$this->form_validation->set_rules('email_id', 'Email', 'required|valid_email');

			if($this->form_validation->run()){

				$inputs = $this->input->post();
                $count = $this->NewsLetterModel->checkNewsLetterEmailId($inputs['email_id']);

                if($count == 0) {

                        $this->NewsLetterModel->insert($inputs);
                        $this->session->set_flashdata('success','Your request has been recorded!');
                        redirect($_SERVER['HTTP_REFERER']);

                } else {

                    $this->session->set_flashdata('error','Email Id already exists!');
                    redirect($_SERVER['HTTP_REFERER']);

                }    

			} else {
                $this->session->set_flashdata('error','Please check Your email Id!');
                redirect($_SERVER['HTTP_REFERER']);
            }

		}

        
    }


}
