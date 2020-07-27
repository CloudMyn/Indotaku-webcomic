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


function get_user_data()
{
   return false;
}



function time_elapsed_string($datetime, $full = false)
{
   $now = new DateTime;
   $ago = new DateTime("@" . $datetime);
   $diff = $now->diff($ago);

   $diff->w = floor($diff->d / 7);
   $diff->d -= $diff->w * 7;

   $string = array(
      'y' => 'year',
      'm' => 'month',
      'w' => 'week',
      'd' => 'day',
      'h' => 'hour',
      'i' => 'minute',
      's' => 'second',
   );
   foreach ($string as $k => &$v) {
      if ($diff->$k) {
         $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
      } else {
         unset($string[$k]);
      }
   }

   if (!$full) $string = array_slice($string, 0, 1);
   return $string ? implode(', ', $string) . ' ago' : 'just now';
}


/**
 * This Function Will Find Matches string and return it
 * 
 * @param   array|string target_match
 * @param   string   value
 * @return  bool|string
 */
function find_matches($target_match, string $string)
{
   $value = $target_match;
   if (is_array($target_match)) {
      $value   =  join("|", $target_match);
   }
   $result  =  preg_match("/^($value)*$/", $string);
   return ($result === 0) ? false : $string;
}
