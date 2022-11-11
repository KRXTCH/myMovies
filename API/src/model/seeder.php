<?php

require_once 'user.php';
require_once 'playlist.php';

class Seeder
{

    public function seedUser()
    {
        $user = new User(
            'Martin',
            'Terrassa',
            'mt@gmail.com',
            'caca',
        );

        $user->createUser();
    }
    public function seedPlaylist()
    {
        $playlist = new Playlist(
            'Toto',
            'https://images.unsplash.com/photo-1518676590629-3dcbd9c5a5c9?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8ZmlsbXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60',
            1,
            1
        );

        $playlist->createPlaylist();
    }
}
