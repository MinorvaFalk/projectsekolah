<?php

class Page404 extends CI_Controller
{

    public function __construct()
   {
       parent::__construct();
   }

    public function index()
    {
        $this->output->set_status_header('404');
        $this->load->view('pages/404page');
    }

    public function test()
    {
        echo "coba";
    }

}
?>