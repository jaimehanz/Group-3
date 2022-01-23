<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index(){
		#$this->load->view('front/login');
	}

    public function login(){
        $data = array();
        #Print Data
        $data = $this->input->post();

        if(isset($data) && $data != null){
            $this->load->model('Test_model');

            $return = $this->Test_model->login($data['username'], $data['password']);
            if(is_bool($return)){
                echo "Login error";
            } else{
                #print_r($return);
                $_SESSION['adminId'] = $return[0]['adminId'];
				$_SESSION['username'] = $return[0]['username'];
				#redirect('front/viewUser');
                #redirect('index.php/users/viewUser');
                redirect(base_url().'admin/dashboard');
            }
        }
        $this->load->view('admin/login');
    }

    public function createUser(){
        $data = array();
        #Print Data
        $data = $this->input->post();

        if(isset($data) && $data != null){
            $this->load->model('user_model');
            $this->user_model->createUser($data);
        }
        #$this->load->view('templates/header');
        $this->load->view('admin/user/addUser');
        #$this->load->view('templates/footer');
    }

    public function dashboard(){
        $data['admin'] = $_SESSION['adminId'];
        if(isset($data['admin']) && $data['admin'] != null){

            $this->load->model('Admin_model');
            $this->load->model('Supplier_model');
            $this->load->model('Item_model');
            $this->load->model('User_model');
            $this->load->model('Order_model');
            $this->load->model('Category_model');

            $data['countSupplier'] = $this->Supplier_model->countSupplier();
            $data['countItem'] = $this->Item_model->countItem();
            $data['countUser'] = $this->User_model->countUser();
            $data['countOrders'] = $this->Order_model->countOrder();
            $data['countCategory'] = $this->Category_model->countCategory();
            $data['countPendingOrders'] = $this->Order_model->countPendingOrders();
            $data['countDeliveredOrders'] = $this->Order_model->countDeliveredOrders();
            $data['countRejectedOrders'] = $this->Order_model->countRejectOrders();

            $supReport = $this->Admin_model->getSupReport();
            $data['supReport'] = $supReport; 
            
            /*
            $itemReport = $this->Admin_model->itemReport();
            $data['itemReport'] = $itemReport; */
            $this->load->view('admin/dashboard', $data);
        }
    }

    public function supReport() {
        $supReport = $this->Admin_model->getSupReport();
        $data['supReport'] = $supReport;
        $this->load->view('admin/reports/sup_report', $data);
    }
    
    public function itemReport() {
        $itemReport = $this->Admin_model->itemReport();
        $data['itemReport'] = $itemReport;
        $this->load->view('admin/reports/item_report', $data);
    }

    public function usersReport() {
        echo "user";
    }

    public function ordersReport() {
        $supReport = $this->Admin_model->getSupReport();
        $data['supReport'] = $supReport;
        $this->load->view('admin/reports/res_report', $data);
    }

    public function logout(){
        session_unset('adminId');
		session_unset('username');
		session_destroy();
		redirect(base_url().'admin/dashboard');
    }


    public function register(){
        $data = array();
        #Print Data
        $data = $this->input->post();

        if(isset($data) && $data != null){
            $this->load->model('user_model');
            $this->user_model->createUser($data);
        }
        #$this->load->view('templates/header');
        $this->load->view('admin/user/addUser');
        #$this->load->view('templates/footer');
    }

    public function viewUser(){
        #Connection to BackEnd
        $this->load->model('user_model');
        $user = $this->user_model->getUsers($_SESSION['usersId']);
        
        $output['user'] = $user[0];

        $data = array();
        $data = $this->input->post();

        if(isset($data) && $data != null){
            $this->load->model('user_model');
            $this->user_model->updateUser($data);
        }
        #Connection to FrontEnd
        $this->load->view('front/viewUser', $output);
    }

    public function updateUser(){
        #Connection to BackEnd
        $this->load->model('user_model');
        $user = $this->user_model->getUsers($_SESSION['usersId']);

        $output['user'] = $user[0];

        $data = array();
        $data = $this->input->post();

        if(isset($data) && $data != null){
            $this->load->model('user_model');
            $this->user_model->updateUser($data);
        }
        #Connection to FrontEnd
        $this->load->view('admin/edit', $output);
    }

    public function deleteUser($id){
        $this->load->model('user_model');
        $user = $this->user_model->getUsers($id);

        if(empty($user)){
            echo "Error UserNotFound";
            redirect(base_url().'admin/manageuser');
        }

        $this->user_model->deletePerm($id);
        redirect(base_url().'admin/manageuser');
    }

    public function manageuser(){
        $this->load->model('User_model');
        $users = $this->User_model->getUsers();
        $data['users'] = $users;
        $this->load->view('admin/user/list', $data);
    }

    public function manageitems(){
        $this->load->model('Item_model');
        $items = $this->Item_model->getItem();
        $data['items'] = $items;
        $this->load->view('admin/items/list', $data);
    }

    public function createitem(){
        $this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Item_model'); 
        $this->load->model('Supplier_Model'); 
		$data = array(); 
		$errorUploadType = $statusMsg = ''; 
		/*Check submit button */
		if($this->input->post('save'))
		{
			// If files are selected to upload 
			if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0)
			{ 
				$filesCount = count($_FILES['files']['name']); 
				for($i = 0; $i < $filesCount; $i++)
				{ 
					$_FILES['file']['name']     = $_FILES['files']['name'][$i]; 
					$_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
					$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
					$_FILES['file']['error']    = $_FILES['files']['error'][$i]; 
					$_FILES['file']['size']     = $_FILES['files']['size'][$i]; 
					
					// File upload configuration 
					$uploadPath = 'public/uploads/items/'; 
					$config['upload_path'] = $uploadPath; 
					$config['allowed_types'] = 'jpg|jpeg|png|gif'; 
					//$config['max_size']    = '100'; 
					//$config['max_width'] = '1024'; 
					//$config['max_height'] = '768'; 
					
					// Load and initialize upload library 
					$this->load->library('upload', $config); 
					$this->upload->initialize($config); 
					
					// Upload file to server 
					if($this->upload->do_upload('file'))
					{ 
						// Uploaded file data 
						$fileData = $this->upload->data(); 
						$uploadData[$i]['supplierId']=$this->input->post('supplierId');
						$uploadData[$i]['itemName']=$this->input->post('itemName');
						$uploadData[$i]['itemBrand']=$this->input->post('itemBrand');
						$uploadData[$i]['itemType']=$this->input->post('itemType');
						$uploadData[$i]['price']=$this->input->post('price');
						$uploadData[$i]['file_name'] = $fileData['file_name']; 
						$uploadData[$i]['itemDesc']=$this->input->post('itemDesc');
						
					}
					else
					{  
						$errorUploadType .= $_FILES['file']['name'].' | ';  
					} 
				} 

                    $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 
                    if(!empty($uploadData))
                    { 
                        // Insert files data into the database 
                        $addItem = $this->Item_model->addItem($uploadData); 
                        $statusMsg = $addItem?'Files uploaded successfully!'.$errorUploadType:'Some problem occurred, please try again.'; 
                    }
                    else
                    { 
                        $statusMsg = "Sorry, there was an error uploading your file.".$errorUploadType; 
                    } 
                }else{ 
                    $statusMsg = 'Please select image files to upload.'; 
			
			}
		}
		$data['supplier'] = $this->Supplier_Model->getRows(); 
         
        // Pass the files data to view 
        $data['statusMsg'] = $statusMsg; 
        $this->load->view('admin/items/add_item', $data); 
	}
    

    public function edititem(){

    }

    public function deleteitem(){

    }

    public function category(){
        $this->load->model('Category_model');
        $cats = $this->Category_model->getCategory();
        $cats_data['cats'] = $cats;

        $this->load->view('admin/category/list', $cats_data);
    }

    public function createcategory(){
        $this->load->model('Category_model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('category', 'Category', 'trim|required');

        if($this->form_validation->run() == true){
            $cat['categoryName'] = $this->input->post('category');
            $this->Category_model->createCategory($cat);

            $this->session->set_flashdata('cat_success', 'Category added successfully');
            redirect(base_url().'admin/category');
        } else{
            $this->load->view('admin/category/add_cat');
        }
    }

    public function editcategory($id){

    }

    public function deletecategory($id){

    }

    public function supplier(){
        $this->load->model('Supplier_model');
        $supplier = $this->Supplier_model->getSuppliers();
        $supply_data['supplier'] = $supplier;
        
        #connection to front end
        $this->load->view('admin/supplier/list', $supply_data);
    }

    public function createsupplier(){
        $this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Supplier_Model'); 
        $data = array(); 
		$errorUploadType = $statusMsg = ''; 
		/*Check submit button */
		if($this->input->post('save'))
		{
			// If files are selected to upload 
			if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0)
			{ 
				$filesCount = count($_FILES['files']['name']); 
				for($i = 0; $i < $filesCount; $i++)
				{ 
					$_FILES['file']['name']     = $_FILES['files']['name'][$i]; 
					$_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
					$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
					$_FILES['file']['error']    = $_FILES['files']['error'][$i]; 
					$_FILES['file']['size']     = $_FILES['files']['size'][$i]; 
					
					// File upload configuration 
					$uploadPath = 'public/uploads'; 
					$config['upload_path'] = $uploadPath; 
					$config['allowed_types'] = 'jpg|jpeg|png|gif'; 
					//$config['max_size']    = '100'; 
					//$config['max_width'] = '1024'; 
					//$config['max_height'] = '768'; 
					
					// Load and initialize upload library 
					$this->load->library('upload', $config); 
					$this->upload->initialize($config); 
					
					// Upload file to server 
					if($this->upload->do_upload('file'))
					{ 
						// Uploaded file data 
						$fileData = $this->upload->data(); 
						$uploadData[$i]['Name']=$this->input->post('Name');
						$uploadData[$i]['Email']=$this->input->post('Email');
						$uploadData[$i]['Url']=$this->input->post('Url');
						$uploadData[$i]['Phone']=$this->input->post('Phone');
						$uploadData[$i]['Address']=$this->input->post('Address');
						$uploadData[$i]['file_name'] = $fileData['file_name']; 
						
					}
					else
					{  
						$errorUploadType .= $_FILES['file']['name'].' | ';  
					} 
				} 

                    $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 
                    if(!empty($uploadData))
                    { 
                        // Insert files data into the database 
                        $add = $this->Supplier_Model->add($uploadData); 
                        $statusMsg = $add?'Files uploaded successfully!'.$errorUploadType:'Some problem occurred, please try again.'; 
                    }
                    else
                    { 
                        $statusMsg = "Sorry, there was an error uploading your file.".$errorUploadType; 
                    } 
                }else{ 
                    $statusMsg = 'Please select image files to upload.'; 
			
			}
		}
		$data['supplier'] = $this->Supplier_Model->getRows(); 
         
        // Pass the files data to view 
        $data['statusMsg'] = $statusMsg; 
        $this->load->view('admin/supplier/add_sup', $data); 
	}


    public function supplieredit(){

    }

    public function supplierdelete(){

    }

}

   