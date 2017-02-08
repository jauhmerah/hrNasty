<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

	class m_login extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
	

	 /**
	     * @name string TABLE_NAME Holds the name of the table in use by this model
	     */
	    const TABLE_NAME = 'employee_user';
	
	    /**
	     * @name string PRI_INDEX Holds the name of the tables' primary index used in this model
	     */
	    const PRI_INDEX = 'user_id';
	
	    /**
	     * Retrieves record(s) from the database
	     *
	     * @param mixed $where Optional. Retrieves only the records matching given criteria, or all records if not given.
	     *                      If associative array is given, it should fit field_name=>value pattern.
	     *                      If string, value will be used to match against PRI_INDEX
	     * @return mixed Single record if ID is given, or array of results
	     */
	    public function get($where = NULL) {
	        $this->db->select('*');
	        $this->db->from(self::TABLE_NAME);
	        if ($where !== NULL) {
	            if (is_array($where)) {
	                foreach ($where as $field=>$value) {
	                    $this->db->where($field, $value);
	                }
	            } else {
	                $this->db->where(self::PRI_INDEX, $where);
	            }
	        }
	        $result = $this->db->get()->result();
	        if ($result) {
	            if ($where !== NULL) {
	                return array_shift($result);
	            } else {
	                return $result;
	            }
	        } else {
	            return false;
	        }
	    }

	    // ada penambahan untuk apabila jumpa email tetapi salah password **
	    public function login($email,$pass)
	    {	    	
	    	//$this->load->library("my_func");
	    	$data = array(
	    		'user_email' => $email 
	    	);
	    	$this->db->select('*');
	    	$this->db->from(self::TABLE_NAME);
	    	$this->db->where($data);
	    	$result = $this->db->get()->result();
	    
	    /*	if (!$result) {
	    		if ($this->my_func->nastyHRMS_decrypt($result[0]->user_password) === $pass) {
	    			return array_shift($result);
	    		}	    		
	    	}*/
	    	return $result;
	    }
	
	    /**
	     * Inserts new data into database
	     *
	     * @param Array $data Associative array with field_name=>value pattern to be inserted into database
	     * @return mixed Inserted row ID, or false if error occured
	     */
	/*    public function insert(Array $data) {
	        if ($this->db->insert(self::TABLE_NAME, $data)) {
	            return $this->db->insert_id();
	        } else {
	            return false;
	        }
	    }
	*/
	    /**
	     * Updates selected record in the database
	     *
	     * @param Array $data Associative array field_name=>value to be updated
	     * @param Array $where Optional. Associative array field_name=>value, for where condition. If specified, $id is not used
	     * @return int Number of affected rows by the update query
	     */
/*	    public function update(Array $data, $where = array()) {
	            if (!is_array($where)) {
	                $where = array(self::PRI_INDEX => $where);
	            }
	        $this->db->update(self::TABLE_NAME, $data, $where);
	        return $this->db->affected_rows();
	    }*/
	
	    /**
	     * Deletes specified record from the database
	     *
	     * @param Array $where Optional. Associative array field_name=>value, for where condition. If specified, $id is not used
	     * @return int Number of rows affected by the delete query
	     */
	 /*   public function delete($where = array()) {
	        if (!is_array($where)) {
	            $where = array(self::PRI_INDEX => $where);
	        }
	        $this->db->delete(self::TABLE_NAME, $where);
	        return $this->db->affected_rows();
	    }
*/
	   /*  $this->load->library('encryption');
	   	 $this->encryption->encrypt('abah kau');
	     echo $this->encryption->decrypt('abah kau');*/

	   /* $plain_text = 'This is a plain-text message!';
		$ciphertext = $this->encryption->encrypt($plain_text);

		// Outputs: This is a plain-text message!
		echo $this->encryption->decrypt($ciphertext);*/
	}


