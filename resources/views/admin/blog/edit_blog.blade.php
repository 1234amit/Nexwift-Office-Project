@extends('admin.admin_master')
@section('title')
    Edit Blog
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid pt-5">
            <div class="row">
                <div class="col-sm-10 offset-sm-1">
                    {{-- data table --}}
                    <div class="card card-primary">
                        <div class="card-header">
                            <h2 class="card-title">Edit Blog</h2>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.blog.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Blog Title</label>
                                    <input type="text" name="title" value="{{ $Blog->title }}" class="form-control"
                                        placeholder="Enter Here Title">
                                    <input type="hidden" name="id" value="{{ $Blog->id }}" class="form-control">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Blog Description</label>
                                    <textarea name="description" class="form-control" placeholder="Enter Here Title" rows="5">{{ $Blog->description }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Blog Image</label>
                                    <input type="file" name="image" class="form-control">
                                    <img src="{{ asset($Blog->image) }}" alt="" width="80">
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Update" class="btn btn-primary">

                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- data table end --}}
                </div>
            </div>
        </div>
    </div>
@endsection
