<?php
/**Routes */

/** Account Routes */
$app->get('/', 'Presentation\Controllers\HomeController:getHelp');

/** Payment Routes */
$app->get('/signup', 'Presentation\Controllers\SignUpController');