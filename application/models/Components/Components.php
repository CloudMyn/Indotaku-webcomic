<?php


/**
 * Components Class
 *
 * @package     Comic Model
 * @category    Models
 * @author      Muhammad Abdi Natsir
 */

class Components extends CI_Model
{
   private $_active_comic = ["comic_active" => 1];
   public function __construct()
   {
      parent::__construct();
      $this->load->database();
      /// ------ Get Active Server ------
      $active_server  =   get_active_server();
      $data  =   get_active_table($active_server);
      $this->_comic_table  = $data["ws_komik_table"];
      $this->_chapter_table = $data["ws_komik_ch_table"];
   }
   
   /**
    * -----------------------------------
    * [`Get All Comic Data With Status`] `=` `1`
    * -----------------------------------
    * @return      array[object]
    */
   public function get_popular_comics(): array
   {
      $this->db->order_by("comic_like", "DESC");
      $array_data = $this->db->get_where("_komik", $this->_active_comic, 10)->result_array();

      return $this->_array_to_comic_obj($array_data);
   }


   /**
    * -----------------------------------
    *       [`Get All Comic Genres`]
    * -----------------------------------
    * @return      array[object]
    */
   public function get_all_genres(): array
   {
      $this->db->select("name,genre");
      return $this->db->get("_komik_genre")->result_array();
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
