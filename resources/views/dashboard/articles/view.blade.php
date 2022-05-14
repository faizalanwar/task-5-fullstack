@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title ml-1" id="horz-layout-colored-controls">View Articles ID : {{ $Articles->id }}</h4>
            </div>
            <div class="card-content collpase show">
                <div class="card-body">
                    <div class="form-body">
                        <table class="table table-striped table-bordered">

                            <tr>
                                <td><b>Title:</b></td>
                                <td>{{ $Articles->title }}</td>
                            </tr>
                            <tr>
                                <td><b>Content:</b></td>
                                <td>{{ $Articles->content }}</td>
                            </tr>
                            <tr>
                                <td><b>Image:</b></td>
                                <td><img src="{{ asset('/upload/' . $Articles->image) }}" width='100px'/></td>
                            </tr>
                            <tr>
                                <td><b>User_id:</b></td>
                                <td>{{ $Articles->user_id }}</td>
                            </tr>
                            <tr>
                                <td><b>Category_id:</b></td>
                                <td>{{ $Articles->category_id }}</td>
                            </tr>

                        </table>
                        <a class="btn btn-secondary ml-1 " href="/dashboard/articles"><i class=" ft-chevron-left"></i> Back
                        </a>

                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
