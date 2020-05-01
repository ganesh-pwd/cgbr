<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminNewsLetterController extends CI_Controller {
    /**
     * AdminDashboardController constructor.
     */
    public function __construct()
    {
        parent::__construct();
		$this->load->model('NewsLetterModel');
		$this->load->helper('admin');
        if(!$this->session->logged_in){
            redirect(base_url('index.php/login'));
            exit;
        }
    }

	/**
	 * Show resource
	 *
	 * @param $id
	 */
	public function show($id){

		$data['record'] = $this->NewsLetterModel->get($id);
		$this->load->templateAdmin('admin/newsletter/show',$data);
	}

    /**
     * Show list of contact us requests
     */
	public function index()
	{
		$pagination_config = getAdminPaginationConfig($this->NewsLetterModel->count_all(), 15);

		$this->load->library('pagination');
		$this->pagination->initialize($pagination_config);

		$data['newsletter_rows'] = $this->NewsLetterModel->order_by('created_at', 'desc')->limit($pagination_config['per_page'], $this->input->get('per_page'))->get_all();

		$this->load->templateAdmin('admin/newsletter/index',$data);
	}

	/**
	 * Deletes the resource
	 *
	 * @param $id
	 */
	public function delete($id){

		$this->NewsLetterModel->delete($id);
		$this->session->set_flashdata('info', 'News Letter request deleted successfully.');
		redirect(base_url('index.php/admin/newsletter'));
	}
}
