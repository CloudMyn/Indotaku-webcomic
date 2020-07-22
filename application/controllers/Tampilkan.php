<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Tampilkan extends CI_Controller
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

   public function komik($comic_slug)
   {
      if (!$comic_slug) to("Home");

      $data["title"]          =  "Komik " . replace($comic_slug) . " Bahasa Indonesia";
      $data["data"]           =   $this->comic->get_comic($comic_slug);
      $data["popular_comics"] =   $this->comps->get_popular_comics();
      $data["genres"]         =   $this->comps->get_all_genres();

      get_views("Comic_page/comic_view.php", $data);
   }
}
