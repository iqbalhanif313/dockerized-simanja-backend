<?php


namespace App\Http\Controllers;

use App\Services\Auth\UserInfoService;
use App\Models\Jamaah;
use Illuminate\Support\Facades\App;

class BasicController extends Controller
{
    protected $userInfoService;

    public function __construct(){
        $this->userInfoService = new UserInfoService();
    }
    /**
     * Get user information
     *
     * @OA\Get(
     *     path="/api/info",
     *     tags={"info"},
     *     operationId="info",
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized"
     *     ),
     *     security={
     *         {"api_key": {"write:user", "read:user"}}
     *     },
     *   ),
     */
    public function info()
    {
        return $this->userInfoService->buildResponse();
    }
}
