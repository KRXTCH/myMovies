<?php

require_once 'request.php';


class moviesController
{
    public function __construct()
    {
    }
    public function Popular()
    {
        $request = new Request();

        echo $request->CallAPI('GET', 'movie/popular');
    }
    public function Detail($id)
    {
        $request = new Request();

        echo $request->CallAPI('GET', 'movie/' . $id);
    }
    public function Search($text)
    {
        $request = new Request();
        echo $request->CallAPI('GET', 'search/movie', false, $text);
    }
}


// $request = new Request();

// echo $request->CallAPI('GET', 'movie/popular');
