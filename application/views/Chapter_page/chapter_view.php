<?php

function filter_dashes(string $value)
{
   $r = explode("-", $value);
   return join(" ", $r);
}

$my_path = get_url_cover();
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <meta name="description" content="...must be filled to optimized the seo">
   <title><?= $title ?></title>

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

      header div.header-search {
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

         header div.header-search {
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

         <div class="header-search">
            <input class="form-control mr-sm-2 dark" type="text" placeholder="Temukan Komik...">
            <button class="btn btn-outline-main my-2 my-sm-0 dark" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
         </div>
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
                  <li class="nav-item active">
                     <a class="nav-link" href="<?= base_url()?>"><i class="fa fa-home" aria-hidden="true"></i><span class="sr-only">(current)</span> <span>Beranda</span></a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="comic_lists.html"><i class="fa fa-th-list" aria-hidden="true"></i><span class="sr-only">(current)</span> <span>Daftar Komik</span></a>
                  </li>
               </ul>


               <form class="form-inline my-2 my-lg-0 ml-auto" id="nav-search">
                  <input class="form-control mr-sm-2" type="text" placeholder="Search">
                  <button class="btn btn-outline-mainrev my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
               </form>
            </div>
         </div>
   </nav>

   <section class="container p-0 py-2">
      <div class="cp-bigbox p-0">

         <div class="headpost">
            <h3><?= filter_dashes($chapter->chapter_slug) ?></h3>
            <p>Chapter Lenkap Komik <a href="<?= base_url("komik/" . $chapter->comic_slug)?>"><?= filter_dashes($chapter->comic_slug) ?></a></p>
         </div>

         <div class="cp-tags">
            <p> - <i>Keywords</i> - Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod quam earum nisi
               expedita libero explicabo. Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
         </div>

         <div class="cp-action px-2">

            <div class="box-right">

               <select name="select-chapter" id="select-chapter" onchange="to(this)">
                  <option value="7">Chapter 7</option>
                  <option value="6">Chapter 6</option>
                  <option value="5">Chapter 5</option>
                  <option value="4">Chapter 4</option>
                  <option value="3">Chapter 3</option>
                  <option value="2">Chapter 2</option>
                  <option selected value="1">Chapter 1</option>
               </select>

            </div>

            <script>
               function to(data) {
                  console.log(data.value);
                  let url = `chapter_page.html?chapter-${data.value}`;
                  document.location.replace(url)
               }
            </script>

            <div class="btn-chp">
               <a href="#pref" class="prev">« Previous Chapter</a>
               <a href="#next" class="prev">Next Chapter »</a>
            </div>

            <div class="box-left">
               <a href="#pref" class="btn-download">Download</a>
            </div>

         </div>

         <div class="chapter-box" id="chapter-box">
         </div>


         <div class="btn-chp mt-2 px-2">
            <a href="#pref" class="prev">« Previous Chapter</a>
            <a href="#next" class="prev">Next Chapter »</a>
         </div>


         <div class="cp-tags mt-3">
            <p> - <i>Keywords</i> - Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt doloremque dolore delectus quasi nam accusamus ipsa, sunt nisi, provident saepe a soluta non!, Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, atque autem accusamus provident, possimus laudantium fuga molestias ipsum reprehenderit at hic voluptatum minus.</p>
         </div>

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
      const chapter_box = document.getElementById("chapter-box");
      const chapterLists = <?= json_encode($chapter->chapter_images) ?>;

      setTimeout(generateComicChapter, 1500)

      function generateComicChapter() {
         let allChapters = "";
         chapterLists.forEach((data) => {
            allChapters += `
                <div class="chapter-img">
                    <img src="<?= "http://localhost/komikins/"?>${data}" alt="G.O">
                </div>`;
         });
         // chapter_box.innerHTML = "";
         chapter_box.innerHTML = allChapters;
         // <div class="chapter-img">
         //     <img src="./assets/Greatest Outcast 001-010/Chapter 001/001.jpg" alt="G.O">
         // </div>
      }
   </script>

   <script src="<?= base_url() ?>/assets/js/jquery-3.3.1.slim.min.js"></script>
   <script src="<?= base_url() ?>/assets/js/popper.min.js"></script>
   <script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>
   <script src="<?= base_url() ?>/assets/js/main.js"></script>
</body>

</html>