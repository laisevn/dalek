<?php declare (strict_types = 1);

namespace Presentation\Controllers;

use Presentation\Protocols\Controller;

require __DIR__ . './../../../vendor/autoload.php';


class PaymentController implements Controller
{

  public function __construct()
  {
  }

  public function handle($request): String{
    return 'to implemnt';
  }
}
