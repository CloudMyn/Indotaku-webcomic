<?php


/**
 * Home Class
 *
 * @package     Comic Model
 * @category    Models
 * @author      Muhammad Abdi Natsir
 */

class Home_model extends CI_Model
{
   public function __construct()
   {
      parent::__construct();
      $this->load->database();
   }

   /**
    * -----------------------------------
    * Get All Comic Data With Status Is 1
    * -----------------------------------
    * @return      array
    */
   public function get_all_comic(): array
   {
      $this->load->helper("model");
      $this->db->order_by("update", "DESC");
      $lists_array = $this->db->get_where("_komik", ["is_active" => 1])->result_array();
      $comics_array = [];

      for ($i = 0; $i < count($lists_array); $i++) {
         $comics_array[$i] = new Comic($lists_array[$i]);
      }
      return $comics_array;
   }
}
