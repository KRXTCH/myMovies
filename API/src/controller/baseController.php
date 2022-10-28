<?php

require_once 'request.php';


class baseController
{
    public function __construct()
    {
    }
    public function Home()
    {
        $request = new Request();

        echo $request->CallAPI('GET', 'movie/popular');
    }
    public function Error()
    {
        echo '404';
        http_response_code(404);
        die();
        return 'Route not found';
    }
}


// $request = new Request();

// echo $request->CallAPI('GET', 'movie/popular');
