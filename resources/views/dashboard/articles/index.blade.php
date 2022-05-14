@extends('layouts.app')



@section('content')
    <div class="card">
        <div class="card-header">
            <a class="btn btn-success ml-1 " href="/dashboard/articles/create"><span>
                    Add New Data</span></a>
            
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="dt-bootstrap4">
                    <table class="table table-striped table-bordered ">
                        <thead>
                            <tr role="row">
                                <th>Id</th>
                                <th>title</th>
                                <th>content</th>
                                <th>image</th>
                                <th>user_id</th>
                                <th>category_id</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Articles as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->title }}</td>
                                    <td>{{ $row->content }}</td>
                                    <td><img src="{{ asset('/upload/' . $row->image) }}" width='100px'/></td>
                                    <td>{{ $row->user_id }}</td>
                                    <td>{{ $row->category_id }}</td>
                                    <td>
                                        <form action="{{ route('articles.destroy', $row->id) }}" method="POST">
                                            <a class="btn btn-secondary text-white"
                                                href="{{ URL::to('dashboard/articles/' . $row->id) }}">lihat</a>
                                            <a class="btn btn-primary "
                                                href="{{ URL::to('dashboard/articles/' . $row->id . '/edit/') }}">ubah</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger deleteconfirm">hapus</i></button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
        
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection



