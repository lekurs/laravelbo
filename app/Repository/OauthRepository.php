<?php


namespace App\Repository;


use App\Http\Entity\Oauth;
use Illuminate\Support\Carbon;

class OauthRepository
{

    private Oauth $oauth;

    /**
     * OauthRepository constructor.
     * @param Oauth $oauth
     */
    public function __construct(Oauth $oauth)
    {
        $this->oauth = $oauth;
    }


    /**
     * @param string $accessToken
     * @return Oauth|null
     */
    public function findByGoogleAccessToken(string $accessToken): ?Oauth
    {
        return $this->oauth->newQuery()->where('access_token', $accessToken)->first();
    }

    public function findByGoogleID(string $googleId): ?Oauth
    {
        return $this->oauth->newQuery()->where('google_id', $googleId)->first();
    }

    public function createOauthUser(array $data)
    {
        $oauth = new Oauth();
        $oauth->google_id = $data['google_id'];
        $oauth->email = $data['email'];
        $oauth->expires_at = Carbon::now()->addSeconds($data['expires_at']);
        $oauth->access_token = $data['access_token'];
        return $oauth;
    }

}
