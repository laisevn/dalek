<?php
/**Routes */

use Main\Adapter\SlimRouteAdapter;

use function Main\Factories\makeSignUpController;

require __DIR__ . '/../src/Main/Factories/SignUp.php';
require __DIR__ . '/../src/Infra/Db/MySQL/AccountRepository/Account.php';
require __DIR__ . '/../src/Main/Adapter/SlimRouteAdapter.php';

/** Home */
$app->get('/', 'Presentation\Controllers\HomeController:getHelp');

/** Account */
$app->post('/signup', new SlimRouteAdapter(makeSignUpController()))->setName('signup');