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


        $data["title"]          =   "Hallo World";
        $data["comic_model"]    =   $this->home->get_all_comic();
        $data["popular_comics"] =   $this->home->get_popular_comics();
        $data["genres"]         =   $this->home->get_all_genres();

        get_views("Home_page/home_page.php", $data);
    }
}
