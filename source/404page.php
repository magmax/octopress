<?php

   function redirect($url, $permanent = false)
   {
       header('Location: ' . $url, true, $permanent ? 301 : 302);
       die();
   }

   $url_map = array(
       '/2014/02/22/lamp-con-salt.html' => '/blog/2014/01/22/lamp-con-salt/',
       '/blog/2014/02/22/lamp-con-salt' => '/blog/2014/01/22/lamp-con-salt/',
       '/archive.html' => '/blog/archives',
       '/blog/2011/08/13/apache-derby' => '/blog/2011/04/23/apache-derby/',
   );
   if ( array_key_exists($_SERVER["REQUEST_URI"], $url_map)) {
       redirect($url_map[$_SERVER["REQUEST_URI"]], true);
   }


   if ( preg_match("@^(/20.+)\.html@", $_SERVER["REQUEST_URI"], $matches) ) {
       redirect('/blog' . $matches[1], true);
   }
   if ( preg_match("@^/page(\d+)@", $_SERVER["REQUEST_URI"], $matches) ) {
       redirect('/blog/page/' . $matches[1], true);
   }
   if ( preg_match("@^/blog/blog/(.*)$@", $_SERVER["REQUEST_URI"], $matches) ) {
       redirect('/blog/' . $matches[1], true);
   }
   if ( preg_match("@^(/blog/.*).html$@", $_SERVER["REQUEST_URI"], $matches) ) {
       redirect($matches[1], true);
   }
   if ( preg_match("@^/drupal/.*@", $_SERVER["REQUEST_URI"], $matches) ) {
       redirect('/', true);
   }

   redirect('/404page.html');
?>
