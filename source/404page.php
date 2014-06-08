<?php

   function redirect($url, $permanent = false)
   {
       header('Location: ' . $url, true, $permanent ? 301 : 302);
       die();
   }

   $url_map = array(
       '/2014/02/22/lamp-con-salt.html' => '/blog/2014/01/22/lamp-con-salt/',
   );
   if ( in_array($_SERVER["REQUEST_URI"], $url_map)) {
       redirect($url_map[$_SERVER["REQUEST_URI"]]);
   }


   if ( preg_match("@^(/20.+)\.html@", $_SERVER["REQUEST_URI"], $matches) ) {
       redirect('/blog' . $matches[1], true);
   }
   if ( preg_match("@^/page(\d+)@", $_SERVER["REQUEST_URI"], $matches) ) {
       redirect('/page/' . $matches[1], false);
   }
   redirect('/404page.html');
?>
