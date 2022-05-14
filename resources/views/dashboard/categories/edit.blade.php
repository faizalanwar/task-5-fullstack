@extends('layouts.app')


@section('content')
        <div class="card">
            <div class="card-header">
                <h4 class="card-title ml-1" id="horz-layout-colored-controls">Edit Categories Data</h4>
            </div>
            <div class="card-content collpase show"> 
                    <div class="card-body">
    
    
                        <form action="{{ route('categories.update', $Categories->id) }}" class="form form-horizontal" method="POST"  >

                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-3 mt-3">
                                            <label class="col-md-12 label-control" for="name">Name</label>
                                            <div class="form-group row">
                                            <div class="col-md-9">
                                                <input required type="text" id="name" class="form-control border-primary"
                                                    placeholder="name" name="name" value="{{ $Categories->name }} " >
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                            </div>
                            <div class="form-actions mt-3">
    
                                <a type="button" class="btn btn-warning mr-1" href="/dashboard/categories">
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
