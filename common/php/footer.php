<?php
use MatthiasMullie\Minify;

foreach ($SCRIPTS_EXTERNAL as $script_external)
  echo "<script src='${script_external}'></script>";

if( $PROD ) {

  foreach ($SCRIPTS as $script) {
    $js_minifier = new Minify\JS();
    $js_minifier->add($script);
    echo '<script>' . $js_minifier->minify() . '</script>';
  }

} else {

  foreach ($SCRIPTS as $script)
    echo '<script>' . file_get_contents($script) . '</script>';

}

if( ! $PROD )
  echo rebase('common/html/post_' . KrConfig::$CLIENT . '_' . KrConfig::$PAGE_TYPE . '.html');

