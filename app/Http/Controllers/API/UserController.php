<?php 
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    private $successStatus = 201;
    /**
     * Login a user
     * @param Request $request
     * @return Response
     */
    public function login(Request $request) {
        $rules = ['email' => 'required|string', 'password' => 'required|string'];
        $fields = $request->validate($rules);

        $user = User::where('email', $fields['email'])->first();

        // Check Password
        if (!$user || !Hash::check($fields['password'], $user->password)){
            return response(['errors' => ['failed' => 'Wrong credentials']], 422);
        }

        $token = $user->createToken('myapptoken')->accessToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];
        return response($response, $this->successStatus);
    }
    /**
     * Create a new user
     * @param Request $request
     * @return Response
     */
    public function register(Request $request) {
        $rules = ['name' => 'required|string', 'email' => 'required|email|unique:users,email',
        'password' => 'required|string|confirmed',
        'password_confirmation' => 'required|string'];
        $fields = $request->validate($rules);

        $data = ['name' => $fields['name'], 'email' => $fields['email'], 'password' => bcrypt($fields['password'])];
        $user = User::create($data);

        $token = $user->createToken('myapptoken')->accessToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];
        return response($response, $this->successStatus);
    }
    /**
     * Get user Details
     * @return Response
     */
    public function details() {
        $user = Auth::user();
        return response(['user' => $user], $this->successStatus);
    }
    /**
     * Logout user
     * @return Response
     */
    public function logout() {sleep(3);
        // auth()->user()->tokens()->delete();
        return response(['message' => 'Successfully logged out.'], $this->successStatus);
    }
}
