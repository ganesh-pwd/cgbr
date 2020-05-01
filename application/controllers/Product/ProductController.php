<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends CI_Controller {
    /**
     * ProductController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProductsModel');
        $this->load->model('ProductImagesModel');
        $this->load->model('AttributesModel');
        $this->load->model('CategoriesModel');
        $this->load->model('PagesModel');
        
    }

    /**
     * Show single product page.
     * @param $id
     */
    public function show($id)
    { 
        $id =  $this->ProductsModel->getProductIdBySlug($id);
        $data['categories'] = $this->CategoriesModel->getParentCategory();
        $data['categoriesMenu'] = $this->CategoriesModel->getParentCategoryMenu();

        foreach ($data['categoriesMenu'] as $key => $value) {
            $child_category = $this->CategoriesModel->getChildCategories($value['id']);
            $data['categoriesMenu'][$key]['child']  = $child_category;
        }

        $data['page5'] = $this->PagesModel->get(19); 

        $data['product'] = $this->ProductsModel->get($id);
        $data['product_images'] = $this->ProductImagesModel->getByProductId($id);
        $attribute_id = $data['product']->attribute_id;
        $data['parent_category'] = $this->CategoriesModel->getCategory($data['product']->category_id);
        if($attribute_id > 0){
           $data['attributes'] = $this->AttributesModel->getAttributesList($attribute_id);
        }
        $this->load->template('product/product_detail',$data);
    }


    public function fetchVariation(){

        if($this->input->server('REQUEST_METHOD')=='POST')
        {

            $inputs = $this->input->post();
            $variations =  json_decode($inputs['variations']);
            $selected_varaiations =  json_decode($inputs['matchedVariations']);
            // print_r($selected_varaiations);
            $matchedVariation = $this->searchMyCoolArray($variations, $selected_varaiations);
            //print_r($matchedVariation); exit();
            $currentPrice = $matchedVariation['price'] + $inputs['base_price'];
            $matchedVariationData = array("current_price" => $currentPrice , "curent_qty" => $matchedVariation['qty']  );
            echo json_encode($matchedVariationData);

        }    


    }


    function searchMyCoolArray($arrays,  $search) {
                      

                       $searchArrayCount = count($search);

                       foreach($arrays as $object) {
                        $count = 0;
                           if(is_object($object)) {
                              $object = get_object_vars($object);
                           }
                           
                           foreach ($search as $key => $value) {
                            //echo  $object[$key]."=".$value."=";

                            if (in_array($value, $object)) {
                               $count++;
                            }

                            /*if($object[$key] == $value){
                               $count++;
                            }*/

                            //echo $count."<br/>";

                            if($count == $searchArrayCount){
                               return $object;
                            }

                           }

                           
                       }

                       
    }


}
