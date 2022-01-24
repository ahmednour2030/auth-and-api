<?php

namespace App\Repository\Eloquent;

use App\Repository\Contracts\AuthInterface;
use App\Models\User;

class AuthRepository implements AuthInterface
{
    /**
     * @var User
     */
    protected $userModel;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->userModel  = $user;
    }

    /**
     * @param $email
     * @return mixed
     */
    public function getUserByEmail($email)
    {
        return $this->userModel->whereEmail($email)->first();
    }
}
