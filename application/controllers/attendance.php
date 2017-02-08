<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Attendance extends CI_Controller {
	function index (){
		 $data['main_content'] ='staff_attdnce.php';
		 //$data['main_content'] ='staff_attdnceOut.php';
		 //$this->load->view('nastyHRMS/example/login', $data);
		 $this->load->view('include/templete', $data);
	}

	function __construct(){
		parent::__construct();
		$this->load->library('session'/*, 'my_func'*/);
	}
	//sql injection alert ***

	    function checkin()
	    {
	    	 //$this->load->library("encrypt");

	    		date_default_timezone_set('Asia/Kuala_Lumpur');

	    	 	$sta_id = $this->input->post('staff_id');
	    	 	//$now = new DateTime();
				
	    	 	//$time = $now->format('Y-m-d H:i:s');
	    	 	$date = date('Y-m-d H:i:s');

	    	 	$data = array(
				'sta_id'=>$sta_id,
				//'time'=>$time
				'time'=>$date
				);
	    	

	    	 $this->load->model('m_attendance');
	    	 $data = $this->m_attendance->attendance($data);
	    	
	    	 if ($data) 
	    	 {
	    	 	/*echo "login Success";*/
	    	 /*	$array = array(
	    	 		'user_id' => $this->my_func->nastyHRMS_encrypt($data->user_id),
	    	 		'user_name' => $this->my_func->nastyHRMS_encrypt($data->user_name)
	    	 	);	  */  		
	    	 	//$this->session->set_userdata( $array );
				echo "<script>";
				echo "alert('Check In Success');";
				echo "</script>";
	    		redirect(site_url('attendance'),'refresh');
	    	 }
	    	 else
	    	 {
	    	 	echo "Attendance Not Success";
	    	 	redirect(site_url('attendance'),'refresh');
	    	 }
	    	//$temp = $this->m_login->get();
	    	/*echo "<pre>";
	    	print_r($data);
	    	echo "</pre>";*/
	   }

	    function checkout()
	    {

	    		date_default_timezone_set('Asia/Kuala_Lumpur');

	    	 	$sta_id = $this->input->post('staff_id');
	    	 	//$now = new DateTime();
				
	    	 	//$time = $now->format('Y-m-d H:i:s');
	    	 	$date = date('Y-m-d H:i:s');

	    	 	$data = array(
				'sta_id'=>$sta_id,
				//'time'=>$time
				'time'=>$date
				);

	        /*$this->load->library("my_func");
	        $pass = $this->my_func->nastyHRMS_encrypt($pass);*/

	        //echo $email;
	        //echo $pass;

	         $this->load->model('m_attendanceOut');
	    	 $data = $this->m_attendanceOut->attendanceOut($data);
	    	
	    	 if ($data) 
	    	 {
	    	 	/*echo "login Success";*/
	    	 /*	$array = array(
	    	 		'user_id' => $this->my_func->nastyHRMS_encrypt($data->user_id),
	    	 		'user_name' => $this->my_func->nastyHRMS_encrypt($data->user_name)
	    	 	);	*/    		
	    	 	//$this->session->set_userdata( $array );
				echo "<script>";
				echo "alert('Check Out Success');";
				echo "</script>";
	    		redirect(site_url('attendance'),'refresh');
	    	 }
	    	 else
	    	 {
	    	 	echo "Attendance Not Success";
	    	 	redirect(site_url('attendance'),'refresh');
	    	 }

	    
	        /*$this->load->model("m_attendance");

	        if (!$this->m_attendance->insert($data)) {
	        	echo "Not success";
	        }else{
	        	echo "success";
	        }*/
	    }
	}

