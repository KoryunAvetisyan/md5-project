<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use ReCaptcha\ReCaptcha;

class RecaptchaController extends Controller
{
    public function checkCaptcha(Request $request)
    {
        $client = new Client();
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => env('RECAPTCHA_SECRET_KEY'),
                'response' => $request->input('response'),
            ]
        ]);
        $result = json_decode($response->getBody()->getContents());
        if (!$result->success) {
            return response()->json(['success' => true]);
        }
    }
}
