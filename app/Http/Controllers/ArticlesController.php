<?php

namespace App\Http\Controllers;

use App\articles;
use App\users;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = articles::get_all();
        return view('articles', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        articles::insertinto($data);

        return redirect('/artikel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data = articles::get_by_id($id);
        // $user = users::get_by_id($id);
        $data = articles::get_with_user($id);
        return view('articles_detail',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = articles::get_by_id($id);
        $data[0]->tag = implode(',', json_decode($data[0]->tag));

        return view('articles_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        
        $insert = articles::updateinto($data, $id);
        
        return redirect('/artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = articles::deleteinto($id);

        return redirect()->back();
    }
}
