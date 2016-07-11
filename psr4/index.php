<?php
use Codecourse\Repositories\UserRepository as UserRepository;
use Codecourse\Filters\AuthFilter as AuthFilter;

require_once 'src/start.php';

$user = new UserRepository();
$filter = new AuthFilter();
