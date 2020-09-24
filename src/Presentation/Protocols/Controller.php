<?php

namespace Presentation\Protocols;
 
interface Controller
{
    public function handle(String $request): String;
}
