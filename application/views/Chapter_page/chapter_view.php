<?php

function filter_dashes(string $value)
{
   $r = explode("-", $value);
   return join(" ", $r);
}

$my_path = get_url_cover();

$menu = ["Beranda" => "fa-home|" . base_url(), "Daftar Komik" => "fa-th-list|" . base_url("daftar-komik")];

$this->load->model("Comic/Comic_model", "comic");
$this->load->helper("model");
$chapters = $this->comic->get_comic_chapter($chapter->comic_slug);
$chapters = array_reverse($chapters);

$chapter_slug = replace($chapter->chapter_slug);
$keywords = [
   "Baca $chapter_slug Bahasa Indonesia",
   "Baca Komik $chapter_slug Bahasa Indoensia",
   "Baca Online Komik $chapter_slug Bahasa Indoensia",
];

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <meta name="description" content="...must be filled to optimized the seo">
   <meta name="keywords" content="<?= join(" | ", $keywords) ?>">
   <title><?= strtolower($title) ?></title>

   <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
   <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?= base_url() ?>assets/font-awesome/css/font-awesome.min.css">


   <link rel="stylesheet" href="<?= base_url() ?>assets/css/view/mobile-view.css">
   <link rel="stylesheet" href="<?= base_url() ?>assets/css/view/tablet-view.css">
   <link rel="stylesheet" href="<?= base_url() ?>assets/css/view/desktop-view.css">

   <style>
      /* ---------------------------------- Header & Nav Style ---------------------------------- */
      header {
         background-color: #ebebebec;
      }

      header div.container {
         display: flex;
      }

      header div#header-brand {
         display: flex;
         align-items: center;
         flex: 1;
      }

      div#header-brand a {
         display: flex;
         color: #fd7c54;
         font-size: 23px;
         font-weight: 700;
         text-transform: uppercase;
         text-decoration: none;
      }

      header .header-search {
         display: flex;
         flex: 0.4;
      }

      .header-search input {
         display: inline;
         color: #ff6334;
         font-weight: 400;
         border: 1px solid #fd7c54;
         flex: 1;
      }


      .header-search input.dark {
         color: #999;
         border: 1px solid #999;
      }


      .header-search input:focus {
         box-shadow: 0 0 1px 2px #ff6b3e9d;
      }

      .header-search input.dark:focus {
         box-shadow: 0 0 1px 2px rgb(138, 138, 138);
      }

      .header-search button {
         border: none;
         color: #fd7c54;
         border-color: #ff6b3e;
         border-style: solid;
         border-width: 1px;
         background-color: white;
         flex: 0.05;
      }

      .header-search button.dark {
         color: #999;
         border-color: #999;
         background-color: #0b0a0d;
      }

      .header-search button:hover {
         background-color: #fd7c54;
         color: white;
      }

      .header-search button.dark:hover {
         background-color: #999;
         color: #0b0a0d;
      }

      form#nav-search {
         display: none;
         visibility: hidden;
      }


      @media screen and (max-width: 995px) {
         header div#header-brand {
            align-items: center;
            justify-content: center;
         }

         header .header-search {
            visibility: hidden;
            flex: 0;
            display: none;
         }

         form#nav-search {
            visibility: visible;
            display: flex;
         }
      }


      .bg-dark-mode {
         background-color: #0b0a0d !important;
      }

      /* ---------------------------------- End Header & Nav Style ---------------------------------- */


      div.bigcover {
         background: url('./src/sampul/ReZero.jpg') no-repeat;
         background-size: cover;
         overflow: hidden;
         width: 100%;
         height: 160px;
      }

      @media screen and (min-width: 768px) {
         div.bigcover {
            height: 180px;
         }
      }
   </style>
</head>

<body class="bg-container-dark">
   <header class="bg-dark-mode">
      <div class="container py-2">
         <div id="header-brand">

            <a href="#" class="color-dark-mode"><i class="fa fa-paper-plane" aria-hidden="true"></i>Komik Otaku</a>
         </div>

         <form method="POST" action="<?= base_url("find/") ?>" class="header-search">
            <input class="form-control mr-sm-2 dark" type="text" name="kw" placeholder="Temukan Komik..." autocomplete="false">
            <button class="btn btn-outline-main my-2 my-sm-0 dark" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
         </form>
      </div>
   </header>
   <nav>
      <section class="navbar navbar-expand-sm navbar-dark bg-main-color-dark">
         <div class="container">
            <!-- <a class="navbar-brand" href="#"><i class="fa fa-paper-plane" aria-hidden="true"></i>IndOtaku.me</a> -->
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
               <ul class="navbar-nav mt-2 mt-lg-0">

                  <?php foreach ($menu as $menu_name => $menu_value) : ?>
                     <?php
                     $arra_value =  explode("|", $menu_value);
                     $menu_icon  =  $arra_value[0];
                     $menu_url   =  $arra_value[1];
                     ?>
                     <?php if ($menu_name === $title) : ?>
                        <li class="nav-item active">
                           <a class="nav-link" href="<?= $menu_url ?>"><i class="fa <?= $menu_icon ?>" aria-hidden="true"></i><span class="sr-only"></span> <span><?= $menu_name ?></span></a>
                        </li>
                     <?php else : ?>
                        <li class="nav-item">
                           <a class="nav-link" href="<?= $menu_url ?>"><i class="fa <?= $menu_icon ?>" aria-hidden="true"></i><span class="sr-only"></span> <span><?= $menu_name ?></span></a>
                        </li>
                     <?php endif; ?>

                  <?php endforeach; ?>
               </ul>


               <form method="POST" action="<?= base_url("find/") ?>" class="form-inline my-2 my-lg-0 ml-auto" id="nav-search">
                  <input class="form-control mr-sm-2" type="text" name="kw" placeholder="Temukan Komik..." autocomplete="false">
                  <button class="btn btn-outline-mainrev my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
               </form>
            </div>
         </div>
   </nav>

   <section class="container p-0 py-2">
      <div class="cp-bigbox p-0">

         <div class="headpost">
            <h3><?= filter_dashes($chapter->chapter_slug) ?></h3>
            <p>Chapter Lenkap Komik <a href="<?= base_url("komik/" . $chapter->comic_slug) ?>"><?= filter_dashes($chapter->comic_slug) ?></a></p>
         </div>

         <div class="cp-tags">
            <p> - <i>Keywords</i> - <?= join(" | ", $keywords) ?></p>
         </div>

         <div class="cp-action px-2">

            <div class="box-right">

               <select name="select-chapter" id="select-chapter" onchange="to(this)">
                  <?php $index = 1; ?>
                  <?php foreach ($chapters as $chap) : ?>
                     <?php if ($chap->chapter_slug === $chapter->chapter_slug) : ?>
                        <option class="c-items" id="selected-item" data-index="<?= $index++ ?>" value="<?= base_url("chapter/" . $chap->chapter_slug) ?>" selected><?= $chap->chapter_name ?></option>
                     <?php else : ?>
                        <option class="c-items" data-index="<?= $index++ ?>" value="<?= base_url("chapter/" . $chap->chapter_slug) ?>"><?= $chap->chapter_name ?></option>
                     <?php endif; ?>
                  <?php endforeach; ?>
               </select>

            </div>


            <div class="btn-chp">
               <a href="#pref" class="prev-chapter">« Previous Chapter</a>
               <a href="#next" class="next-chapter">Next Chapter »</a>
            </div>

            <div class="box-left">
               <button disabled="disabled" class="btn-download btn-dwd-disabled">download</button>
            </div>

         </div>

         <div class="chapter-box" id="chapter-box">
            <?php foreach ($chapter->chapter_images as $chapter) : ?>
               <?php if (preg_match("/(http:|https)+/", $chapter) == 0) : ?>
                  <div class="chapter-img">
                     <img src="<?= "http://localhost/komikins/" . $chapter ?>" alt="G.O">
                  </div>
               <?php else : ?>
                  <div class="chapter-img">
                     <img src="<?= $chapter ?>" alt="G.O">
                  </div>
               <?php endif; ?>
            <?php endforeach; ?>
         </div>


         <div class="btn-chp mt-2 px-2">
            <a href="#pref" class="prev-chapter">« Previous Chapter</a>
            <a href="#next" class="next-chapter">Next Chapter »</a>
         </div>


         <div class="cp-tags mt-3"><?= join(" | ", $keywords) ?> </div>

      </div>
   </section>

   <footer class="bg-dark-mode">
      <div class="foo-menu">
         <a href="#" class="color-dark-mode">About Us</a>
         <a href="#" class="color-dark-mode">Contact Us</a>
         <a href="#" class="color-dark-mode">Disclaimer</a>
         <a href="#" class="color-dark-mode">FAQ</a>
         <a href="#" class="color-dark-mode">Privacy Policy</a>
      </div>
      <h6 class="foo-msg">
         Semua komik di website ini hanya preview dari komik aslinya, mungkin terdapat banyak kesalahan bahasa,
         nama tokoh, dan alur cerita. Untuk versi aslinya, silahkan beli komiknya jika tersedia di kotamu.
      </h6>
      <div class="foo-end bg-main-color-dark">
         <h5><?= date("Y") ?> inOtaku.com - All Right Reserved</h5>
      </div>
   </footer>

   <script>
      window.addEventListener("keydown", (e) => {
         if (e.keyCode === 39) {
            $(".next-chapter")[0].click();

         } else if (e.keyCode === 37) {
            $(".prev-chapter")[0].click();
         }
      }, false);
   </script>


   <script>
      const chapter_box = document.getElementById("chapter-box");

      function generateComicChapter() {
         let allChapters = "";
         chapterLists.forEach((data) => {
            let regexp = new RegExp("/(https:|http:)*/");
            if (regexp.exec(data)) {
               console.log(data);
               allChapters += `
                <div class="chapter-img">
                    <img src="<?= "base_url" ?>${data}" alt="G.O">
                </div>`;
            }
         });
         // chapter_box.innerHTML = "";
         chapter_box.innerHTML = allChapters;
      }

      // To Redirect
      const to = (data) => {
         document.location.replace(data.value);
      }
   </script>

   <script src="<?= base_url() ?>/assets/js/jquery-3.3.1.slim.min.js"></script>
   <script src="<?= base_url() ?>/assets/js/popper.min.js"></script>
   <script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>
   <script src="<?= base_url() ?>/assets/js/main.js"></script>

   <script>
      // Check Previos And Next Chapters
      const all_chapters = document.getElementsByClassName("c-items");
      const selected_item_element = document.getElementById("selected-item");
      const selected_item_number = parseInt(selected_item_element.getAttribute("data-index"));
      const prev_btn = document.getElementsByClassName("prev-chapter");
      const next_btn = document.getElementsByClassName("next-chapter");

      // console.log(all_chapters);
      for (index in all_chapters) {
         let e = all_chapters[index].getAttribute("data-index");
         if (isNaN(parseInt(e))) continue;

         if (parseInt(e) == selected_item_number - 1) {
            prev_chapter_url = all_chapters[index].getAttribute("value");
            prev_btn[0].setAttribute("href", prev_chapter_url);
            prev_btn[1].setAttribute("href", prev_chapter_url);
         } else if (parseInt(e) == selected_item_number + 1) {
            next_chapter_url = all_chapters[index].getAttribute("value");
            next_btn[0].setAttribute("href", next_chapter_url);
            next_btn[1].setAttribute("href", next_chapter_url);
         }

      }
   </script>
</body>

</html>