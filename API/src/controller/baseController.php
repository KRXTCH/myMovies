<?php

require_once 'request.php';

$request = new Request();

echo $request->CallAPI('GET', 'movie/popular');
