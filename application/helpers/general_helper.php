<?php


function get_views(string $path, array $data): void
{
   $ci = get_instance();
   $ci->load->view("Templates/header.php", $data);
   $ci->load->view("Templates/navbar.php", $data);
   $ci->load->view($path, $data);
   $ci->load->view("Templates/footer.php", $data);
}
