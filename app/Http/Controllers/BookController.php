<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_book = new \App\Models\Book;

        $new_book->title = $request->title;
        $new_book->description = $request->description;
        $new_book->author = $request->author;
        $new_book->publisher = $request->publisher;
        $new_book->price = $request->price;
        $new_book->stock = $request->stock;

        $new_book->status = $request->get('save_action');

        $cover = $request->file('cover');

        if($cover) {
            $cover_path = $cover->store('book-covers', 'public');
            $new_book->cover = $cover_path;
        }

        $new_book->slug = \Str::slug($request->get('title'));

        $new_book->created_by = \Auth::user()->id;

        $new_book->save();

        $new_book->categories()->attach($request->get('categories'));

        return redirect()->route('books.create')->with('status', "Book successfully saved as {$new_book->status}");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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