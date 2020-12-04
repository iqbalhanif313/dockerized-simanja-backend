<?php


namespace App\Http\Controllers;

use App\Models\Jamaah;
use Illuminate\Support\Facades\App;

class BasicController extends Controller
{
    /**
     * Get user information
     *
     * @OA\Get(
     *     path="/info",
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
        return response()->json(app('auth')->user());
    }
}
