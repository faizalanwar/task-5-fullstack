@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title ml-1" id="horz-layout-colored-controls">View Categories ID : {{ $Categories->id }}</h4>
            </div>
            <div class="card-content collpase show">
                <div class="card-body">
                    <div class="form-body">
                        <table class="table table-striped table-bordered">

                            <tr>
                                <td><b>name:</b></td>
                                <td>{{ $Categories->name }}</td>
                            </tr>
                            <tr>
                                <td><b>User_id:</b></td>
                                <td>{{ $Categories->user_id }}</td>
                            </tr>

                        </table>
                        <a class="btn btn-secondary ml-1 " href="/dashboard/categories"><i class=" ft-chevron-left"></i> Back
                        </a>

                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
