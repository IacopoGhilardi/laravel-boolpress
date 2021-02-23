<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\InfoPost;
use App\Tag;
use DateTime;
use Carbon\Carbon;


class PostController extends Controller
{
    private $validator = [
        'title' => 'required|max:30',
        'author' => 'required',
        'text' => 'required',
        'post_status' => 'required',
        'comment_status' => 'required',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validazione parametri del form
        $request->validate($this->validator);

        $data = $request->all();
        //post
        $post = new Post();
        $date = new Carbon();
        $post['publication_date'] = $date::now();
        $post->fill($data);
        $post->save();
        //infopost
        $infoPost = new InfoPost();
        $infoPost['post_id'] = $post->id;
        $infoPost->fill($data);
        $infoPost->save();

        $post->tags()->attach($data["tags"]);

        return redirect()->route('posts.index')->with('post creato correttamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //con le realzione mi porta in automatico gli attributi di comments e info post
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $tags = Tag::all();
        return view('posts.update', compact('post', 'tags'));
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
        //
        $data = $request->all();
        $post->update($data);
        $infoPost = $post->infoPost;
        $infoPost->update($data);

        if (empty($data["tags"])) {
            $post->tags()->detach();
        } else {
            $post->tags()->sync($data["tags"]);
        }

        return redirect()->route('posts.index')->with('status', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
