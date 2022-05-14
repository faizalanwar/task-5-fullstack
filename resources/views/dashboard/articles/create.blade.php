@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title ml-1" id="horz-layout-colored-controls">Add Product Data</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
            </div>
            <div class="card-content collpase show">
                <div class="card-body">



                    <form action="{{ route('articles.store') }}" class="form form-horizontal" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-3 mt-3">
                                        <label class="col-md-12 label-control" for="title">Title</label>
                                        <div class="form-group row">
                                        <div class="col-md-9">
                                            <input required type="text" id="title" class="form-control border-primary"
                                                placeholder="title" name="title">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mt-3"><label class="col-md-12 label-control" for="content">Content</label>
                                    <div class="form-group row">
                                        
                                        <div class="col-md-9">
                                            <input required type="text" id="content" class="form-control border-primary"
                                                placeholder="content" name="content">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mt-3">
                                        <label class="col-md-12 label-control" for="image">image</label>
                                        <div class="form-group row">
                                        <div class="col-md-9">
                                            <input type="file" required name="image" id="image" class="form-control border-primary"
                                            placeholder="User image" >
                                        @error('image')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mt-3">
                                        <label class="col-md-12 label-control" for="category_id">Category_id</label>
                                        <div class="form-group row">
                                        <div class="col-md-9">
                                            <select class="select2 form-control block select2-hidden-accessible"
                                            name="category_id" id="category_id" style="width: 100%" tabindex="-1"
                                            aria-hidden="true">
                                            @foreach ($Categories as $data)
                                                <option value="{{ $data->id }}"
                                                    {{ Request()->category_id == $data->id ? 'selected' : '' }}>
                                                    {{ $data->name }}</option>
                                            @endforeach
                                        </select>
                                         
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-actions mt-3">

                            <a type="button" class="btn btn-warning mr-1" href="/dashboard/articles">
                                <i class="ft-x"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-check-square-o"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
