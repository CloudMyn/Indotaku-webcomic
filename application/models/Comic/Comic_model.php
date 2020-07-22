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
      $this->_comic_table  = $data["ws_komik_table"];
      $this->_chapter_table = $data["ws_komik_ch_table"];
      $this->load->helper("model");
   }
   public function get_comic($comic_slug)
   {
      $data = $this->db->get_where($this->_comic_table, ["comic_slug" => $comic_slug])->row_array();
      return new Comic($data);
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

      return $this->_array_to_comic_obj($lists_array);
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
   private function _array_to_comic_obj(array $lists_array): array
   {
      $comics_array = [];
      for ($i = 0; $i < count($lists_array); $i++) {
         $comics_array[$i] = new Comic($lists_array[$i]);
      }
      return $comics_array;
   }
}
