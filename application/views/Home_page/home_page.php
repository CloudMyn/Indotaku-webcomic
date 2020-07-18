<?php


$this->load->helper("model");
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>
   <ul></ul>
   <?php foreach ($comic_model as $data) {?>
      <li><?= $data->comic_desc ?></li>
   <?php } ?>
   <ul></ul>
</body>

</html>