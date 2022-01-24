<?php

namespace App\Http\Controllers\Api;

use App\Repository\Contracts\AuthInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ApiResponseTrait;

    /**
     * @var AuthInterface
     */
    private $authInterface;

    /**
     * @param AuthInterface $authInterface
     */
    public function __construct(AuthInterface $authInterface)
    {
        $this->authInterface = $authInterface;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string'
        ]);

        if($validator->fails()){
            return $this->apiResponseValidation($validator);
        }
        /**
         *  you can use this also
         * (!Auth::attempt($request->only('email', 'password')))
         */
        $user = $this->authInterface->getUserByEmail($request->post('email'));

        if ($user) {
            if (!Hash::check($request->post('password'), $user->password)) {
                $message = 'Wrong password';
                return $this->apiResponse($message, null,403, 'not authorized');
            }

            $token = $user->createToken('token')->plainTextToken;

            return $this->apiResponse('successfully', $user, 200, null, $token);
        }
        return $this->apiResponse('not found user', null,403,  'not found user');
    }

    /**
     *  method for user logout and delete token
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        auth()->user()->tokens()->delete();

        return $this->apiResponse('successfully', null, 204);
    }
}
