<?php

require_once 'request.php';


class userController
{
    public function __construct()
    {
    }
    public function Home()
    {
        $request = new Request();

        echo $request->CallAPI('GET', 'movie/popular');
    }
}


// $request = new Request();

// echo $request->CallAPI('GET', 'movie/popular');
