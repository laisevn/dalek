<?php

use Slim\Psr7\Request;
use Slim\Psr7\Response;

interface Controller
{
    public function handle(Request $request): Response;
}
