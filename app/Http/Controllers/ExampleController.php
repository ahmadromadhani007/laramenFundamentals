<?php

namespace App\Http\Controllers;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('age', ['except' => ['getUser']]);
    }

    public function generateKey()
    {
        return str_random(32);
    }

    public function fouExample()
    {
        return 'Example controller from POST request';
    }

    public function getUser($id)
    {
        return 'User id = ' . $id;
    }

    public function getPost($cat1, $cat2)
    {
        return 'Category 1 = ' . $cat1 . 'Category 2 = ' . $cat2;
    }

    public function getProfile()
    {
        echo '<a href="' . route('profile.action') . '">Profile Action</a>';
    }

    public function getProfileAction()
    {
        return 'Route Profile : ' . route('profile');
    }

    //
}
