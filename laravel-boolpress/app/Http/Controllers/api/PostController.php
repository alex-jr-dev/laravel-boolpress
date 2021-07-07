<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {
        //leggere i post esistenti
        //nn vado a chiedere i dati delle categorie 
        $posts = Post::all();

        //leggere i dati delle categorie, utilizzo
        //il with , fa il caricamento immediato 
        // $posts = Post::with("category")->with("tags")->get();

        //andiamo a convertire i dati in json
        return response()->json([
            "success" => false,
            "results" => $posts
        ]);
    }
}