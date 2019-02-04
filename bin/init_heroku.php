#!/usr/bin/env php
<?php

$file_to_read = 'index.php';

if(!file_exists(($file_to_read)))
  die('[-] Could not find "' . $file_to_read . '" in "' . getcwd() . '". Are you in the root directory ?');

$m_id = trim(shell_exec('grep "\$ID = " ' . $file_to_read . ' | grep "kr_\([a-zA-Z0-9_\-]\+\)" -o'));

if(empty($m_id))
  die("[-] Please edit '$file_to_read' to change \$ID. Then run me again");

if(!file_exists('common'))
  passthru('rm -rf .git ; git clone git@bitbucket.org:kaamandroffler/smcp-dp-common.git common && rm -rf common/.git');

if(file_exists('HTML/images/kr_'))
  rename('HTML/images/kr_', 'HTML/images/' . $m_id);

passthru('composer install');

passthru('git init .');
passthru('git add .');
passthru('git commit -am init');

passthru('heroku apps:create --region eu --remote heroku');
passthru('heroku access:add gabriel@kaam.fr');
passthru('heroku git:remote --remote heroku');
passthru('heroku config:set HEROKU=true');

passthru('git push -u heroku master');
