<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Comic_Controller extends CI_Controller
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
      $this->load->library("components", "", "comps");
   }

   public function get_comic($comic_slug)
   {
      if (!$comic_slug) to("Home");

      $data["title"]          =  "Komik " . replace($comic_slug) . " Bahasa Indonesia";
      $data["data"]           =   $this->comic->get_comic($comic_slug);
      $data["popular_comics"] =   $this->comps->get_popular_comics();
      $data["chapters"]       =   $this->comic->get_comic_chapter($comic_slug);
      $data["similiar_comic"] =   $this->comps->get_similiar_comic($data['data']->comic_genre);

      get_views("Comic_page/comic_view.php", $data);
   }

   public function get_comic_chapter($chapter_slug)
   {
      if (!$chapter_slug) to("Home");

      $data["title"]       =  "Baca " . replace($chapter_slug) . " Bahasa Indonesia";
      $data["chapter"]     =  $this->comic->get_chapter($chapter_slug);
      $this->load->view("Chapter_page/chapter_view.php", $data);
   }
}
