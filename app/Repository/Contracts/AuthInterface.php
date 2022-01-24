<?php

namespace App\Repository\Contracts;

interface AuthInterface
{
    /**
     * @param $email
     * @return mixed
     */
    public function getUserByEmail($email);

}
