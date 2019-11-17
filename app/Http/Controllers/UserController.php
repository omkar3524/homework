<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
    {
        notify()->error('Laravel Notify is awesome!');
        // connectify('error', 'No record Found', 'please check your credentials');

        return Redirect::to('toast');
    }

    public function view()
    {
        notify()->success('Laravel Notify is awesome!');
        return view('toast');
    }
}
