<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 *    Home Class
 *
 *    @package     Comic Model
 *    @category    Models
 *    @author      Muhammad Abdi Natsir
 */

class Comic
{
   public $comic_id, $comic_name, $comic_slug, $comic_cover, $comic_desc, $comic_author,
      $comic_genre, $comic_status, $comic_rating, $comic_type, $published,
      $comic_source, $comic_web_src, $visited, $upvotes, $posted_by, $released,
      $is_my_project, $is_18plus, $like, $disLike, $total_chapter, $comic_update;

   public function __construct($data_array)
   {
      $this->comic_id      =  intval($data_array["comic_id"]);
      $this->comic_name    =  $data_array["comic_name"];
      $this->comic_cover   =  $data_array["comic_cover"];
      $this->comic_desc    =  $data_array["comic_desc"];
      $this->comic_author  =  $data_array["comic_author"];
      $this->comic_status  =  (intval($data_array["comic_status"]) === 1) ? "OnGoing" : "Ended";
      $this->comic_rating  =  floatval($data_array["comic_rating"]);
      $this->comic_genre   =  explode(",", $data_array["comic_genre"]);
      $this->comic_slug    =  $data_array["comic_slug"];
      $this->comic_type    =  $data_array["comic_type"];
      $this->comic_source  =  $data_array["comic_url_source"];
      $this->comic_web_src =  $data_array["comic_web_source"];
      $this->total_chapter =  intval($data_array["comic_chapters"]);
      $this->upvotes       =  intval($data_array["comic_upvotes"]);
      $this->released      =  $data_array["comic_date"];
      $this->posted_by     =  $data_array["comic_posted_by"];
      $this->is_my_project =  intval($data_array["comic_project"]);
      $this->is_18plus     =  intval($data_array["comic_18plus"]);
      $this->visited       =  intval($data_array["comic_visited"]);
      $this->like          =  intval($data_array["comic_like"]);
      $this->disLike       =  intval($data_array["comic_dislike"]);
      $this->published     =  intval($data_array["comic_date"]);
      $this->comic_update  =  intval($data_array["comic_update"]);
   }
}
