<?php
use Codecourse\Repositories\UserRepository as UserRepository;
use Codecourse\Filters\AuthFilter as AuthFilter;

$loader = require __DIR__.'/vendor/autoload.php';

$user = new UserRepository();
$filter = new AuthFilter();
