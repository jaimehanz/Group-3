<?php 
class supplier extends CI_Controller 
{
	public function __construct()
	{
	
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Supplier_Model'); 
	}

	public function add()
	{
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
        $this->load->view('admin/supplier/add', $data); 
	}

}

?>