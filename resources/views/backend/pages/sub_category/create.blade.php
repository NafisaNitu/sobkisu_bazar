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
                        <h3>Add Sub Category Form</h3>
                    </div>
                    <div class="mt-3 justify-content-between">
                        <a href="{{ route('sub_category.index') }}" class=" btn btn-warning"><i
                                class="fas fa-long-arrow-alt-right"> Back Designation List</i></a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('sub_category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="subcat_name">Sub Category Name</label>
                                <input type="text" name="subcat_name" class="form-control" id="subcat_name"
                                    aria-describedby="subcat_name">
                                
                            </div>
                            <div class="form-group">
                                <label for="sub_category_description">Sub Category Description</label>
                                    <textarea name="description" id="sub_category_description" class="form-control" cols="30" rows="10"></textarea>
                                
                            </div>
                            <div class="form-group">
                                <label for="image">Sub Category Image</label>
                                <input type="file" name="image" class="form-control" id="image"
                                    aria-describedby="image">
                                
                            </div>
                            <div class="form-group">
                                <select name="status" id="status" class="custom-select">
                                 <option value="">Select Status</option>    
                                 <option value="1">Active</option>    
                                 <option value="0">Inactive</option>    
                             </select> 
                            </div>
                            <div class="form-group">
                               <select name="cat_id" id="cat_id" class="custom-select">
                                <option value="">Select Category</option>    
                               @foreach ($categories as $category)
                                   <option value="{{$category->id}} ">{{ $category->category_name }}</option>
                               @endforeach  
                            </select> 
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
