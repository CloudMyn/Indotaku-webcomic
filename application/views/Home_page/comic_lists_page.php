<?php


$my_path = get_url_cover();



function get_alias_ch(string $chapter_name): string
{
    $arr = explode(" ", $chapter_name);
    array_shift($arr);
    return "Ch. " . end($arr);
}
?>


<section class="bg-container">
    <div class="container p-0">


        <div class="mp-bigbox">

            <!-- New Updates -->
            <div class="mp-box-left">

                <div class="sbox mb-3 box-shadow-min">

                    <div class="content-header m-0 p-0">
                        <div class="ch-title">
                            <h2 class="text-main-color content-title">Daftar Komik</h2>
                        </div>
                        <div class="ch-action">
                            <button class="btn-filter"> <i class="fa fa-fw fa-filter"></i> </button>
                        </div>
                    </div>
                    <hr class="mb-3 mt-1">
                    <div class="bxcontent">

                        <?php foreach ($comic_model as $data) { ?>


                            <div class="bxcontent-items">

                                <div class="thumbnail">
                                    <img src="<?= $my_path . $data->comic_cover ?>" alt="Comic Cover">
                                </div>
                                <div class="info-details">
                                    <a href="#wkwkwkw" class="d-none"><?= $data->comic_name . " Bahasa Indonesia" ?></a>
                                    <a href="<?= base_url("komik/" . $data->comic_slug) ?>" class="text-decoration-none title">
                                        <?= $data->comic_name ?>
                                    </a>

                                    <div class="small-box">
                                        <div class="type"><?= $data->comic_type ?></div>
                                        <div class="status"><?= $data->comic_status ?></div>
                                    </div>


                                    <span class="latest-chapters">
                                        <?php
                                        $this->load->model("Comic/Comic_model.php", "comic");
                                        $this->load->helper("model");
                                        $x3_chaps = $this->comic->get_limit_chapter($data->comic_slug, 3);
                                        ?> <?php if ($x3_chaps === NULL or $x3_chaps === []) : ?>
                                            <span class="chapter-list" style="visibility: hidden;">
                                                <a class="text-decoration-none">-- none -- </a>
                                                <p>-none-</p>
                                            </span>
                                            <span class="chapter-list" style="visibility: hidden;">
                                                <a class="text-decoration-none">-- none -- </a>
                                                <p>-none-</p>
                                            </span>
                                            <span class="chapter-list" style="visibility: hidden;">
                                                <a class="text-decoration-none">-- none -- </a>
                                                <p>-none-</p>
                                            </span>
                                        <?php endif; ?>
                                        <?php foreach ($x3_chaps as $chapter) : ?>
                                            <span class="chapter-list">
                                                <a href="<?= base_url("chapter/" . $chapter->chapter_slug) ?>" class="text-decoration-none"><?= get_alias_ch($chapter->chapter_name) ?></a>
                                                <p>2 hours ago</p>
                                            </span>
                                        <?php endforeach; ?>
                                    </span>
                                </div>

                            </div>


                        <?php } ?>



                    </div>

                    <?= $this->pagination->create_links() ?>
                </div>

            </div>

            <!-- Genre -->
            <div class="mp-box-right">


                <div class="sbox mb-3 box-shadow-min">

                    <h2 class="text-main-color content-title text-center">Our Discord</h2>
                    <hr class="my-2">
                    <img src="<?= base_url("assets/Join-Us.png") ?>" alt="discord img" width="100%">

                </div>

                <div class="sbox mb-3 box-shadow-min">

                    <h2 class="text-main-color content-title text-center">Genre</h2>
                    <hr class="my-2">
                    <ul class="genre-ul">
                        <?php foreach ($genres as $genre) : ?>
                            <li class="genre-li"><a class="list-a" href="#"><?= $genre["genre"] ?></a></li>
                        <?php endforeach; ?>
                    </ul>

                </div>




            </div>


        </div>

    </div>

    </div>
</section>