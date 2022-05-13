<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ApiFormatterController as ApiFormatterController;
use App\Http\Resources\ArticlesResource as ArticlesResource;
use App\Models\Articles;
use Illuminate\Http\Request;
use Validator;

class ArticlesController extends ApiFormatterController
{
    public function index()
    {
        $Articles = Articles::paginate(5);
        return $this->berhasil(ArticlesResource::collection($Articles), 'Selamat, semua artikel berhasil didapat.');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $cekinput = Validator::make($input, [
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
        ]);
        if ($cekinput->fails()) {
            return $this->gagal('Validasi eror.', $cekinput->errors());
        }

        $Articles = Articles::create($input);
        return $this->berhasil(new ArticlesResource($Articles), 'Selamat anda berhasil membuat artikel baru');
    }
    public function show($id)
    {
        $Articles = Articles::find($id);
        if (is_null($Articles)) {
            return $this->gagal('Artikel tidak ditemukan');
        }
        return $this->berhasil(new ArticlesResource($Articles), 'Selamat artikel berhasil didapat');
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $cekinput = Validator::make($input, [
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
        ]);
        if ($cekinput->fails()) {
            return $this->gagal('Validasi eror.', $cekinput->errors());
        }
        $Articles = Articles::findorfail($id);
        $Articles->title = $input['title'];
        $Articles->content = $input['content'];
        $Articles->image = $input['image'];
        $Articles->user_id = $input['user_id'];
        $Articles->category_id = $input['category_id'];
        $Articles->save();
        return $this->berhasil(new ArticlesResource($Articles), 'Selamat, artikel berhasil diubah.');
    }
    public function destroy($id)
    {
        $Articles = Articles::FindOrFail($id);
        if ($Articles->delete()) {
            return $this->berhasil(new ArticlesResource($Articles), 'Selamat, artikel berhasil dihapus.');
        }
    }
}
