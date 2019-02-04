#!/usr/bin/env php
<?php

$languages = [
  'FR',
  'UK',
  'DE',
  'ES',
  'IT',
  'EU',
  // 'US',
  'IE',
  // 'NL',
  'BE-FR',
  'BE-EN',
  // 'BE-FL',
  // 'CH-FR',
  // 'CH-DE',
  'CH-EN',
  // 'CH-IT',
];

if(empty($_ENV['HEROKU']))
  $languages = ['FR'];

// DO NOT CHANGE ANYTHING BELOW THIS LINE

// from https://stackoverflow.com/questions/12424787/how-to-check-if-a-shell-command-exists-from-php
/**
 * Determines if a command exists on the current environment
 *
 * @param string $command The command to check
 * @return bool True if the command has been found ; otherwise, false.
 */
function command_exists ($command) {
  $whereIsCommand = (PHP_OS == 'WINNT') ? 'where' : 'which';

  $process = proc_open(
    "$whereIsCommand $command",
    array(
      0 => array("pipe", "r"), //STDIN
      1 => array("pipe", "w"), //STDOUT
      2 => array("pipe", "w"), //STDERR
    ),
    $pipes
  );
  if ($process !== false) {
    $stdout = stream_get_contents($pipes[1]);
    $stderr = stream_get_contents($pipes[2]);
    fclose($pipes[1]);
    fclose($pipes[2]);
    proc_close($process);

    return $stdout != '';
  }

  return false;
}

if(!command_exists('zip'))
  die("[-] Command 'zip' was not found. Please install ZIP on your system");

$directory = 'HTML';
$zip_file = $directory . '/HTML.zip';

passthru("rm -f $directory/*html");

foreach ($languages as $language) {
  echo "# Generating HTML for $language";

  $file_local = "$directory/$language" . "_LOCAL_index.html";
  $file_prod = "$directory/$language" . "_PROD_index.html";

  putenv("language=$language");
  putenv("prod=false"); shell_exec("php index.php > $file_local || rm -f $file_local");
  putenv("prod=true");  shell_exec("php index.php > $file_prod || rm -f $file_prod");

  if(file_exists($file_local) && file_exists($file_prod))
    echo ": done\n";
  else {
    echo "\nError log:\n\tLANGUAGE: $language\n";
    echo shell_exec("language=$language php index.php");
    die(-1);
  }
}

@unlink("$directory/$zip_file");
passthru('zip ' . $zip_file . ' -x "*LOCAL_*.html" -x ' . $directory . '/index.php -r ' . $directory);
echo $zip_file;
