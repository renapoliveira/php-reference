<?php

use Codecourse\Repositories\UserRepository as UserRepository;
use Codecourse\Filters\AuthFilter as AuthFilter;

require_once 'app/start.php';

$user = new UserRepository();
$filter = new AuthFilter();
