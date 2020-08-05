<?php

$my_path = get_url_cover();
$scores = floatval($data->comic_rating);

$comic_slug =  replace($data->comic_slug);
$comic_type =  $data->comic_type;
$comic_kw   =  [
   "Baca $comic_type $comic_slug Bahasa Indonesia",
   "Baca Online $comic_type $comic_slug Bahasa Indonesia",
   "Baca Komik $comic_slug"
];
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
                        <h3><?= $data->comic_name ?> - Bahasa Indonesia</h3>
                     </div>
                     <div class="comic-spec">
                        <span>
                           <b>Genres:</b>
                           <?php foreach ($data->comic_genre as $genre) : ?>
                              <a href="#"> <?= $genre ?></a>,
                           <?php endforeach; ?>
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
                        <p>Scores : <?= $scores ?></p>
                        <span class="rating-star">
                           <?php for ($i = 1; $i <= 10; $i++) : ?>
                              <?php if ($i <= $scores) : ?>
                                 <i class="fa fa-star color-rate star"></i>
                              <?php elseif ($i > $scores && $i - 1 < $scores) : ?>
                                 <i class="fa fa-star-half-o color-rate star"></i>
                              <?php else : ?>
                                 <i class="fa fa-star-o color-rate star"></i>
                              <?php endif ?>
                           <?php endfor; ?>
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
                  <p><?= join(" | ", $comic_kw)?></p>
               </div>

            </div>

            <div class="sbox mb-3 box-shadow-min">
               <h2 class="text-main-color content-title text-center">Chapter <?= $data->comic_name ?></h2>
               <hr class="my-2">
               <div class="chapters-box">
                  <?php foreach ($chapters as $chapter) : ?>
                     <div class="chapter-item">
                        <a onclick="check(this)" href="<?= base_url("chapter/" . $chapter->chapter_slug) ?>" class="title"><?= $chapter->chapter_name ?></a>
                        <p class="time-ago"><?= time_elapsed_string($chapter->chapter_date) ?></p>
                        <!-- <button class="btn-chapter-dwd">Unduh</button> -->
                     </div>
                  <?php endforeach; ?>
               </div>
            </div>

            <!-- box-margin sidebox-content - must-delete -->

            <div class="sbox mb-3 box-shadow-min">

               <h2 class="text-main-color content-title text-center">Mirip <?= $data->comic_name ?></h2>
               <hr class="my-2">

               <div class="sp-comicbox pb-2">

                  <?php foreach ($similiar_comic as $comic) : ?>
                     <div class="sp-comicbox-items">

                        <a class="sp-thumb" href="<?= base_url("komik/" . $comic->comic_slug) ?>">
                           <img src="<?= $my_path . $comic->comic_cover ?>" alt="Comic Cover">
                        </a>
                        <a href="<?= base_url("komik/" . $comic->comic_slug) ?>" class="text-decoration-none title max-lines set-lines-2">
                           <?= $comic->comic_name ?>
                        </a>

                     </div>
                  <?php endforeach; ?>




               </div>
            </div>


            <div class="sbox mb-3 box-shadow-min">

               <h2 class="text-main-color content-title text-center">Comment Disini Kuy</h2>
               <hr class="my-2">

               <div class="sp-comicbox pb-2">

                  <div id="disqus_thread" class="w-100"></div>
                  <script>
                     /**
                      *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                      *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                     /*
                     var disqus_config = function () {
                     this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                     this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                     };
                     */
                     (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document,
                           s = d.createElement('script');
                        s.src = 'https://indotaku.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                     })();
                  </script>
                  <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>





               </div>
            </div>




         </div>

         <div class="mp-box-right">


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
                                 <a href="<?= base_url("komik/" . $comic->comic_slug) ?>" class="r-series">
                                    <img src="<?= $my_path . $comic->comic_cover ?>" alt="cover">
                                 </a>
                                 <a href="<?= base_url("komik/" . $comic->comic_slug) ?>" class="l-series">
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
                              <a href="<?= base_url("komik/" . $comic->comic_slug) ?>" class="r-series">
                                 <img src="<?= $my_path . $comic->comic_cover ?>" alt="cover">
                              </a>
                              <a href="<?= base_url("komik/" . $comic->comic_slug) ?>" class="l-series">
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


<script id="dsq-count-scr" src="//indotaku.disqus.com/count.js" async></script>



<script>
   function check(val) {
      console.log("halli")
   }
</script>