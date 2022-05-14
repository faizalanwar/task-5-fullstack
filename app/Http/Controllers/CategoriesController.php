<?php

namespace App\Http\Controllers;

use App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class CategoriesController extends Controller
{
    public function index()
    {
        $Categories = Categories::get();
        return view('dashboard.categories.index', compact('Categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Categories = Categories::get();

        return view('dashboard.categories.create', compact('Categories'));
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
            'name' => 'required',
            'user_id' => 'required',
        ]);
      
        $categories = new Categories();
        $categories->name = $input['name'];
        $categories->user_id = Auth::user()->id;
        $categories->save();


        return redirect('/dashboard/categories');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $Categories = Categories::findorfail($id);
       
        return view('dashboard.categories.view', compact('Categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Categories = Categories::findorfail($id);

        return view('dashboard.categories.edit', compact('Categories'));
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
        $input = $request->all();
        $cekinput = Validator::make($input, [
            'name' => 'required',
            'user_id' => 'required',
        ]);
         $Categories = Categories::findorfail($id);
         $Categories->name = $input['name'];
        $Categories->user_id = Auth::user()->id;
        $Categories->save();

        
        return redirect('/dashboard/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Categories = Categories::where('id', $id)->get();

        $Categories->each->delete();
        return redirect('/dashboard/categories');
    }








}
