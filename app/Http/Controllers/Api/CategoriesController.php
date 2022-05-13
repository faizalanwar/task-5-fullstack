<?php

namespace App\Http\Controllers\Api; 

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiFormatterController as ApiFormatterController;
use App\Models\Categories;
use Validator;

use App\Http\Resources\CategoriesResource as CategoriesResource;


class CategoriesController extends ApiFormatterController
{
    
    public function index()
    {
        $categories = Categories::paginate();
        return $this->berhasil(CategoriesResource::collection($categories), 'Selamat, semua kategori berhasil didapat.');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $cekinput = Validator::make($input, [
            'name' => 'required',
            'user_id' => 'required'
        ]);
   
        if($cekinput->fails()){
            return $this->gagal('Validasi Error.', $cekinput->errors());       
        }
   
        $categories = Categories::create($input);
   
        return $this->berhasil(new CategoriesResource($categories), 'Selamat , Category berhasil ditambah.');
    } 
    public function show($id)
    {
        $categories = Categories::find($id);
        if (is_null($categories)) {
            return $this->gagal('Categoriestidak ditemukan.');
        }
   
        return $this->berhasil(new CategoriesResource($categories), 'Selamat, Category berhasil didapat.');
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $cekinput = Validator::make($input, [
            'name' => 'required',
            'user_id' => 'required',
        ]);
        if ($cekinput->fails()) {
            return $this->gagal('Validasi eror.', $cekinput->errors());
        }
        $Categories = Categories::findorfail($id);
        $Categories->name = $input['name'];
        $Categories->user_id = $input['user_id'];
        $Categories->save();
        return $this->berhasil(new CategoriesResource($CategoriesResource), 'Selamat, Category berhasil diubah.');
    }
    public function destroy($id)
    {
        $Categories = Categories::FindOrFail($id);
        if ($Categories->delete()) {
            return $this->berhasil(new CategoriesResource($Categories), 'Selamat, artikel berhasil dihapus.');
        }
    }
}
