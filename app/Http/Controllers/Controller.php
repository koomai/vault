<?php namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Validation\Factory;
use Illuminate\Encryption\Encrypter;
use Illuminate\Cache\CacheManager;

class Controller extends BaseController
{
    public function index()
    {
        return view('index');
    }

    public function store(Request $request, Factory $validator, Encrypter $crypt, CacheManager $cache)
    {
        $max 		= config('vault.max_size');
        $minutes 	= implode(',', array_keys(config('vault.minutes')));

        $rules = array(
            'text' 		=> "max:{$max}",
            'expire' 	=> "in:{$minutes}",
        );

        $validator = $validator->make($request->all(), $rules);

        // Currently Laravel can't check for required on an empty string (like the honeypot)
        // so we have to do that check ourselves. (Input::has also doesn't work)
        if( ! $validator->fails())
        {
            // We're going to encrypt again as a second line of defence should
            // there be a vulnerability with the JS encryption lib.
            $text = $crypt->encrypt($request->get('text'));

            // Create a key for the text.
            $key = md5($text);

            // Save the text using Laravel's cache.
            $cache->put($key, $text, $request->get('expire'));

            // Return the generated URL
            return response(URL::to("view/{$key}"), 200);
        }

        return responsejson($validator->messages(), 400);
    }

    public function show($key)
    {

    }

}
