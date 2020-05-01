<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('ProductsModel');
        $this->load->model('CategoriesModel');
		$this->load->model('SliderImagesModel');
		$this->load->model('PagesModel');


    }

    /**
     * Display the list of resource.
     *
     *
     */
	public function index()

	{
        $data['categories'] = $this->CategoriesModel->getParentCategory();

		$data['categoriesMenu'] = $this->CategoriesModel->getParentCategoryMenu();

        foreach ($data['categoriesMenu'] as $key => $value) {
            $child_category = $this->CategoriesModel->getChildCategories($value['id']);
            $data['categoriesMenu'][$key]['child']  = $child_category;
        }

        $data['slider_categories'] = $this->CategoriesModel->getSliderCategory();

       // print_r($data['slider_categories']);

		$data['slider_images'] = $this->SliderImagesModel->get_all();
		$data['welcome_page'] = $this->PagesModel->get(13);

        $data['page1'] = $this->PagesModel->get(15);
        $data['page2'] = $this->PagesModel->get(16);
        $data['page3'] = $this->PagesModel->get(17);
        $data['page4'] = $this->PagesModel->get(18);
        $data['page5'] = $this->PagesModel->get(19);

       $data['products'] = $this->ProductsModel->getProductsForShop(null,null,4,null);


		$this->load->template('home',$data);
	}


}
