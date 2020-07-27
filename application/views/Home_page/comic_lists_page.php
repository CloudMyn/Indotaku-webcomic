<?php


$my_path = get_url_cover();

$csrf = array(
    'name' => $this->security->get_csrf_token_name(),
    'hash' => $this->security->get_csrf_hash()
);

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
                            <button class="btn-filter" data-toggle="modal" data-target="#exampleModalCenter"> <i class="fa fa-fw fa-filter"></i> </button>

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

<?php

$filter_options = [];

?>

<script>
    $(window).ready(() => {
        // $('#exampleModalCenter').modal('show');
    })
</script>

<form method="post" action="">
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Comic Filter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row my-2 no-gutters">
                        <label for="order-by" class="col-sm-4 col-form-label text-left">Order By</label>
                        <div class="col-sm-8">
                            <select class="custom-select mr-sm-2" id="order-by" name="order-by">
                                <option value="name"> -- name -- </option>
                                <option value="visited"> -- popular -- </option>
                                <option value="like"> -- like -- </option>
                                <option value="dislike"> -- dislike -- </option>
                                <option value="chapters"> -- total chapters -- </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row my-2 no-gutters">
                        <label for="direction" class="col-sm-4 col-form-label text-left">Direction</label>
                        <div class="col-sm-8">
                            <select class="custom-select mr-sm-2" id="direction" name="direction">
                                <option value="ASC"> -- ASC --</option>
                                <option value="DESC"> -- DESC --</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row my-2 no-gutters">
                        <label for="type" class="col-sm-4 col-form-label text-left">Comic type</label>
                        <div class="col-sm-8">
                            <select class="custom-select mr-sm-2" id="type" name="type">
                                <option value="" selected> -- All -- </option>
                                <option value="manga"> -- Manga -- </option>
                                <option value="manhua"> -- Manhua -- </option>
                                <option value="manhwa"> -- Manhwa -- </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row my-2 no-gutters">
                        <label for="status" class="col-sm-4 col-form-label text-left">Comic Status</label>
                        <div class="col-sm-8">
                            <select class="custom-select mr-sm-2" id="status" name="status">
                                <option value="" selected> -- All -- </option>
                                <option value="1"> -- Ongoing -- </option>
                                <option value="0"> -- Ended -- </option>
                            </select>
                        </div>
                    </div>

                    <div class="my-2">
                        <label for="genre" class="col-form-label text-center text-uppercase font-weight-bold">Comic Genre</label>
                        <div id="select-genre">
                            <?php foreach ($genres as $genre) : ?>
                                <div class="genre">
                                    <div>
                                        <input class="" type="checkbox" name="genres[]" id="<?= $genre["genre"] ?>" value="<?= $genre["name"] ?>">
                                    </div>
                                    <label class="label" class="m-0 p-0" for="<?= $genre["genre"] ?>"><?= $genre["genre"] ?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit-button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>