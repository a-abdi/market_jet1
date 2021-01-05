<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Eloquent\BaseRepository;
use App\Contracts\Repositories\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $user;

    public function __construct(User $user) 
    {
        $this->user = $user;
        parent::__construct($user);
    }
}