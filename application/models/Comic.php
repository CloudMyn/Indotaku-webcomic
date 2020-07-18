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
      $comic_source, $storage_source, $visited, $upvotes, $posted_by, $released,
      $is_my_project, $is_18plus, $like, $disLike, $total_chapter;

   public function __construct($data_array)
   {
      $this->comic_id      =  intval($data_array["id"]);
      $this->comic_name    =  $data_array["name"];
      $this->comic_cover   =  $data_array["cover"];
      $this->comic_desc    =  $data_array["description"];
      $this->comic_author  =  $data_array["author"];
      $this->comic_status  =  intval($data_array["status"]);
      $this->comic_rating  =  floatval($data_array["rating"]);
      $this->comic_genre   =  explode(",", $data_array["genre"]);
      $this->comic_slug    =  $data_array["komik_name"];
      $this->comic_type    =  $data_array["komik_type"];
      $this->comic_source  =  $data_array["komik_source"];
      $this->storage_source =  $data_array["source"];
      $this->total_chapter =  intval($data_array["total_chapters"]);
      $this->upvotes       =  intval($data_array["upvotes"]);
      $this->released      =  $data_array["date"];
      $this->posted_by     =  $data_array["posted_by"];
      $this->is_my_project =  intval($data_array["my_project"]);
      $this->is_18plus     =  intval($data_array["18plus"]);
      $this->visited       =  intval($data_array["visited"]);
      $this->like          =  intval($data_array["like"]);
      $this->disLike       =  intval($data_array["dislike"]);
      $this->published     =  intval($data_array["date"]);
      $this->comic_updated =  intval($data_array["update"]);
   }
}
