<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home_Controller extends CI_Controller
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
        $this->load->model("Comic/Comic_model", "comic");
        $this->load->model("Components/Components", "comps");
    }

    public function index(){


        $data["title"]          =   "Hallo World";
        $data["comic_model"]    =   $this->comic->get_all_comic();
        $data["popular_comics"] =   $this->comps->get_popular_comics();
        $data["genres"]         =   $this->comps->get_all_genres();

        get_views("Home_page/home_page.php", $data);
    }
}
