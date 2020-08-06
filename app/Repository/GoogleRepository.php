<?php


namespace App\Repository;


use App\Http\Entity\Oauth;
use App\User;
use Carbon\Carbon;

/**
 * Class DiscordRepository
 * @package App\Repositories
 */
class GoogleRepository
{
    /** @var OauthRepository $oauthRepository */
    private OauthRepository $oauthRepository;

    /**
     * DiscordRepository constructor.
     * @param OauthRepository $oauthRepository
     */
    public function __construct(OauthRepository $oauthRepository)
    {
        $this->oauthRepository = $oauthRepository;
    }

    /**
     * @param array $data
     * @return Oauth
     */
    public function createUser(array $data): Oauth
    {
        $user = $this->oauthRepository->findByGoogleId($data['google_id']) ?? new Oauth();
        $user->google_id = $data['google_id'];
        $user->email = $data['email'];
        $user->expires_at = Carbon::now()->addSeconds($data['expires_at']);
        $user->access_token = $data['access_token'];
        return $user;
    }
}
