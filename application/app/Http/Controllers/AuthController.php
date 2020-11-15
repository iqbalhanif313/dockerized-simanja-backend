<?php


namespace App\Http\Controllers;

use App\Http\Request\LoginRequest;
use App\Http\Request\RegisterRequest;
use App\Http\Services\Auth\RegisterService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $registerService;

    public function __construct()
    {
        $this->registerService = new RegisterService();
    }

    /**
     * Login to get Jwt Token
     *
     * @OA\Post(
     *     path="/login",
     *     tags={"auth"},
     *     operationId="login",
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
     *    	@OA\RequestBody(
     *    		@OA\MediaType(
     *    			mediaType="application/json",
     *    			@OA\Schema(
     *    				 @OA\Property(property="email",
     *    					type="string",
     *    					example="",
     *    					description=""
     *    				),
     *    				 @OA\Property(property="password",
     *    					type="string",
     *    					example="",
     *    					description=""
     *                  ),
     *    			),
     *    		),
     *    	),
     *   ),
     */
    public function login(LoginRequest $request){
        $token = app('auth')->attempt($request->only('email', 'password'));
        if(!$token){
            return $this->handleBadRequest('wrong login');
        }
        return $this->respondWithToken($token);
    }


    /**
     * Register to create user & get Jwt Token
     *
     * @OA\Post(
     *     path="/register",
     *     tags={"auth"},
     *     operationId="register",
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
     *    	@OA\RequestBody(
     *    		@OA\MediaType(
     *    			mediaType="application/json",
     *    			@OA\Schema(
     *    				 @OA\Property(property="email",
     *    					type="string",
     *    					example="",
     *    					description=""
     *    				),
     *    				 @OA\Property(property="password",
     *    					type="string",
     *    					example="",
     *    					description=""
     *                  ),
     *                  @OA\Property(property="password_confirmation",
     *    					type="string",
     *    					example="",
     *    					description=""
     *                  ),
     *    			),
     *    		),
     *    	),
     *   ),
     */
    public function register(RegisterRequest $request){
        if(!$this->registerService->handleUserRegistration($request)){
            return $this->handleBadRequest("registration Failed");
        }
        $token = app('auth')->attempt($request->only('email', 'password'));
        if(!$token){
            return $this->handleBadRequest('wrong login');
        }
        return $this->respondWithToken($token);
    }

    public function logout()
    {
        app('auth')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}


