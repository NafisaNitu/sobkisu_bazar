@extends('backend.layouts.master')

@section('admin_title')
    Category Page
@endsection

@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-2">
                    @include('backend.layouts.partials.message')
                    <div class="card-header">
                        <h3>Category list</h3>
                    </div>
                    <div class="mt-3 justify-content-between">
                        <a href="{{ route('category.create') }}" class="float-right btn btn-info"><i
                                class="fas fa-plus-circle"> Add category</i></a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Category Description</th>
                                    <th scope="col">Category Image</th>
                                    <th scope="col">Category Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ $category->category_name }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td>
                                            <img src="{{ asset('images/category/' . $category->image) }}"
                                                alt="{{ $category->category_name }} " width="82px">
                                        </td>

                                        @if ($category->status == 1)
                                            <td>Active</td>
                                        @else
                                            <td>Inactive</td>
                                        @endif

                                        <td>
                                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-success"><i
                                                    class="far fa-edit"> Edit</i></a>

                                            <a href="#delteModal{{ $category->id }}" data-toggle="modal"
                                                class="btn btn-danger"><i class="far fa-trash-alt"> Delete</i></a>


                                            <!--Delete  Modal -->
                                            <div class="modal fade" id="delteModal{{ $category->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure
                                                                to delete this?</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('category.destroy', $category->id) }}"
                                                                method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger">Permanent
                                                                    Delete</button>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
