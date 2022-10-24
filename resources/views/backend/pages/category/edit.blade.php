@extends('backend.layouts.master')

@section('admin_title')
    Create Category
@endsection

@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @include('backend.layouts.partials.message')
                    <div class="card-header">
                        <h3>Add Category Form</h3>
                    </div>
                    <div class="mt-3 justify-content-between">
                        <a href="{{ route('category.index') }}" class=" btn btn-warning"><i
                                class="fas fa-long-arrow-alt-right"> Back Designation List</i></a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.update', $category->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="category_name">Category Name</label>
                                <input type="text" name="category_name" class="form-control" id="category_name"
                                    aria-describedby="category_name" value="{{ $category->category_name }}">

                            </div>
                            <div class="form-group">
                                <label for="category_description">Category Description</label>
                                <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{ $category->description }} </textarea>

                            </div>

                            <div class="form-group">
                                <select name="status" id="status" class="custom-select">
                                    <option value="">Select Status</option>
                                    <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <img src="{{ asset('images/category/' . $category->image) }}"
                                    alt="{{ $category->category_name }}" width="100"> <br>
                                <label for="image">Category Image</label>
                                <input type="file" name="image" class="form-control" id="image"
                                    aria-describedby="image">

                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
