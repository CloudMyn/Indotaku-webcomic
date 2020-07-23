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
      $this->_comic_table  = "_komik";
      $this->_chapter_table = "_komik_chapters";
      // $this->_comic_table  = $data["ws_komik_table"];
      // $this->_chapter_table = $data["ws_komik_ch_table"];
      $this->load->helper("model");
   }
   public function get_comic($comic_slug): Comic
   {

      $data = $this->db->get_where($this->_comic_table, ["comic_slug" => $comic_slug])->row_array();
      $comic_data = new Comic($data);
      $this->db->update($this->_comic_table, ["comic_visited" =>  $comic_data->visited += 1], ["comic_slug" => $comic_slug]);
      return $comic_data;
   }

   public function get_chapter($chapter_slug): Chapter
   {
      $result_data    = $this->db->get_where($this->_chapter_table, ["chapter_slug" => $chapter_slug])->row_array();
      return new Chapter($result_data);
   }

   public function get_limit_chapter($comic_slug, $limit)
   {
      $this->db->select("comic_slug, chapter_slug, chapter_name", "chapter_date");
      $this->db->order_by("chapter_id", "ASC");
      $this->db->order_by("chapter_slug", "ASC");
      $array = $this->db->get_where($this->_chapter_table, ["comic_slug" => $comic_slug], $limit)->result_array();
      return $this->_array_to_obj($array, false);
   }

   public function get_comic_chapter(string $comic_slug)
   {
      $this->db->select("comic_slug, chapter_slug, chapter_name", "chapter_date");
      $this->db->order_by("chapter_id", "ASC");
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
      $lists_array = $this->db->get_where("_komik", $this->_active_comic)->result_array();
      $this->db->select("`comic_name`, `comic_cover`, `comic_slug`, `comic_status`, `comic_type`");
      return $this->_array_to_obj($lists_array);
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
