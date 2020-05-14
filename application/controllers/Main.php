<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('html');
        $this->load->model('data');
    }

    public function index()
    {
        switch ($_SESSION['role']) {
            case 1:
                $this->admin();
                break;
            case 2:
                $this->guru();
                break;
            case 3:
                $this->student();
                break;
            default:
                redirect(base_url());
        }
    }

    public function admin()
    {
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['datasiswa'] = $this->data->get_data();
        $this->load->view('pages/admin.php', $data);
    }

    public function guru()
    {
        echo 'guru';
        echo form_open('main/logout') . '<form><button name="ret">Logout</button></form>';
    }

    public function student()
    {
        echo 'student';
        echo form_open('main/logout') . '<form><button name="ret">Logout</button></form>';
    }

    public function logout()
    {
        if (isset($_POST['ret'])) {
            session_destroy();
            redirect();
        }
    }
}
