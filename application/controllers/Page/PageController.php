<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PageController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PagesModel');
        $this->load->model('CategoriesModel');
        $this->load->model('PagesModel');

    }

   
    /**
     * Display the list of resource.
     *
     *
     */
    public function show($id) { 
   

        $id =  $this->PagesModel->getPageIdBySlug($id);

        $data['categories'] = $this->CategoriesModel->getParentCategory();
        $data['categoriesMenu'] = $this->CategoriesModel->getParentCategoryMenu();

        foreach ($data['categoriesMenu'] as $key => $value) {
            $child_category = $this->CategoriesModel->getChildCategories($value['id']);
            $data['categoriesMenu'][$key]['child']  = $child_category;
        }

         $data['page5'] = $this->PagesModel->get(19); 
        $data['page'] = $this->PagesModel->get($id);
        $this->load->template('page/page_detail',$data);
    }
}
