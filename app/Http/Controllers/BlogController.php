<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function store() {

        $attributes = request()->validate([
            'title' => 'required|max:200',
            'content' => 'required|min:1|max:255'
        ]);

        auth()
            ->user()
            ->blog()
            ->create($attributes);

        return back()
            ->with('success', 'Saved');

    }
}
