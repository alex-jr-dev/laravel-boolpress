<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Admin\Session;
use App\Tag;
// use Illuminate\Contracts\Session\Session as SessionSession;
// use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'posts' => Post::all()
        ];

        return view("admin.posts.index", $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', ["categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //creare un nuovo post 
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|max:255",
            "content" => "required",
            'category_id' => 'nullable|exists:categories,id'
        ]);

        // dump($request->user());

        // return;



        $form_data = $request->all();

        $new_post = new Post();
        $new_post->fill($form_data);

        //per sicurezza hacker 
        $new_post->user_id = $request->user()->id;


        //per generare lo slug :url 
        $slug = Str::slug($new_post->title);
        $slug_base = $slug;


        //verifico che lo slug non esista gia nel database 
        $post_presente = Post::where('slug', $slug)->first();
        $contatore = 1;

        //fin quando questa variabile ha una valore 
        while ($post_presente) {
            $slug = $slug_base . "-" . $contatore;
            $contatore++;
            $post_presente = Post::where('slug', $slug)->first();
        }
        //esco dal while, se lo slug nn lo trova nel db 


        //assegno lo slug al post 
        $new_post->slug = $slug;
        $new_post->save();
        return redirect()->route('admin.posts.index');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $user = $post->user();
        // funziona ugualmente:  $user = $post->user;

        return view('admin.posts.show', ['post' => $post, "user" => $user]);
        // return view('posts.show', compact('post'));
        // return view('posts.show', [
        //     'post' => $post
        // ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        $data = [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags
        ];
        return view('admin.posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            "title" => "required|max:255",
            "content" => "required",
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'exists:tags,id'

        ]);

        $form_data = $request->all();

        // verifico se il titolo ricevuto dal form è diverso dal vecchio titolo
        if ($form_data['title'] != $post->title) {
            // è stato modificato il titolo => devo modificare anche lo slug
            // genero lo slug
            $slug = Str::slug($form_data['title']);
            $slug_base = $slug;
            // verifico che lo slug non esista nel database
            $post_presente = Post::where('slug', $slug)->first();
            $contatore = 1;
            // entro nel ciclo while se ho trovato un post con lo stesso $slug
            while ($post_presente) {
                // genero un nuovo slug aggiungendo il contatore alla fine
                $slug = $slug_base . '-' . $contatore;
                $contatore++;
                $post_presente = Post::where('slug', $slug)->first();
            }
            // quando esco dal while sono sicuro che lo slug non esiste nel db
            // assegno lo slug al post
            $form_data['slug'] = $slug;
        }



        if (!key_exists("tags", $form_data)) {
            $form_data["tags"] = [];
        }
        //elimina tutte le relazioni esistenti
        // $post->tags()->detach();

        // $post->tags()->attach($form_data["tags"]);

        $post->tags()->sync($form_data["tags"]);

        $post->update($form_data);
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $post->delete();
        // return redirect()->route('admin.posts.index');

        $post = Post::findOrFail($id);
        //nel momento in cui cancello un post da 'dettagli post'
        $post->tags()->detach();

        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
