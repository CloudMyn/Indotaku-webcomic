<?php

$menu = ["Beranda" => "fa-home|" . base_url(), "Daftar Komik" => "fa-th-list|" . base_url("daftar-komik")];

?>
<nav>
   <section class="navbar navbar-expand-sm navbar-dark bg-main-color">
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