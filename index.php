<?php

define('PROJECT_DIRECTORY', dirname(__FILE__));
define('BASE_DIRECTORY', PROJECT_DIRECTORY );

require 'common/php/head.php';

// CHANGE ME !
$ID = 'kr_test_kamal';

KrConfig::init([
  'client' => 'maje',
  'page_type' => 'landing',
]);

// SET THIS VARIABLE TO 'TRUE' TO BUST THE CACHE OF SCSS FILES
$BUST_CACHE_FOR_SCSS = false;

// IN CASE YOU NEED TO CHANGE PATH TO IMAGES
// if(PROD()) $PATH_TO_IMAGES = 'LP/' . ID() . '/images/';

// ADD HERE YOUR CUSTOM JS FILES TO INCLUDE (relative paths)
// $SCRIPTS[] = 'common/scripts/mobile_detection.js';
$SCRIPTS[] = 'script.js';

// ADD HERE YOUR CUSTOM CSS FILES TO INCLUDE (relative paths)
$STYLES[] = 'style.scss';

load_words(
  'TXT',
  'https://docs.google.com/spreadsheets/d/e/2PACX-1vSw04z2SDch1u1J9C9Wmyr8uTlBmJvYUsHhQpZCi8_obpLJNG5g7nWRpKb6zx-OB9aIv56IZZkX6Sy0/pub?gid=0&single=true&output=csv', // URL TO 'TXT' CSV GOES HERE
  'data/_words.php'
  );
load_words(
  'URL',
  'https://docs.google.com/spreadsheets/d/e/2PACX-1vSw04z2SDch1u1J9C9Wmyr8uTlBmJvYUsHhQpZCi8_obpLJNG5g7nWRpKb6zx-OB9aIv56IZZkX6Sy0/pub?gid=1349220144&single=true&output=csv', // URL TO 'URL' CSV GOES HERE
  'data/_urls.php'
  );
load_products(
  '', // URL TO 'PRODUCTS' CSV GOES HERE
  'data/_products.php'
  );

require 'common/php/header.php';
?>

<div class="kr_content_wrapper" id="<?= ID() ?>" data-lang="<?= LANG() ?>" data-lang-short="<?= SHORT_LANG() ?>">
  <div class="container-fluid section-1">
    <div class="row banner p1-50"> <img class="img-fluid w-100" srcset="<?= PATH_TO_IMAGES();?>/W18_sneackers_HP@12X.jpg?$staticlink$ 2x" src="<?= PATH_TO_IMAGES();?>/W18_sneackers_HP.jpg?$staticlink$" alt="" /> </div>
  </div>
  <!-- section-1 ends here-->
  
  <div class="container section-2">
    <div class="row vertical-align p1-50">
      <div class="col-md-6 s2-mbl-btm-pds-30">
        <div class="text-center"> <img srcset="<?= PATH_TO_IMAGES();?>/W18_sneackers_HP_02@2X.jpg?$staticlink$ 2x" src="<?= PATH_TO_IMAGES();?>/W18_sneackers_HP_02.jpg?$staticlink$" alt="" />
          <p class="p1-30 h-line-break">celebrating yesterday to reinvent tomorrow, setting this symbolic turning <br />
            point on course for the future. The brand plunges .</p>
          <p class="p1-40"><a class="underline" href="<?= word('URL_GOOGLE'); ?>">
            <?= word('TXT_TEXT_2'); ?>
            </a></p>
        </div>
      </div>
      <div class="col-md-6"><img srcset="<?= PATH_TO_IMAGES();?>/W18_sneackers_HP_03@2X.jpg?$staticlink$ 2x" src="<?= PATH_TO_IMAGES();?>/W18_sneackers_HP_03.jpg?$staticlink$" alt="" /> </div>
    </div>
  </div>
  <!-- section-2 ends here-->
  
  <div class="container-fluid section-3">
    <div class="row">
      <div class="row">
        <div class="col-md-8 grey-background">
          <div class="col-md-6"> <img srcset="<?= PATH_TO_IMAGES();?>/W18_sneackers_HP_04@2X.jpg?$staticlink$ 2x" src="<?= PATH_TO_IMAGES();?>/W18_sneackers_HP_04.jpg?$staticlink$" alt="" /> </div>
          <div class="col-md-6 hidden-on-mobile hidden-on-tablet"> <img srcset="<?= PATH_TO_IMAGES();?>/W18_sneackers_HP_05@2X.jpg?$staticlink$ 2x" class="hp_img_05" src="<?= PATH_TO_IMAGES();?>/W18_sneackers_HP_05.jpg?$staticlink$" alt="" /> </div>
        </div>
        <div class="col-md-4 s2-mbl-top-mgr-40">
          <div class="text-center"> <img src="<?= PATH_TO_IMAGES();?>/W18_sneackers_HP_06.jpg?$staticlink$" alt="" />
            <p class="p1-30"> <a class="underline" href="<?= word('URL_GOOGLE'); ?>">
              <?= word('TXT_TEXT_2'); ?>
              </a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- section-3 ends here-->
  
  <div class="container-fluid section-4">
    <div class="row p1-40">
      <div class="row">
        <div class="col-md-4"> 
        <img srcset="<?= PATH_TO_IMAGES();?>/W18_sneackers_HP_07@2X.jpg?$staticlink$ 2x" src="<?= PATH_TO_IMAGES();?>/W18_sneackers_HP_07.jpg?$staticlink$" alt="" /> 
        <h2>Lorem ipsum, xx&euro;</h2>
        </div>
        
        
        <div class="col-md-4"> <img srcset="<?= PATH_TO_IMAGES();?>/W18_sneackers_HP_08@2X.jpg?$staticlink$ 2x" src="<?= PATH_TO_IMAGES();?>/W18_sneackers_HP_08.jpg?$staticlink$" alt="" /> <h2>Lorem ipsum, xx&euro;</h2></div>
        <div class="col-md-4"> <img srcset="<?= PATH_TO_IMAGES();?>/W18_sneackers_HP_09@2X.jpg?$staticlink$ 2x" src="<?= PATH_TO_IMAGES();?>/W18_sneackers_HP_09.jpg?$staticlink$" alt="" /> <h2>Lorem ipsum, xx&euro;</h2></div>
      </div>
    </div>
  </div>
  <?php show_button_to_top() ?>
</div>
<?php require 'common/php/footer.php';



