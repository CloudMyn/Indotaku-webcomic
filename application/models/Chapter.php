<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Chapter
{
   public $chapter_name, $chapter_images, $comic_slug, $chapter_order,
      $chapter_slug, $chapter_view, $chapter_date, $chapter_dir;

   public function __construct(array $chapter_data)
   {
      $this->chapter_slug     =  $chapter_data["chapter_slug"] ?? "";
      $this->comic_slug       =  $chapter_data["comic_slug"] ?? "";
      $this->chapter_name     =  $chapter_data["chapter_name"] ?? "";
      $this->chapter_images   =  explode("|", $chapter_data["chapter_images"] ?? "|");
      $this->chapter_view     =  intval($chapter_data["chapter_view"] ?? "");
      $this->chapter_date     =  intval($chapter_data["chapter_date"] ?? "");
      $this->chapter_dir      =  $chapter_data["chapter_dir"] ?? "";
      $this->chapter_order    =  $chapter_data["chapter_order"] ?? "";
   }
}
