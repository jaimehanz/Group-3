<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    private $table = "users";

    public function __construct(){
        parent::__construct();
    }

    public function createUser($data){
            
            if($this->checkUidExists($data['usersUid'])){
                echo "UidExists";
                return;
            }
    
            else if($this->checkEmailExists($data['usersEmail'])){
                echo "emailExists";
                return;
            }
    
            else if($this->checkPwdMatch($data['usersPwd'], $data['pwdRepeat'])){
                echo "PwdDoesntMatch";
                return;
            }
    
            else{
                unset($data['pwdRepeat']);
                $data['usersPwd'] = sha1($data['usersPwd']);
                $data['terms'] = "Agree";
                $data['stat'] = "Active"; 
                
                $this->db->insert($this->table, $data);
                return $this->db->insert_id();
        }
    }
    


    public function checkUidExists($usersUid){
        if(isset($usersUid) && $usersUid != null){
            $this->db->where('usersUid', $usersUid);
        }

        $query = $this->db->get($this->table);
        $return = $query->result_array();

        if(count($return) > 0)
            return true;

        return false;

    }

    public function checkEmailExists($usersEmail){
        if(isset($usersEmail) && $usersEmail != null){
            $this->db->where('usersEmail', $usersEmail);
        }

        $query = $this->db->get($this->table);
        $return = $query->result_array();

        if(count($return) > 0){
            return true;
        }

        return false;

    }

    public function checkPwdMatch($usersPwd, $pwdRepeat){
        if($usersPwd !== $pwdRepeat){
            return true;
        }
        else{
            return false;
        }
    }

    public function verifyPwd($pwdRepeat, $usersId){
        $this->db->where('usersId', $usersId);

        $query = $this->db->get($this->table);

        $return = $query->result_array();
        
        if($this->checkPwdMatch($return[0]['usersPwd'], sha1($pwdRepeat))){
			return true;
		}
		else{
			return false;
		}
    }

    public function login($usersUid, $usersPwd){
        $this->db->where('usersUid', $usersUid)
                ->where('usersPwd', sha1($usersPwd))
                ->or_where('usersEmail', $usersUid)
                ->where('usersPwd', sha1($usersPwd));

        $query = $this->db->get($this->table);
        $return = $query->result_array();

        if(count($return) > 0 && $return[0]['stat'] == 'Active'){
            return $return;
        }
        echo "UserNoLongerExists";
        return false;
    }

    public function getUsers($usersId = null){
        if(isset($usersId) && $usersId != null){
            $this->db->where('usersId', $usersId);
        }
        
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function getPwd($pwd = null){
        if(isset($pwd) && $pwd != null){
            $this->db->where('usersPwd', $pwd);
        }
        
        $query = $this->db->get($this->table);
        return $query->result_array();
    }


    public function getUser($id) {
        $this->db->where('usersId', $id);
        $user = $this->db->get($this->table)->row_array();
        return $user;
    }

    public function update($id, $formArray) {
        $this->db->where('usersId',$id);
        $this->db->update($this->table, $formArray);
    }

    public function updates($data) {
        $this->db->where('usersId', $data['usersId']);
        
        $this->db->update($this->table, $data);
    }

    public function updateUser($data){

        if($this->updateCheckUidExists($data['usersUid'], $data['usersId'])){
            echo "UidExists";
            return;
        }

        else if($this->updateCheckEmailExists($data['usersEmail'], $data['usersId'])){
            echo "EmailExists";
            return;
        }

        else if($this->checkPwdMatch($data['usersPwd'], $data['pwdRepeat'])){
            echo "PwdDoesntMatch";
            return;
        }

        else { 
            $this->db->where('usersId', $data['usersId']);
            unset($data['usersId']);
            unset($data['pwdRepeat']);
            $data['usersPwd'] = sha1($data['usersPwd']);

            $this->db->update($this->table, $data);
        }
    }

    public function deleteUser($pwdRepeat, $usersId){
      if($this->verifyPwd($pwdRepeat, $usersId)){
          return false;
      }
      else{
            $this->db->where('usersId', $usersId);
            $data['stat'] = 'Inactive';
            $this->db->update($this->table, $data);
            return true;
        }
    }

    public function updateCheckUidExists($usersUid, $usersId){
        if(isset($usersUid) && $usersUid !=null){
            $this->db->where('usersUid', $usersUid);
        }

        $query = $this->db->get($this->table);
        $return = $query->result_array();

        if(count($return) > 0 && $usersId != $return[0]['usersId']){
            return true;
        }

        return false;
    }

    public function updateCheckEmailExists($usersEmail, $usersId){
        if(isset($usersEmail) && $usersEmail != null){
            $this->db->where('usersEmail', $usersEmail);
        }

        $query = $this->db->get($this->table);
        $return = $query->result_array();

        if(count($return) > 0 && $usersId != $return[0]['usersId']){
            return true;
        }
        return false;
    }

    public function countUser(){
        $query = $this->db->get('users');
        return $query->num_rows();
    }

    public function create($formArray){
        $this->db->insert('users', $formArray);
    }

    public function deletePerm($id){
        $this->db->where('usersId', $id);
        $this->db->delete($this->table);
    }

    public function updateuserdetails(
        $usid,$firstName,$lastName,$usersUid,$phone,$usersEmail,$address,$usersPwd,$pwdRepeat
        )
    {
        $data=array(
                    
                    'firstName' =>$firstName,
                    'lastName' =>$lastName,
                    'usersUid' =>$usersUid,
                    'phone' =>$phone,
                    'usersEmail' =>$usersEmail,
                    'address' =>$address,
                    'usersPwd' =>$usersPwd,
                    'pwdRepeat' =>$pwdRepeat
                    
                );
        
            $sql_query=$this->db->where('usersId', $usid)
                        ->update($this->table, $data); 

            if($sql_query)
            {
                $this->session->set_flashdata('deluser_success', 'Record updated successful');
                redirect('admin/manageuser');
            }
            else
            {
                $this->session->set_flashdata('deluser_error', 'Somthing went worng. Error!!');
                redirect('admin/manageuser');
            }
    
    }
    public function getuserdetail($uid)
    {
        $ret=$this->db->select
        (
        'usersId,firstName,lastName,usersUid,phone,usersEmail,address,usersPwd,pwdRepeat'
        )
        ->where('usersId',$uid)
        ->get($this->table);
        return $ret->row();    
    }
    
    public function getUserId($id) 
    {
        $this->db->where('usersId', $id);
        $items = $this->db->get($this->table)->row_array();
        return $items;
    }
   

    public function deleteItem($id) 
	{
		$this->db->where('usersId',$id);
		$this->db->delete(($this->table));
    }
}
