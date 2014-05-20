<?php

   function redirect($url, $permanent = false)
   {
       header('Location: ' . $url, true, $permanent ? 301 : 302);
       die();
   }

   if ( preg_match("@^(/20.+)\.html$@", $_SERVER["REQUEST_URI"], $matches) ) {
       redirect('/blog' . $matches[1], true);
   }
   redirect('/404page.html');
?>
