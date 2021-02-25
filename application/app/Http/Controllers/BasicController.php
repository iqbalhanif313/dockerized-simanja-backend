<?php


namespace App\Http\Controllers;

use App\Services\Auth\UserDataService;
use App\Services\Auth\UserInfoService;

class BasicController extends Controller
{
    public function __construct(){

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
    public function info(UserInfoService $service)
    {
        return $service->buildResponse();
    }

    /**
     * Show Ref Users
     *
     * @OA\Get(
     *     path="/api/ref/users",
     *     tags={"references"},
     *     operationId="ref/users",
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
    public function refUsers(UserDataService $service) {
        try {
            $result = $service->getRef();
        } catch (\Exception $exception) {
            return $this->handleErrorRequest($exception->getMessage());
        }
        return $this->data($result);
    }
}
