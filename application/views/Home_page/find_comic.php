<?php


$my_path = get_url_cover();



function get_alias_ch(string $chapter_name): string
{
    $arr = explode(" ", $chapter_name);
    array_shift($arr);
    return "Ch. " . end($arr);
}
?>

<style>
    div.mp-box-sigle {
        width: 100%;
        padding: 15px 5px;
    }

    div.sbox {
        width: 100%;
    }

    @media(min-width: 768px) {

        div.bxcontent-items {
            width: 50% !important;
        }
    }

    @media(min-width: 1024px) {

        div.bxcontent-items {
            width: 25% !important;
        }
    }
</style>

<section class="bg-container">
    <div class="container p-0">


        <div class="mp-bigbox">

            <!-- New Updates -->
            <div class="mp-box-sigle">

                <div class="sbox mb-3 box-shadow-min">

                    <h2 class="text-main-color content-title">Hasil Pencarian</h2>
                    <hr class="mb-3 mt-2">
                    <div class="bxcontent">

                        <?php if ($comics === []) : ?>
                            <div class="alert alert-warning w-100 text-center" role="alert">
                                Data Tidak <strong>Ditemukan!</strong>
                            </div>
                        <?php endif ?>

                        <?php foreach ($comics as $data) { ?>


                            <div class="bxcontent-items">

                                <div class="thumbnail">
                                    <img src="<?= $my_path . $data->comic_cover ?>" alt="Comic Cover">
                                </div>
                                <div class="info-details">
                                    <a href="#" class="d-none"><?= $data->comic_name . " Bahasa Indonesia" ?></a>
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
                                        ?>
                                        <?php if ($x3_chaps === NULL or $x3_chaps === []) : ?>
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
                                                <p><?= time_elapsed_string($chapter->chapter_date) ?></p>
                                            </span>
                                        <?php endforeach; ?>
                                    </span>
                                </div>

                            </div>


                        <?php } ?>



                    </div>
                </div>

            </div>


        </div>

    </div>

    </div>
</section>