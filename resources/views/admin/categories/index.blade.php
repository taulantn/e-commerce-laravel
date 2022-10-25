@extends('layouts.admin')

@section('content') 
        <div class="card">
            <div class="card-header">
                <h3>
                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary float-right">
                    Create
                </a>    
                Category List</h3>
                
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered">
                         <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Image</th>
                                <th>Parent</th>
                                <th>Action</th>
                            </tr>
                         </thead>
                         <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->image }}</td>
                                    <td>{{ $category->parent->name ?? 'Null'}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-info">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post" >
                                            @csrf
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                         </tbody>
                    </table>
                </div>

            </div>
        </div>
@endsection