<?php


$this->load->helper("model");
?>


<section class="bg-container">
   <div class="container p-0">


      <div class="mp-bigbox">

         <!-- New Updates -->
         <div class="mp-box-left">

            <div class="sbox mb-3 box-shadow-min">

               <h2 class="text-main-color content-title">Update Terbaru</h2>
               <hr class="mb-3 mt-2">
               <div class="bxcontent">

                  <?php foreach ($comic_model as $data) { ?>


                     <div class="bxcontent-items">

                        <div class="thumbnail">
                           <img src="http://localhost/komikins/assets/image/komik/<?= $data->comic_cover?>" alt="Comic Cover">
                        </div>
                        <div class="info-details">
                           <a href="./comic_page.html" class="text-decoration-none title">
                              <?= $data->comic_name?>
                           </a>

                           <div class="small-box">
                              <div class="type"><?= $data->comic_type?></div>
                              <div class="status"><?= $data->comic_status?></div>
                           </div>


                           <span class="latest-chapters">
                              <span class="chapter-list">
                                 <a href="#" class="text-decoration-none">Ch. 8</a>
                                 <p>2 hours ago</p>
                              </span>
                              <span class="chapter-list">
                                 <a href="#" class="text-decoration-none">Ch. 7</a>
                                 <p>12 hours ago</p>
                              </span>
                              <span class="chapter-list">
                                 <a href="#" class="text-decoration-none">Ch. 6</a>
                                 <p>1 day ago</p>
                              </span>
                           </span>
                        </div>

                     </div>


                  <?php } ?>



               </div>

            </div>

         </div>

         <!-- Genre -->
         <div class="mp-box-right">


            <div class="sbox mb-3 box-shadow-min">

               <h2 class="text-main-color content-title text-center">Our Discord</h2>
               <hr class="my-2">
               <img src="./src/Join-Us.png" alt="discord img" width="100%">

            </div>

            <div id="genre" class="sbox mb-3 box-shadow-min">

               <h2 class="text-main-color content-title text-center">Genre</h2>
               <hr class="my-2">
               <ul class="genre-ul" id="genre-list">
               </ul>

            </div>

            <div class="sbox mb-3 box-shadow-min px-0">

               <h2 class="text-main-color content-title text-center">Komik Populer</h2>
               <hr class="mt-2 mb-0 mx-2">
               <div class="komik-populer-box">
                  <ul>
                     <li class="topone">
                        <img src="./src/Sampul/BlackClover.jpg" alt="cover">
                        <div class="komik">
                           <div class="rank">
                              <p class="rank-1">1</p>
                           </div>
                           <a href="comic_page.html" class="r-series">
                              <img src="./src/Sampul/BlackClover.jpg" alt="cover">
                           </a>
                           <a href="comic_page.html" class="l-series">
                              <p class="max-lines set-lines-1 popular-title">Black Clover
                              </p>
                              <p class="max-lines set-lines-3">Action, Magic, Adventure, Shounen
                              </p>
                           </a>
                        </div>
                     </li>
                     <li class="top-ten">
                        <div class="rank">
                           <p class="top-ten-rank">2</p>
                        </div>
                        <a href="comic_page.html" class="r-series">
                           <img src="./src/Sampul/ca66f8f6e148cde9f9755b144e518587.th.jpg" alt="cover">
                        </a>
                        <a href="comic_page.html" class="l-series">
                           <p class="max-lines set-lines-1 popular-title text-secondary">King Avatar</p>
                           <p class="max-lines set-lines-3 text-secondary">Action, Magic, Adventure,
                              Shounen, Game, Isekai, Ecchi</p>
                        </a>
                     </li>

                     <!-- <hr class="mt-2"> -->
                     <li class="top-ten">
                        <div class="rank">
                           <p class="top-ten-rank">3</p>
                        </div>
                        <a href="comic_page.html" class="r-series">
                           <img src="./src/Sampul/5IlxL2PfQ8CyY4TLRru9TcU56b3(1).jpg" alt="cover">
                        </a>
                        <a href="comic_page.html" class="l-series">
                           <p class="max-lines set-lines-1 popular-title text-secondary">Owari No Seraph
                           </p>
                           <p class="max-lines set-lines-3 text-secondary">Action, Magic, Drama, Romance,
                              Shounen, Ecchi</p>
                        </a>
                     </li>
                     <li class="top-ten">
                        <div class="rank">
                           <p class="top-ten-rank">4</p>
                        </div>
                        <a href="comic_page.html" class="r-series">
                           <img src="./src/Sampul/Aldnoa.jpg" alt="cover">
                        </a>
                        <a href="comic_page.html" class="l-series">
                           <p class="max-lines set-lines-1 popular-title text-secondary">Aldnoa Zero</p>
                           <p class="max-lines set-lines-3 text-secondary">Action, Sci-fi, Adventure,
                              Seinen, Game</p>
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>


      </div>

   </div>

   </div>
</section>