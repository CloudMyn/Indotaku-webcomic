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
        $data["comic_model"]         = $this->comic->get_comic_limit($config["per_page"], $data["start"]);


        $data["title"]          =   "Beranda";
        $data["popular_comics"] =   $this->comps->get_popular_comics();
        $data["genres"]         =   $this->comps->get_all_genres();

        get_views("Home_page/home_page.php", $data);
    }


    public function comic_lists()
    {

        /**
         * ------------------------------------
         *       Config For Pagination 
         * ------------------------------------
         */
        $this->load->library("pagination");                 // Load Library Pagination Dari CI
        $config["per_page"]     = 21;                        // Jumlah Content Per Halaman
        $config['num_links']    = 2;                        // Jumlah Digit Tombol Pagination Di Kiri & Kanan
        $config["first_link"]   = "first";                  // Tombol Awal Pagination
        $config["last_link"]    = "last";                   // Tombol Akhir Pagination
        $config["base_url"]     = base_url("daftar-komik/s-f");  // Set Halaman Yang Akan Di Pasangkan Pagination
        // $config["total_rows"]   = 0;
        $config["total_rows"]   = $this->comic->getLatestComicQuery(); // Total Baris Diamil Dari getLatestComicQuery()
        // Load Dan Init Semua Konfigurasi Pagination
        $this->pagination->initialize($config);

        /**
         * ------------------------------------
         *          Data To Display
         * ------------------------------------
         */
        $data["title"]          =   "Daftar Komik";
        $data["popular_comics"] =   $this->comps->get_popular_comics();
        $data["genres"]         =   $this->comps->get_all_genres();
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
        $data["comic_model"]    = $this->comic->get_comic_limit($config["per_page"], $data["start"], "", "comic_name","ASC");


        get_views("Home_page/comic_lists_page.php", $data);
    }
}
