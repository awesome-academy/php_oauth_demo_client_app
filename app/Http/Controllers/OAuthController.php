<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class OAuthController extends Controller
{
    /**
     * Redirect to authorize page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirect(Request $request)
    {
        $request->session()->put('state', $state = Str::random(40));

        $query = http_build_query([
            'client_id' => config('oauth.client_id'),
            'redirect_uri' => config('oauth.redirect'),
            'response_type' => 'code',
            'scope' => '',
            'state' => $state,
        ]);

        return redirect(config('oauth.oauth_url') . '/oauth/authorize?' . $query);
    }

    /**
     * Callback function
     *
     * @return \Illuminate\Http\Response
     */
    public function callback(Request $request)
    {
        $state = $request->session()->pull('state');

        throw_unless(
            strlen($state) > 0 && $state === $request->state,
            InvalidArgumentException::class
        );

        $response = Http::asForm()->post(url(config('oauth.oauth_url') . '/oauth/token'), [
            'grant_type' => 'authorization_code',
            'client_id' => config('oauth.client_id'),
            'client_secret' => config('oauth.client_secret'),
            'redirect_uri' => config('oauth.redirect'),
            'code' => $request->code,
        ]);

        $request->session()->put('access_token', json_decode($response)->access_token);

        return $response->json();
    }
}
