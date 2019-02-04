<?php

$lang = isset($_GET['lang']) ? basename($_GET['lang']) : 'FR';
$lang = strtoupper($lang);

require $lang . '_LOCAL_index.html';
