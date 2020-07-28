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
        $this->load->model("Comic/comic_model", "comic");
        $this->load->library("components", "", "comps");
    }

    public function index()
    {
        /**
         * ------------------------------------
         *       Config For Pagination 
         * ------------------------------------
         */
        $this->load->library("pagination");                 // Load Library Pagination Dari CI
        $config["per_page"]     = 15;                        // Jumlah Content Per Halaman
        $config['num_links']    = 2;                        // Jumlah Digit Tombol Pagination Di Kiri & Kanan
        $config["first_link"]   = "first";                  // Tombol Awal Pagination
        $config["last_link"]    = "last";                   // Tombol Akhir Pagination
        $config["base_url"]     = base_url("s-f");  // Set Halaman Yang Akan Di Pasangkan Pagination
        // $config["total_rows"]   = 0;
        $config["total_rows"]   = $this->comic->getLatestComicQuery(); // Total Baris Diamil Dari getLatestComicQuery()
        // Load Dan Init Semua Konfigurasi Pagination
        $this->pagination->initialize($config);

        /**
         * ------------------------------------
         *          Data To Display
         * ------------------------------------
         */
        $data["title"]          = "My Comic";                   // - Title Dari Setiap Halaman
        $data["user_data"]      = get_user_data();               // - User Data Diambil Dari HelperFunction _getUserData()
        $data["limit"]          = $config["per_page"];          // - Limit Merupakan Batasan Content Di Setiap Halaman
        $data["totals_result"]  = $config["total_rows"];        // - Jumlah Hasil Dari Pencarian Comic
        /**
         * ------------ data['start'] ------------
         *  Merupakan  Content
         *  ------------------------------------
         *              ==Check==
         *  ------------------------------------
         *  `jika` Jumlah Baris Lebih Kecil Sama Dengan Jumlah 
         *  Content Perhalaman Maka Pagination Akan Mulai i Content Ke 0
         *  `else` Maka Halaman Pagination Yang Sekarang Di Akses
         *  Di Ambil Dari URI di Segment ke `3`
         * 
         *   ex `URI`: 'https://localhost/comic/index/`halaman-sekarang`' 
         * 
         *  ------------ data['comicx'] ------------
         *  Ambil Comic Dari Comic Model Dengan Method get_comic_limit()
         */


        $data["start"]          = ($config["total_rows"] <= $config["per_page"]) ? 0 : $this->uri->segment(2);
        $model_data["order_by"]     =  "comic_update";
        $model_data["direction"]    =   "DESC";
        $model_data["offset"]       =   $data["start"];
        $model_data["limit"]        =   $config["per_page"];
        $data["comic_model"]        = $this->comic->get_comic_limit($model_data);


        $data["title"]          =   "Beranda";
        $data["popular_comics"] =   $this->comps->get_popular_comics();
        $data["genres"]         =   $this->comps->get_all_genres();

        get_views("Home_page/home_page.php", $data);
    }


    public function comic_lists()
    {
        /**
         * Check Filter Session
         */

        $model_data =   $this->_advance_filter_system();

        /**
         * ------------------------------------
         *       Config For Pagination 
         * ------------------------------------
         */
        $this->load->library("pagination");                 // Load Library Pagination Dari CI
        $config["per_page"]     = 18;                        // Jumlah Content Per Halaman
        $config['num_links']    = 2;                        // Jumlah Digit Tombol Pagination Di Kiri & Kanan
        $config["first_link"]   = "first";                  // Tombol Awal Pagination
        $config["last_link"]    = "last";                   // Tombol Akhir Pagination
        $config["base_url"]     = base_url("daftar-komik/s-f");  // Set Halaman Yang Akan Di Pasangkan Pagination
        // $config["total_rows"]   = 0;
        $config["total_rows"]   = $this->comic->getLatestComicQuery($model_data); // Total Baris Diamil Dari getLatestComicQuery()
        // Load Dan Init Semua Konfigurasi Pagination
        $this->pagination->initialize($config);

        // var_dump($model_data);
        // var_dump($config["total_rows"]);

        /**
         * ------------------------------------
         *          Data To Display
         * ------------------------------------
         */
        $data["title"]          =   "Daftar Komik";
        $data["popular_comics"] =   $this->comps->get_popular_comics();
        $data["genres"]         =   $this->comps->get_all_genres();
        // $data["user_data"]      = get_user_data();               // - User Data Diambil Dari HelperFunction _getUserData()
        $data["results"]        = $config["total_rows"];        // - Jumlah Hasil Dari Pencarian Comic
        /**
         * ------------ data['start'] ------------
         *  Merupakan  Content
         *  ------------------------------------
         *              ==Check==
         *  ------------------------------------
         *  `jika` Jumlah Baris Lebih Kecil Sama Dengan Jumlah 
         *  Content Perhalaman Maka Pagination Akan Mulai i Content Ke 0
         *  `else` Maka Halaman Pagination Yang Sekarang Di Akses
         *  Di Ambil Dari URI di Segment ke `3`
         * 
         *   ex `URI`: 'https://localhost/comic/index/`halaman-sekarang`' 
         * 
         *  ------------ data['comicx'] ------------
         *  Ambil Comic Dari Comic Model Dengan Method get_comic_limit()
         */


        $data["start"]          = ($config["total_rows"] <= $config["per_page"]) ? 0 : $this->uri->segment(3);

        $model_data["offset"]       =   $data["start"];
        $model_data["limit"]        =   $config["per_page"];
        $data["comic_model"]    = $this->comic->get_comic_limit($model_data);

        get_views("Home_page/comic_lists_page.php", $data);
    }

    // Advance Filter
    private function _advance_filter_system(): array
    {

        if (isset($_POST["submit-button"])) {
            $table_name         =   htmlspecialchars($this->input->post("order-by", true));
            $current_direction  =   htmlspecialchars($this->input->post("direction", true));
            $comic_type         =   htmlspecialchars($this->input->post("type", true));
            $comic_status       =   htmlspecialchars($this->input->post("status", true) ?? NULL);
            $comic_status       =   ($comic_status === "all") ? NULL : intval($comic_status);

            $allowed_name       =   "name|visited|like|chapters|update";
            $allowed_direction  =   "ASC|DESC";
            $allowed_type       =   "manga|manhua|manhwa";

            $model_data["order_by"]         =   "comic_name";
            $model_data["direction"]        =   "ASC";
            $model_data["comic_type"]       =   ($comic_type === "all") ? NULL : $comic_type;
            $model_data["comic_status"]     =   $comic_status;
            $model_data["comic_genre"]      =   html_escape($this->input->post("genres", true)) ?? NULL;

            // validate Allowed Input
            if (find_matches($allowed_name, $table_name)) $model_data["order_by"]   =  "comic_" . $table_name;
            if (find_matches($allowed_direction, $current_direction)) $model_data["direction"] =   $current_direction;
            if (find_matches($allowed_type, $comic_type)) $model_data["comic_type"]  =   $comic_type;

            $this->session->set_userdata("sss-order-by", $model_data["order_by"]);
            $this->session->set_userdata("sss-direction", $model_data["direction"]);
            $this->session->set_userdata("sss-comic-type", $model_data["comic_type"]);
            $this->session->set_userdata("sss-comic-status", $model_data["comic_status"]);
            $this->session->set_userdata("sss-comic-genre", $model_data["comic_genre"]);
            // var_dump($model_data);
            // die;
            return $model_data;
        } else {
            if ($this->session->userdata("sss-order-by")) {
                $model_data = $this->_get_filter_session();
            } else {
                $model_data["order_by"]         =   "comic_name";
                $model_data["direction"]        =   "ASC";
            }
            return $model_data;
        }
    }

    private function _get_filter_session(): array
    {
        $sfd["order_by"] =  $this->session->userdata("sss-order-by");
        $sfd["direction"] =  $this->session->userdata("sss-direction");
        $sfd["comic_type"] = $this->session->userdata("sss-comic-type");
        $sfd["comic_status"] =  $this->session->userdata("sss-comic-status");
        $sfd["comic_genre"] = $this->session->userdata("sss-comic-genre");
        return $sfd;
    }

    public function clear_filter_session()
    {
        $this->session->unset_userdata("sss-order-by");
        $this->session->unset_userdata("sss-direction");
        $this->session->unset_userdata("sss-comic-type");
        $this->session->unset_userdata("sss-comic-status");
        $this->session->unset_userdata("sss-comic-genre");
        redirect("daftar-komik");
    }
}
