@extends('layouts.admin')

@section('content') 
        <div class="card">
            <div class="card-header">
                <h3>Create Category
                <a href="{{ route('admin.categories.index') }}" class="btn btn-primary float-right">
                    Go Back
                </a>    
                </h3>
                
            </div>
            <div class="card-body">
                <form action="{{ route('admin.categories.store') }}" method="post">
                    @csrf 
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="parent">Parent</label>
                        <select name="category_id" class="form-control" >
                            <option value="">Null</option>
                            @foreach($categories as $id => $category)
                                <option value="{{ $id }}">{{ $category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
@endsection