<?php

require_once 'request.php';


class baseController
{
    public function Home()
    {
        # code...
    }
}


$request = new Request();

echo $request->CallAPI('GET', 'movie/popular');
