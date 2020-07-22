<?php

$my_path = get_url_cover();

?>

<style>
   div.bigcover {
      background: url("<?= $my_path . $data->comic_cover ?>") no-repeat;
      background-size: cover;
      overflow: hidden;
      background-position: 0 -70px;
      width: 100%;
      height: 200px;
   }

   div.bigcover::after {
      content: "";
      position: absolute;
      overflow: hidden;
      width: 100%;
      height: 200px;
      background: linear-gradient(transparent, rgba(0, 0, 0, 0.616));
      background: -o-linear-gradient(transparent, rgba(0, 0, 0, 0.616));
      background: -moz-linear-gradient(transparent, rgba(0, 0, 0, 0.616));
      background: -webkit-linear-gradient(transparent, rgba(0, 0, 0, 0.616));
   }

   @media screen and (min-width: 768px) {
      div.bigcover {
         position: relative;
         height: 240px;
      }

      div.bigcover::after {
         content: "";
         position: absolute;
         width: 100%;
         height: 240px;
      }
   }
</style>

<section class="bg-container">
   <div class="container p-0">

      <div class="mp-bigbox">

         <div class="mp-box-left">

            <div class="sbox mb-3 box-shadow-min p-0 position-relative">

               <!-- Mini Jumbotron -->
               <div class="bigcover"></div>

               <div class="bigcontent">
                  <div class="thumb">
                     <img src="<?= $my_path . $data->comic_cover ?>" alt="Sampul">
                  </div>
                  <div class="comic-info">
                     <div class="comic-title">
                        <h3><?= $data->comic_name ?></h3>
                     </div>
                     <div class="comic-spec">
                        <span>
                           <b>Genres:</b>
                           <a href="#"> Action</a>, <a href="#">Comedy</a>, <a href="#">Fantasy</a>,
                           <a href="#">Martial Arts</a>, <a href="#">Shounen</a>
                        </span>
                        <span>
                           <b>Author:</b>
                           <i> <?= $data->comic_author ?></i>
                        </span>
                        <span><b>Total Chapters:</b> <?= $data->total_chapter ?></span>
                        <span><b>Type:</b> <?= $data->comic_type ?></span>
                        <span><b>Posted On:</b> <?= date("d-M-Y", $data->published) ?></span>
                        <span><b>Posted By:</b> <i><?= $data->comic_posted_by ?? "-" ?></i></span>
                        <span><b>Updated On:</b> <?= date("d-M-Y", $data->comic_update) ?></span>
                     </div>
                  </div>
                  <div class="rating-box">
                     <div class="rtx">
                        <p>Scores : <?= $data->comic_rating ?></p>
                        <span class="rating-star">
                           <i class="fa fa-star color-rate star"></i>
                           <i class="fa fa-star color-rate star"></i>
                           <i class="fa fa-star color-rate star"></i>
                           <i class="fa fa-star color-rate star"></i>
                           <i class="fa fa-star color-rate star"></i>
                           <i class="fa fa-star color-rate star"></i>
                           <i class="fa fa-star color-rate star"></i>
                           <i class="fa fa-star-half-empty color-rate star"></i>
                           <i class="fa fa-star-o color-rate star"></i>
                           <i class="fa fa-star-o color-rate star"></i>
                        </span>
                     </div>
                  </div>
               </div>

               <hr class="my-2 mx-3">

               <div class="comic-desc">
                  - <i><b>description</b></i> - <?= $data->comic_desc ?>
               </div>

               <hr class="my-2 mx-3">

               <div class="tags">
                  <h5>Keywords</h5>
                  <p> Baca Komik Re: Zero Bahasa Indonesia | Baca Online Komik Re: Zero | Baca Manga Re: Zero
                     |
                     Re: Zero Bahasa Indonesia Manga</p>
               </div>

            </div>

            <div class="sbox mb-3 box-shadow-min">
               <h2 class="text-main-color content-title text-center">Chapter Re: Zero</h2>
               <hr class="my-2">
               <div class="chapters-box">
                  <div class="chapter-item">
                     <a href="chapter_page.html" class="title">Chapter 10</a>
                     <p class="time-ago">2 hours ago</p>
                     <button class="btn-chapter-dwd">Unduh</button>
                  </div>
                  <div class="chapter-item">
                     <a href="chapter_page.html" class="title">Chapter 9</a>
                     <p class="time-ago">5 hours ago</p>
                     <button class="btn-chapter-dwd">Unduh</button>
                  </div>
                  <div class="chapter-item">
                     <a href="chapter_page.html" class="title readed">Chapter 8</a>
                     <p class="time-ago">6 hours ago</p>
                     <button class="btn-chapter-dwd">Unduh</button>
                  </div>
                  <div class="chapter-item">
                     <a href="chapter_page.html" class="title readed">Chapter 7</a>
                     <p class="time-ago">12 hours ago</p>
                     <button class="btn-chapter-dwd">Unduh</button>
                  </div>
                  <div class="chapter-item">
                     <a href="chapter_page.html" class="title readed">Chapter 6</a>
                     <p class="time-ago">23 hours ago</p>
                     <button class="btn-chapter-dwd">Unduh</button>
                  </div>
                  <div class="chapter-item">
                     <a href="chapter_page.html" class="title readed">Chapter 5</a>
                     <p class="time-ago">2 days ago</p>
                     <button class="btn-chapter-dwd">Unduh</button>
                  </div>
                  <div class="chapter-item">
                     <a href="chapter_page.html" class="title readed">Chapter 4</a>
                     <p class="time-ago">1 week ago</p>
                     <button class="btn-chapter-dwd">Unduh</button>
                  </div>
                  <div class="chapter-item">
                     <a href="chapter_page.html" class="title readed">Chapter 3</a>
                     <p class="time-ago">1 years ago</p>
                     <button class="btn-chapter-dwd">Unduh</button>
                  </div>
                  <div class="chapter-item">
                     <a href="chapter_page.html" class="title readed">Chapter 2</a>
                     <p class="time-ago">5 years ago</p>
                     <button class="btn-chapter-dwd">Unduh</button>
                  </div>
                  <div class="chapter-item">
                     <a href="chapter_page.html" class="title readed">Chapter 1</a>
                     <p class="time-ago">6 years ago</p>
                     <button class="btn-chapter-dwd">Unduh</button>
                  </div>
               </div>
            </div>

            <!-- box-margin sidebox-content - must-delete -->

            <div class="sbox mb-3 box-shadow-min">

               <h2 class="text-main-color content-title text-center">Mirip Komik Re: Zero</h2>
               <hr class="my-2">

               <div class="sp-comicbox pb-2">

                  <div class="sp-comicbox-items">

                     <a class="sp-thumb" href="./comic_page.html">
                        <img src="./src/sampul/Naruto.jpg" alt="Comic Cover">
                     </a>
                     <a href="./comic_page.html" class="text-decoration-none title max-lines set-lines-2">
                        Uzumaki Naruto
                     </a>

                  </div>

                  <div class="sp-comicbox-items">

                     <a class="sp-thumb" href="./comic_page.html">
                        <img src="./src/sampul/Noragami.jpg" alt="Comic Cover">
                     </a>
                     <a href="./comic_page.html" class="text-decoration-none title max-lines set-lines-2">
                        Noragami
                     </a>


                  </div>

                  <div class="sp-comicbox-items">

                     <a class="sp-thumb" href="./comic_page.html">
                        <img src="./src/sampul/Aldnoa.jpg" alt="Comic Cover">
                     </a>
                     <a href="./comic_page.html" class="text-decoration-none title max-lines set-lines-2">
                        Aldnoa
                     </a>

                  </div>

                  <div class="sp-comicbox-items">

                     <a class="sp-thumb" href="./comic_page.html">
                        <img src="./src/sampul/FairyGone.jpg" alt="Comic Cover">
                     </a>
                     <a href="./comic_page.html" class="text-decoration-none title max-lines set-lines-2">
                        Fairy Gone
                     </a>

                  </div>

                  <div class="sp-comicbox-items">

                     <a class="sp-thumb" href="./comic_page.html">
                        <img src="./src/sampul/AttackOnTitans.jpg" alt="Comic Cover">
                     </a>
                     <a href="./comic_page.html" class="text-decoration-none title max-lines set-lines-2">
                        Attack On Titans
                     </a>

                  </div>


               </div>
            </div>



         </div>

         <div class="mp-box-right">


            <div class="sbox mb-3 box-shadow-min">

               <h2 class="text-main-color content-title text-center">Our Discord</h2>
               <hr class="my-2">
               <img src="<?= base_url("assets/Join-Us.png") ?>" alt="discord img" width="100%">

            </div>


            <div class="sbox mb-3 box-shadow-min px-0">

               <h2 class="text-main-color content-title text-center">Komik Populer</h2>
               <hr class="mt-2 mb-0 mx-2">
               <div class="komik-populer-box">
                  <ul>

                     <?php $index = 1 ?>
                     <?php foreach ($popular_comics as $comic) : ?>

                        <?php if ($index === 1) : ?>

                           <li class="topone">
                              <img src="<?= $my_path . $comic->comic_cover ?>" alt="cover">
                              <div class="komik">
                                 <div class="rank">
                                    <p class="rank-1"><?= $index ?></p>
                                 </div>
                                 <a href="comic_page.html" class="r-series">
                                    <img src="<?= $my_path . $comic->comic_cover ?>" alt="cover">
                                 </a>
                                 <a href="comic_page.html" class="l-series">
                                    <p class="max-lines set-lines-1 popular-title">
                                       <?= $comic->comic_name ?>
                                    </p>
                                    <p class="max-lines set-lines-3">
                                       <?= join(", ", $comic->comic_genre) ?>
                                    </p>
                                 </a>
                              </div>
                           </li>

                        <?php else : ?>

                           <li class="top-ten">
                              <div class="rank">
                                 <p class="top-ten-rank"><?= $index ?></p>
                              </div>
                              <a href="comic_page.html" class="r-series">
                                 <img src="<?= $my_path . $comic->comic_cover ?>" alt="cover">
                              </a>
                              <a href="comic_page.html" class="l-series">
                                 <p class="max-lines set-lines-1 popular-title text-secondary"> <?= $comic->comic_name ?></p>
                                 <p class="max-lines set-lines-3 text-secondary"><?= join(", ", $comic->comic_genre) ?></p>
                              </a>
                           </li>

                        <?php endif; ?>
                        <?php $index++ ?>
                     <?php endforeach; ?>

                  </ul>
               </div>
            </div>
         </div>


      </div>
   </div>

   </div>
</section>