<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    /**
     *  -------------------------------------------------------
     *                        Constructor
     *  -------------------------------------------------------
     * 
     *  -   Merupakan Fungsi Yang Pertama Di Eksekusi 
     *      Menginstance Suatu Class Menjadi Object
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Home/Home_model", "home");
    }

    public function index(){
        $data["comic_model"]    = $this->home->get_all_comic();
        $data["title"]          =   "Hallo World";

        $this->load->view("Templates/header.php", $data);
        $this->load->view("Templates/navbar.php", $data);
        $this->load->view("Home_page/home_page.php", $data);
        $this->load->view("Templates/footer.php", $data);
    }
}
