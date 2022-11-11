<?php

require_once 'user.php';

class Auth
{

    public function login($email, $pwd)
    {
        // get user via email
        // hash le pwd donner
        // verifier que le pwd hash = le pwd du user recup
        // si oui return true sinon false
    }

    public function register($firstname, $lastname, $password, $email)
    {
        // appeler create user comme dans le seeder, puis appeler login this->login
    }
}
