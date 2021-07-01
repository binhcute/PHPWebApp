<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Article;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comment = Comment::paginate(10);
        $product = Product::all();
        $article = Article::all();
        return view('pages.server.commentlist')->with('comment', $comment)->with('article', $article)->with('product', $product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        $article = Article::all();
        return view('pages.server.commentadd')->with('article', $article)->with('product', $product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->id_product = $request->id_product;
        $comment->id_article = $request->id_article;
        $comment->id_user = $request->id_user;
        $comment->detail = $request->detail;
        $comment->role = $request->role;
        $comment->properties = NULL;
        $comment->view = NULL;
        $comment->save();
        return redirect()->route('BinhLuan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::find($id);
        $article = article::all();
        $product = product::all();
        return view('pages.server.commentshow')->with('comment', $comment)->with('article', $article)->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = article::all();
        $product = product::all();
        $comment = comment::find($id);
        return view('pages.server.commentedit')->with('comment', $comment)->with('article', $article)->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = comment::find($id);
        $comment->id_product = $request->id_product;
        $comment->id_article = $request->id_article;
        $comment->detail = $request->detail;
        $comment->role = $request->role;
        $comment->properties = NULL;
        $comment->view = NULL;
        $comment->save();
        return redirect()->route('BinhLuan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->route('BinhLuan.index');
    }

    public function disabled(Request $request, $id)
    {
        $comment = Comment::find($id);
        $comment->status = 0;
        $comment->save();
        return redirect()->route('BinhLuan.index');
    }
    public function enabled(Request $request, $id)
    {
        $comment = Comment::find($id);
        $comment->status = 1 ;
        $comment->save();
        return redirect()->route('BinhLuan.index');
    }
}
