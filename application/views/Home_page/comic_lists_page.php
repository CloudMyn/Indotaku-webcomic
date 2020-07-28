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
            <div class="mp-box-left w-100">

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

                        <?php if ($results == 0) : ?>
                            <div class="alert alert-warning w-100" role="alert">
                                Komik Dengan Kriteria Tersebut Tidak <strong>Ditemukan!</strong>
                            </div>
                        <?php endif; ?>

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

                    <h2 class="text-main-color content-title text-center">Tempat Curhat</h2>
                    <hr class="my-2">
                    <!-- <script id="cid0020000256912115678" data-cfasync="false" async src="//st.chatango.com/js/gz/emb.js" style="width: 100%; height: 400px">
                        {
                            "handle": "inotaku-chat",
                            "arch": "js",
                            "styles": {
                                "a": "fd7c54",
                                "b": 100,
                                "c": "000000",
                                "d": "000000",
                                "k": "fd7c54",
                                "l": "fd7c54",
                                "m": "fd7c54",
                                "p": "10",
                                "q": "fd7c54",
                                "r": 100,
                                "fwtickm": 1
                            }
                        }
                    </script> -->

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

$allowed_order_table = ["name" => "Nama", "visited" => "Populer", "like" => "Favorite", "update" => "Update", "chapters" => "Chapter"];
$allowed_direct =   ["ASC" => "A-Z or 0-9", "DESC" => "Z-A or 9-0"];
$allowed_type =   ["manga", "manhua", "manhwa"];
$current_status = $this->session->userdata("sss-comic-status") ?? [];
$selected_genre = $this->session->userdata("sss-comic-genre") ?? [];
$selected_genre = join("|", $selected_genre);
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
                                <?php foreach ($allowed_order_table as $table_value => $table_name) : ?>
                                    <?php if ("comic_" . $table_value === $this->session->userdata("sss-order-by")) : ?>
                                        <option value="<?= $table_value ?>" selected> -- <?= $table_name ?> -- </option>
                                    <?php else : ?>
                                        <option value="<?= $table_value ?>"> -- <?= $table_name ?> -- </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row my-2 no-gutters">
                        <label for="direction" class="col-sm-4 col-form-label text-left">Direction</label>
                        <div class="col-sm-8">
                            <select class="custom-select mr-sm-2" id="direction" name="direction">
                                <?php foreach ($allowed_direct as $direction => $direction_name) : ?>
                                    <?php if ($direction === $this->session->userdata("sss-direction")) : ?>
                                        <option value="<?= $direction ?>" selected> -- <?= $direction_name ?> -- </option>
                                    <?php else : ?>
                                        <option value="<?= $direction ?>"> -- <?= $direction_name ?> -- </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row my-2 no-gutters">
                        <label for="type" class="col-sm-4 col-form-label text-left">Comic type</label>
                        <div class="col-sm-8">
                            <select class="custom-select mr-sm-2" id="type" name="type">
                                <option value="all"> -- All -- </option>
                                <?php foreach ($allowed_type as $comic_type) : ?>
                                    <?php if ($comic_type === $this->session->userdata("sss-comic-type")) : ?>
                                        <option value="<?= $comic_type ?>" selected> -- <?= $comic_type ?> -- </option>
                                    <?php else : ?>
                                        <option value="<?= $comic_type ?>"> -- <?= $comic_type ?> -- </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row my-2 no-gutters">
                        <label for="status" class="col-sm-4 col-form-label text-left">Comic Status</label>
                        <div class="col-sm-8">
                            <select class="custom-select mr-sm-2" id="status" name="status">
                                <?php if (0 == $current_status) : ?>
                                    <option value="all"> -- All -- </option>
                                    <option value="1"> -- OnGoing -- </option>
                                    <option value="0" selected> -- Ended -- </option>
                                <?php elseif (1 == $current_status) : ?>
                                    <option value="all"> -- All -- </option>
                                    <option value="1" selected> -- OnGoing -- </option>
                                    <option value="0"> -- Ended -- </option>
                                <?php else : ?>
                                    <option value="all" selected> -- All -- </option>
                                    <option value="1"> -- OnGoing -- </option>
                                    <option value="0"> -- Ended -- </option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>

                    <div class="my-2">
                        <label for="genre" class="col-form-label text-center text-uppercase font-weight-bold">Comic Genre</label>
                        <div id="select-genre">
                            <?php foreach ($genres as $genre) : ?>
                                <?php if (find_matches($selected_genre, $genre["name"])) : ?>
                                    <div class="genre">
                                        <div>
                                            <input checked type="checkbox" name="genres[]" id="<?= $genre["genre"] ?>" value="<?= $genre["name"] ?>">
                                        </div>
                                        <label class="label" class="m-0 p-0" for="<?= $genre["genre"] ?>"><?= $genre["genre"] ?></label>
                                    </div>
                                <?php else : ?>
                                    <div class="genre">
                                        <div>
                                            <input type="checkbox" name="genres[]" id="<?= $genre["genre"] ?>" value="<?= $genre["name"] ?>">
                                        </div>
                                        <label class="label" class="m-0 p-0" for="<?= $genre["genre"] ?>"><?= $genre["genre"] ?></label>
                                    </div>
                                <?php endif; ?>

                            <?php endforeach; ?>
                        </div>
                    </div>
                    <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url("clear-filter") ?>" class="btn btn-secondary">Clear</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit-button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>