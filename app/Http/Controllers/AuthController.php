<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

use App\Models\User;
use App\Models\UserRoll;

class AuthController extends Controller {
    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION DOLOGIN
    ----------------------------------------------------------------------------------------------------------
    */

    public function dologin( Request $request ) {
        try {

            $validator = Validator::make( $request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->route( 'login' )->withErrors( [ $validator->messages()->all() ] );
            }

            $userDetails = array(
                'email' => $request->email,
                'password' => $request->password,
            );

            if ( Auth::attempt( $userDetails ) ) {
                if ( User::where( 'id', Auth::id() )->exists() ) {
                    if ( User::where( 'is_active', 0 )->where( 'id', Auth::id() )->exists() ) {
                        Auth::logout();
                        return redirect()->route( 'login' )->withErrors( [ 'Your no longer available.Please contact system adminstrator.' ] );
                    }
                    if ( UserRoll::where('id', Auth::user()->user_roll )->where( 'is_active', 0 )->exists() ) {
                        Auth::logout();
                        return redirect()->route( 'login' )->withErrors( [ 'Your User Roll no longer available.Please contact system adminstrator.' ] );
                    }
                    $user = User::where( 'id', Auth::id() )->first();
                    return redirect()->route( 'dashboard' );
                }
                Auth::logout();
                return redirect()->route( 'login' )->withErrors( [ 'Your Not Available.' ] );
            }
            Auth::logout();
            return redirect()->route( 'login' )->withErrors( [ 'email or password does not exist.' ] );

        } catch ( \Throwable $th ) {
            return $th->getMessage();
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION DOLOGOUT
    ----------------------------------------------------------------------------------------------------------
    */

    public function dologout() {
        try {

            Auth::logout();
            return redirect()->route( 'login' );

        } catch ( \Throwable $th ) {
            return $th->getMessage();
        }
    }
}
