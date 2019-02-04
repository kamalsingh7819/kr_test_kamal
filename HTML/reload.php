<pre><?php

flush();
ob_implicit_flush();

chdir('..');

unlink('data/_categories.php');
unlink('data/_questions.php');
unlink('data/_words.php');

passthru('php bin/generate_html.php');
