<?php

namespace App\Http\Controllers;

use App\Http\Controllers;

use App\Models\Articles;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class ArticlesController extends Controller
{
    public function index()
    {
        $Articles = Articles::get();

        $Categories = Categories::get();
        return view('dashboard.articles.index', compact('Categories', 'Articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Categories = Categories::get();

        return view('dashboard.articles.create', compact('Categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->all();
        $cekinput = Validator::make($input, [
            'title' => 'required',
            'content' => 'required',
            'image' => 'sometimes|image|mimes:jpg,png,jpeg,gif,svg|max:2048',  
            'user_id' => 'required',
            'category_id' => 'required',
        ]);
        $file = $request->file('image');
        $imagename = time() . '-' . $file->getClientOriginalName();
        $file->move(public_path() . '/upload/', $imagename);
        $Articles = new Articles();
        $Articles->title = $input['title'];
        $Articles->content = $input['content'];
        $Articles->image = $imagename;
        $Articles->user_id = Auth::user()->id;
        $Articles->category_id = $input['category_id'];
        $Articles->save();


        return redirect('/dashboard/articles');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $Articles = Articles::findorfail($id);
       
        return view('dashboard.articles.view', compact('Articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Articles = Articles::findorfail($id);
        $Categories = Categories::get();

        return view('dashboard.articles.edit', compact('Articles','Categories'));
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
         $Articles = Articles::findorfail($id);
        $input = $request->all();
        $cekinput = Validator::make($input, [
            'title' => 'required',
            'content' => 'required',
            'image' => 'sometimes|image|mimes:jpg,png,jpeg,gif,svg|max:2048',  
            'user_id' => 'required',
            'category_id' => 'required',
        ]);
        $file = $request->file('image');
        $imagename = time() . '-' . $file->getClientOriginalName();
        $file->move(public_path() . '/upload/', $imagename);
        $Articles = Articles::findorfail($id);
        $Articles->title = $input['title'];
        $Articles->content = $input['content'];
        $Articles->image = $imagename;
        $Articles->user_id = Auth::user()->id;
        $Articles->category_id = $input['category_id'];
        $Articles->save();

        
        return redirect('/dashboard/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Articles = Articles::where('id', $id)->get();

        $Articles->each->delete();
        return redirect('/dashboard/articles');
    }








}
