<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <meta name="description" content="">
   <meta name="keywords" content="">
   <title><?= $title ?></title>

   <link rel="stylesheet" href="<?= getOriginUrl() ?>assets/css/style.css">
   <link rel="stylesheet" href="<?= getOriginUrl() ?>assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?= getOriginUrl() ?>assets/font-awesome/css/font-awesome.min.css">


   <link rel="stylesheet" href="<?= getOriginUrl() ?>assets/css/view/mobile-view.css">
   <link rel="stylesheet" href="<?= getOriginUrl() ?>assets/css/view/tablet-view.css">
   <link rel="stylesheet" href="<?= getOriginUrl() ?>assets/css/view/desktop-view.css">

   <style>
      /* ---------------------------------- Header & Nav Style ---------------------------------- */
      header {
         background-color: #fbfbfb;
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

      .header-search input:focus {
         box-shadow: 0 0 1px 2px #ff6b3e9d;
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

      .header-search button:hover {
         background-color: #fd7c54;
         color: white;
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

      /* ---------------------------------- End Header & Nav Style ---------------------------------- */
   </style>


   <script src="<?= getOriginUrl() ?>/assets/js/jquery-3.3.1.slim.min.js"></script>
</head>

<body>
   <header>
      <div class="container py-3">
         <div id="header-brand">
            <a href="<?= getOriginUrl() ?>">IndOtaku</a>
         </div>

         <form method="POST" action="<?= getOriginUrl("find/") ?>" class="header-search">
            <input class="form-control mr-sm-2 input-kw" type="text" name="kw" placeholder="Temukan Komik..." autocomplete="false">
            <button class="btn btn-outline-main my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
         </form>
      </div>
   </header>
