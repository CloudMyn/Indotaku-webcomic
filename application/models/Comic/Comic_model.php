<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Home Class
 *
 * @package     Comic Model
 * @category    Models
 * @author      Muhammad Abdi Natsir
 */

class Comic_model extends CI_Model
{
   private $_active_comic = ["comic_active" => 1];
   private $_comic_table, $_chapter_table;
   public function __construct()
   {
      parent::__construct();
      $this->load->database();
      /// ------ Get Active Server ------
      $active_server  =   get_active_server();
      $data  =   get_active_table($active_server);
      // $this->_comic_table  = $this->_comic_table;
      // $this->_chapter_table = "_komik_chapters";
      $this->_comic_table  = $data["ws_komik_table"];
      $this->_chapter_table = $data["ws_komik_ch_table"];
      $this->load->helper("model");
   }
   public function get_comic($comic_slug): Comic
   {
      $this->update_comic_view($comic_slug);
      $data = $this->db->get_where($this->_comic_table, ["comic_slug" => $comic_slug])->row_array();
      $comic_data = new Comic($data);
      return $comic_data;
   }

   public function get_chapter($chapter_slug): Chapter
   {
      $result_data    = $this->db->get_where($this->_chapter_table, ["chapter_slug" => $chapter_slug])->row_array();
      $comic_data =  new Chapter($result_data);
      $this->update_comic_view($comic_data->comic_slug);
      return $comic_data;
   }

   public function update_comic_view($comic_slug)
   {
      $comic_data = $this->db->get_where($this->_comic_table, ["comic_slug" => $comic_slug])->row_array();
      $current_value = $comic_data["comic_visited"];
      $this->db->update($this->_comic_table, ["comic_visited" =>  $current_value += 1], ["comic_slug" => $comic_slug]);
   }

   public function get_limit_chapter($comic_slug, $limit): array
   {
      $this->db->select("comic_slug, chapter_slug, chapter_name, chapter_date");
      $this->db->order_by("chapter_id", "DESC");
      $this->db->order_by("chapter_slug", "ASC");
      $array = $this->db->get_where($this->_chapter_table, ["comic_slug" => $comic_slug], $limit)->result_array();
      return $this->_array_to_obj($array, false) ?? [];
   }

   public function find_comic(string $keyword) : array
   {
      $this->db->like("comic_name", $keyword, "last");
      $this->db->or_like("comic_author", $keyword, "last");
      $result = $this->db->get($this->_comic_table)->result_array();
      return $this->_array_to_obj($result);
   }

   public function get_comic_chapter(string $comic_slug)
   {
      $this->db->select("comic_slug, chapter_slug, chapter_name, chapter_date");
      $this->db->order_by("chapter_id", "DESC");
      $this->db->order_by("chapter_slug", "ASC");
      $array = $this->db->get_where($this->_chapter_table, ["comic_slug" => $comic_slug])->result_array();
      return $this->_array_to_obj($array, false);
   }

   /**
    * -----------------------------------
    * Get All Comic Data With Status Is 1
    * -----------------------------------
    * @return      array[object]
    */
   public function get_all_comic(): array
   {
      $this->load->helper("model");
      $this->db->order_by("comic_update", "DESC");
      $this->db->select("`comic_name`, `comic_cover`, `comic_slug`, `comic_status`, `comic_type`");
      $lists_array = $this->db->get_where($this->_comic_table, $this->_active_comic)->result_array();
      return $this->_array_to_obj($lists_array);
   }



   /**
    * -----------------------------------
    * Get All Comic Data With Status Is 1
    * -----------------------------------
    * @return      array[object]
    */
   public function get_comic_limit(array $data): array
   {
      $limit         =  $data["limit"];
      $offset        =  $data["offset"];
      $keyword       =  $data["keyword"] ?? "";
      $order_by      =  $data["order_by"];
      $ordering      =  $data["direction"];

      $this->load->helper("model");


      if (isset($data["comic_genre"])) {
         $index = 0;
         foreach ($data["comic_genre"] as $genre) {
            if ($index === 0) {
               $this->db->or_like("comic_genre", $genre);
            } else {
               $this->db->like("comic_genre", $genre);
            }
            $index++;
         }
      }

      if (isset($data["comic_type"])) {
         $this->db->where("comic_type", $data["comic_type"]);
      }
      if (isset($data["comic_status"])) {
         $this->db->where("comic_status", $data["comic_status"]);
      }

      // var_dump($order_by, $ordering);
      $this->db->order_by($order_by, $ordering);



      if ($keyword !== "") {
         $this->db->like("comic_name", $keyword, "after");
         $this->db->like("comic_author", $keyword, "after");
      }
      $this->db->select("`comic_name`, `comic_cover`, `comic_slug`, `comic_status`, `comic_type`");
      $lists_array = $this->db->get_where($this->_comic_table, $this->_active_comic, $limit, $offset)->result_array();
      return $this->_array_to_obj($lists_array);
   }



   /**
    * ------------------ getLatestComicQuery() ------------------
    *  Berfungsi Unutk Mengambil Jumlah Comic Yang Diquery 
    *  Terahkir Kali.
    *  @param  String      Keyword Pencarian
    *  @return int         Total Komik
    */
   public function getLatestComicQuery(array $data = [])
   {


      if (isset($data["comic_genre"])) {
         $index = 0;
         foreach ($data["comic_genre"] as $genre) {
            if ($index === 0) {
               $this->db->or_like("comic_genre", $genre);
            } else {
               $this->db->like("comic_genre", $genre);
            }
            $index++;
         }
      }

      if (isset($data["comic_type"])) {
         $this->db->where("comic_type", $data["comic_type"], true);
      }
      if (isset($data["comic_status"])) {
         $this->db->where("comic_status", $data["comic_status"], true);
      }

      $keyword = $data["keyword"] ?? "";
      if ($keyword !== "") {
         $this->db->like("comic_name", $keyword, "after");
         $this->db->or_like("comic_author", $keyword, "after");
      }

      $this->db->where($this->_active_comic);
      $this->db->from($this->_comic_table);
      return $this->db->count_all_results();
   }



   /**
    * 
    *  -----------------------------------------------------------------------------------------
    *                               PRIVATE FUNCTION IS DOWN HERE
    *  -----------------------------------------------------------------------------------------
    *
    */

   /**
    *  will convert from array[array] to
    *  array[object]
    * 
    *  @param      arra[array]     // Associative Array
    *  @return     array[object]   // Associative Array Contain An Object
    */
   private function _array_to_obj(array $lists_array, bool $is_comic = true): array
   {
      $comics_array = [];
      for ($i = 0; $i < count($lists_array); $i++) {
         if ($is_comic)
            $comics_array[$i] = new Comic($lists_array[$i]);
         else
            $comics_array[$i] = new Chapter($lists_array[$i]);
      }
      return $comics_array;
   }
}
