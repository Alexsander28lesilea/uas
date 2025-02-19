<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Facades\Session;

class CaptchaController extends Controller
{
    public function generateCaptcha()
    {
        $builder = new CaptchaBuilder();
        $builder->build();
        
        Session::put('captcha', $builder->getPhrase());

        return response($builder->output())->header('Content-type', 'image/jpeg');
    }
}
