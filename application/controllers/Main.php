<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct(){
        parent::__construct();

    }

	public function index(){
		switch($_SESSION['role']){
            case 1: echo "admin"; break;
            case 2: echo "guru"; break;
            case 3: echo "student"; break;
            default : redirect(base_url());
        }
	}
}
