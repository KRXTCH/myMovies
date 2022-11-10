<?php

class Movie {

    private $id_movie;
    private $id_film;

    public function __construct($id_film)
    {
        $this->movie =null;
        $this->id_film = $id_film;
    }

    public function getIdMovie()
    {
        return $this->id_movie;
    }

    public function setIdMovie($id_movie)
    {
        $this->id_movie;
    }

    public function getIdFilm()
    {
        return $this->id_film;
    }

    public function setIdFilm($id_film)
    {
        $this->id_film = $id_film;
    }
}