<?php

namespace App\Repository;

use App\User;
use Carbon\Carbon;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository
{

    /** @var User $user */
    private User $user;

    /**
     * UserRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param string $accessToken
     * @return User|null
     */
    public function findByGoogleAccessToken(string $accessToken): ?User
    {
        return $this->user->newQuery()->where('access_token', $accessToken)->first();
    }

    public function findByGoogleID(string $googleId): ?User
    {
        return $this->user->newQuery()->where('google_id', $googleId)->first();
    }

    public function addRefreshToken(string $refreshToken)
    {
        return $this->user->update([
            'refresh_token' => $refreshToken
        ]);
    }

}
