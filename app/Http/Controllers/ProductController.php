<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class ProductController extends Controller
{
    public function quote($id)
    {
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
    }
}
