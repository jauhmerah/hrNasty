<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller 
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 var $version="nastyHRMS Alpha";
	 
	 function __construct() 
	{
	     parent::__construct();
	}
	 
	 
	public function index()
	{
		$this->load->view('nastyHRMS/navigation');
		$this->load->view('nastyHRMS/header');
		
		$this->load->view('index');
	}
	

	public function page($key)
    {
    	//$arr = $this->input->get();
    	//$this->_checkSession();
        //$lvl =$this->my_func->scpro_decrypt($this->session->userdata('us_lvl'));
    	switch ($key) 
    	{
    		//aishah part
        	/*case 'a1':
        	//delete
            	$this->load->view('nastyHRMS/navigation');
				$this->load->view('nastyHRMS/header');
            	$this->load->view('add_department');
            	break; 

        	case 'a2':
        	//delete
            	$this->load->view('nastyHRMS/navigation');
				$this->load->view('nastyHRMS/header');
            	$this->load->view('add_department');
            	break;
            //end part  */

        	//rabi part
        	case 'a3' :
        	//delete
            	$this->load->view('nastyHRMS/navigation');
				$this->load->view('nastyHRMS/header');
            	$this->load->view('add_employee.php');
            	break; 

        	case 'a4':
        	//delete
            	$this->load->view('nastyHRMS/navigation');
				$this->load->view('nastyHRMS/header');
            	$this->load->view('list_employee.php');
            	break;

            case 'a7' :
            //delete
                $this->load->view('nastyHRMS/navigation');
                $this->load->view('nastyHRMS/header');
                $this->load->view('add_otclaim.php');
                break; 

            case 'a8':
            //delete
                $this->load->view('nastyHRMS/navigation');
                $this->load->view('nastyHRMS/header');
                $this->load->view('list_otclaim.php');
                break;

            case 'a11' :
            //delete
                $this->load->view('nastyHRMS/navigation');
                $this->load->view('nastyHRMS/header');
                $this->load->view('apply_leave.php');
                break; 

            case 'a12':
            //delete
                $this->load->view('nastyHRMS/navigation');
                $this->load->view('nastyHRMS/header');
                $this->load->view('list_leave.php');
                break;
            //end part  

        	default:
    		$this->_show();
    		break;
   		}
    }

    public function addEmp()
    {
            if ($this->input->post()) {
                $arr = $this->input->post(); 

                /*$data = array(
                'deptName' => $this->input->post('deptName'),
                'dept_description' => $this->input->post('dept_description')
                );*/

                $this->load->database();
                $this->load->model('m_emp');
                //$this->load->library('my_func');
                /*foreach ($arr as $key => $value) {
                    if ($value != null) {
                        if ($key == 'pass') {
                            $value = $this->my_func->scpro_encrypt($value);
                        }
                        $arr2['us_'.$key] = $value;                     
                    }
                }*/
                foreach ($arr as $key=>$value){
                if($value != null){
                    $arr2[$key]=$value;
                }

                }



                $result = $this->m_emp->insert($arr2);
                redirect(site_url('dashboard/page/a3'),'refresh');
            }else{
                redirect(site_url('dashboard/page/a3'),'refresh');
            }
        }


     public function addOt()
    {
        if ($this->input->post()) {
                $arr = $this->input->post();                
                $this->load->database();
                $this->load->model('m_ot');
                $this->load->library('my_func');
                foreach ($arr as $key => $value) {
                    if ($value != null) {
                        if ($key == 'pass') {
                            $value = $this->my_func->scpro_encrypt($value);
                        }
                        $arr2['us_'.$key] = $value;                     
                    }
                }
                $result = $this->m_ot->insert($arr2);
                redirect(site_url('dashboard/page/a7'),'refresh');
            }else{
                redirect(site_url('dashboard/page/a7'),'refresh');
            }
    }

    public function addLeave()
    {
        if ($this->input->post()) {
                $arr = $this->input->post();                
                $this->load->database();
                $this->load->model('m_leave');
                $this->load->library('my_func');
                foreach ($arr as $key => $value) {
                    if ($value != null) {
                        if ($key == 'pass') {
                            $value = $this->my_func->scpro_encrypt($value);
                        }
                        $arr2['us_'.$key] = $value;                     
                    }
                }
                $result = $this->m_leave->insert($arr2);
                redirect(site_url('dashboard/page/a11'),'refresh');
            }else{
                redirect(site_url('dashboard/page/a11'),'refresh');
            }
    }
}

