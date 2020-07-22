<?php

function get_url_cover(): string
{
   return  "http://localhost/komikins/assets/image/komik/";
}

function get_views(string $path, array $data): void
{
   $ci = get_instance();
   $ci->load->view("Templates/header.php", $data);
   $ci->load->view("Templates/navbar.php", $data);
   $ci->load->view($path, $data);
   $ci->load->view("Templates/footer.php", $data);
}

function to(string $to): void
{
   redirect($to);
   exit;
}

function replace(string $str, string $from = "-", string $to = " "): string
{
   $array = explode($from, $str);
   return join($to, $array);
}

function get_active_server(): string
{
   $ci = get_instance();
   return $ci->db->get_where("_komik_config", ["_kc_name" => "active_server"])->row_array()["_kc_value"];
}

function get_active_table($active_server): array
{
   $ci = get_instance();
   return $ci->db->get_where("_komik_ws", ["ws_komik_name" => $active_server])->row_array();
}
