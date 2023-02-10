<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function test()
    {
        // 
        
        return Inertia::render('Test');
    }
}
