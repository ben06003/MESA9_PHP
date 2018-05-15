<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brad extends CI_Controller {

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
    public function index()
    {

        $query = $this->db->query("select * from product");
        $num = $query->num_rows();
        $data['title'] = "你好:{$num}" ;

        if (isset($_REQUEST['x']) || isset($_REQUEST['y'])) {

            $x = $this->input->get('x');
            $y = $this->input->get('y');
            $result = $x + $y;



            $data['x'] = $x;
            $data['y'] = $y;
            $data['result'] = $result;

            $this->load->view('temps/header');
            $this->load->view('brad', $data,$num);
            $this->load->view('temps/footer');
        }else{
            $this->load->view('temps/header');
            $this->load->view('brad2');
            $this->load->view('temps/footer');
        }
    }
}