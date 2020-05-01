<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminAttributesController extends MY_Controller {
    /**
     * AdminAttributesController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->logged_in){
            redirect(base_url('index.php/login'));
            exit;
        }

        //$this->load->model('ProductsModel');
        $this->load->model('AttributesModel');

    }

    /**
     * Display the list of resource.
     */
	public function index()
	{
       $data['records'] = $this->AttributesModel->order_by('created_at','desc')->get_all();

       $this->load->templateAdmin('admin/attributes/list',$data);
	}

    /**
     * Create New Resource
     */
	public function create()
    {
        $data = array();

        //$data['categories'] = $this->CategoriesModel->getCategoriesDropdown();
        //If POST method Create New Record
        if($this->input->server('REQUEST_METHOD')=='POST')
        {
            $inputs = $this->input->post();
           
            $this->form_validation->set_rules('name','Name','trim|required|max_length[128]');


            if ($this->form_validation->run())
            {

                //Form validation success. Insert Record into database

                $datum['name']  = $this->input->post('name');
                $datum['description']  = $this->input->post('description');
                $datum['details']  = serialize($this->input->post('details'));

                $last_id = $this->AttributesModel->insert($datum);


                $this->session->set_flashdata('success', 'Attribute Created successfully');

                redirect(base_url('index.php/admin/attributes'));
                exit;
            }
        }


        $this->load->templateAdmin('admin/attributes/create',$data);
    }

    /**
     * Show form for editing the resource Resource as well as update the database if HTTP verb is POST.
     *
     * @param $id
     */
    public function edit($id)
    {


        if($this->input->server('REQUEST_METHOD')=='POST')
        {
            $this->form_validation->set_rules('name','Name','trim|required|max_length[128]');

            if ($this->form_validation->run())
            {
                //Form validation success. Update Record
                $inputs = $this->input->post();
                $this->CategoriesModel->update($id, $inputs);
                $this->session->set_flashdata('success', 'Product Updated successfully');

                redirect(base_url('index.php/admin/attributes'));
                exit;
            }
        }
        $record = $this->AttributesModel->get($id);

        $data['record'] = $record;
       // $data['categories'] = $this->CategoriesModel->getCategoriesDropdown($id);


        $this->load->templateAdmin('admin/attributes/edit',$data);
    }

    public function delete($id)
    {
        if($this->input->server('REQUEST_METHOD')=='POST')
        {
            $status = $this->AttributesModel->delete($id);
            if($status){
                $this->session->set_flashdata('info', 'Attibute deleted successfully.');
            }
            else{
                $this->session->set_flashdata('error', 'Failed to delete Attibute.');
            }

            redirect(redirect($_SERVER['HTTP_REFERER']));
        }

    }

     public function fetch($attribute_id)
    {
        if($this->input->server('REQUEST_METHOD')=='POST')
        {
            $attribute_id;
            $content = $this->AttributesModel->getAttributesList($attribute_id);
            $details = unserialize($content['details']);

             

              $data = array();

               foreach ($details as $key => $fields) {

                                        $sub_data = array();

                                        if($fields['field_type'] == 'text') {

                                           // echo "<label>".$fields['field_name']."</label> :: <input type=".$fields['field_type']." name=".$fields['field_name']." value=".$fields['field_default_value']." placeholder=".$fields['field_placeholder']." />";

                                           // echo "<br/>";

                                        }


                                        if($fields['field_type'] == 'select') {


                                            //echo "<label>".$fields['field_name']."</label> :: <select>";

                                            $field_options = explode("|" , $fields['field_choices']);
                                            foreach ($field_options as $key => $field) {
                                                $field_options = explode(":" , $field);
                                            //  echo "<option value=".$field_options[0].">".$field_options[1]."</option>";
                                              $sub_data[$field_options[0]] = $field_options[1];

                                            }

                                            //echo "</select>";

                                           // echo "<br/>";

                                            array_push($data , $sub_data);

                                        }


                                        if($fields['field_type'] == 'radio'){

                                            //echo "<label>".$fields['field_name']."</label> :: ";

                                            $field_options = explode("|" , $fields['field_choices']);
                                            foreach ($field_options as $key => $field) {
                                                $field_options = explode(":" , $field);
                                            //  echo "<input name='radio' type='radio' value=".$field_options[0]."  />".$field_options[1]."&nbsp;&nbsp;&nbsp;&nbsp;";

                                              $sub_data[$field_options[0]] = $field_options[1];

                                            }

                                           // echo "<br/>";

                                            array_push($data , $sub_data);

                                        }

                                        if($fields['field_type'] == 'checkbox'){

                                            //echo "<label>".$fields['field_name']."</label> :: ";

                                            $field_options = explode("|" , $fields['field_choices']);
                                            foreach ($field_options as $key => $field) {
                                                $field_options = explode(":" , $field);
                                             // echo "<input name='checkbox[]' type='checkbox' value=".$field_options[0]."  />".$field_options[1]."&nbsp;&nbsp;&nbsp;&nbsp;";

                                               $sub_data[$field_options[0]] = $field_options[1];

                                            }

                                           // echo "<br/>";

                                            array_push($data , $sub_data);

                                        }


                                        if($fields['field_type'] == 'color_box'){

                                            //echo "<label>".$fields['field_name']."</label> :: ";

                                            $field_options = explode("|" , $fields['field_choices']);
                                            foreach ($field_options as $key => $field) {
                                                $field_options = explode(":" , $field);
                                             // echo "<input name='checkbox[]' type='checkbox' value=".$field_options[0]."  />".$field_options[1]."&nbsp;&nbsp;&nbsp;&nbsp;";

                                               $sub_data[$field_options[0]] = $field_options[1];

                                            }

                                           // echo "<br/>";

                                            array_push($data , $sub_data);

                                        }

                                        if($fields['field_type'] == 'radio_images'){

                                            //echo "<label>".$fields['field_name']."</label> :: ";

                                            $field_options = explode("|" , $fields['field_choices']);
                                            foreach ($field_options as $key => $field) {
                                                $field_options = explode(":" , $field);
                                             // echo "<input name='checkbox[]' type='checkbox' value=".$field_options[0]."  />".$field_options[1]."&nbsp;&nbsp;&nbsp;&nbsp;";

                                               $sub_data[$field_options[0]] = $field_options[1];

                                            }

                                           // echo "<br/>";

                                            array_push($data , $sub_data);

                                        }




                                        
                                    
            }


                
                
                $combos = $this->generate_combinations($data);

                $flag = 1;

                foreach ($combos as $key => $values) {

                    echo "<div class='col-lg-12'>";

                    echo "<div class='col-sm-2'>";

                    echo "#".$flag;

                    echo "</div>";

                    echo "<div class='col-sm-4'>";

                     foreach ($values as $key => $value) {
                        $string = str_replace(' ', '', $value);
                        $stringLower = strtolower($string);
                         echo "<label>".$value."</label><input type='hidden' name='variations[variation".$flag."][]' value='".$stringLower."' />&nbsp;&nbsp;&nbsp;";
                     }

                       echo "</div>";


                       echo "<div class='col-sm-6'>";

                     echo "<input type='text' name='variations[variation".$flag."][price]' placeholder='Enter Price' />";
                     echo "<input type='text' name='variations[variation".$flag."][qty]' placeholder='Enter Quantity' />";

                     echo "</div>";

                    echo "<hr/>";

                    echo "</div>";

                    $flag++;
                }

                
              
              exit();



            


        }

    }

    public function getUploadConfig(){
		$config = array();
		$config['upload_path'] = 'images/categories';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = 10000000;

		return $config;
	}


    public function generate_combinations(array $data, array &$all = array(), array $group = array(), $value = null, $i = 0)
    {
        $keys = array_keys($data);
        if (isset($value) === true) {
            array_push($group, $value);
        }

        if ($i >= count($data)) {
            array_push($all, $group);
        } else {
            $currentKey     = $keys[$i];
            $currentElement = $data[$currentKey];
            foreach ($currentElement as $val) {
                $this->generate_combinations($data, $all, $group, $val, $i + 1);
            }
        }

        return $all;
    }



}
