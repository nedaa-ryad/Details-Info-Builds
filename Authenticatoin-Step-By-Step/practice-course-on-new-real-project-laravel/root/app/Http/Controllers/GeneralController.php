<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


// The (Request $request) parameter in the function >> allows us to access the request object that contains data sent with the HTTP request. 'GET' in web.php

class GeneralController extends Controller
{
    public function welcome(Request $request)
    {
        // return $request;
             // returns the request object [] which means is empty because we didn't send any data with the request

        return view('welcome');
    }


    // All of them returns the data that sent of the form -- this function it's about a post request
    public function login(Request $request)
    {

        // return $request; // this request his send all data that the user sent by request that into test template

        // return $request->all();

        // $email = $request->input('email');
        // $password = $request->input('password');
        // dd($email, $password);

        // return response()->json($request->all()); // to return all data as json format

        //Check up on the data sent by the user
        $user = User::where('email', $request->input('email'))->first();

        if(!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        if(! Hash::check($request->input('password'), $user->password)) {
            return response()->json(['message' => 'Password is incorrect'], 401);
        }

        // return response()->json(['message' => 'Login successful'], 200);

        // this token for the user to use it to access the other routes that need authentication and authorization for like articles create
        // (plainTextToken) to not get any error in the response when sending the token
        // this token is used to authenticate the user in the next requests and will adding to the user in the database and also will sending to personal_access_tokens table

        // if we use the $user->createToken('auth_token') >> we'll an error like {{Call to undefined method App\Models\User::createToken() }} and to solve >>
            // will use the Auth facade to create the token
        $token = $user->createToken('auth_token'); // this name 'auth_token' will create into Personal___ table

        return response()->json(['token' => $token->plainTextToken], 200);

    }

    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return $user;
    }
}



