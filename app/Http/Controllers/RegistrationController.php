<?php

namespace App\Http\Controllers;

use App\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    public function getData(Request $request)
    {
        $email = Registration::where('email', $request->email)->first();

        if ($email) {
            return response()->json([
                'token' => $email->token,
            ]);

        } else {

            $reg = new Registration();
            $reg->token = Str::random(40);
            $reg->email = $request->email;
            if (isset($request->data)) {
                $reg->data = $request->data;
            }
            $reg->save();

            return response()->json([
                'token' => $reg->token,
            ]);

        }
    }
}
