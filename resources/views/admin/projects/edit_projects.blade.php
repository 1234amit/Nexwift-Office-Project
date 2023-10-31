@extends('admin.admin_master')
@section('title')
    Edit Projects
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid pt-5">
            <div class="row">
                <div class="col-sm-10 offset-sm-1">
                    {{-- data table --}}
                    <div class="card card-primary">
                        <div class="card-header">
                            <h2 class="card-title">Edit Projects</h2>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.projects.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Projects Title</label>
                                    <input type="text" name="title" value="{{ $Projects->title }}" class="form-control"
                                        placeholder="Enter Here Title">
                                    <input type="hidden" name="id" value="{{ $Projects->id }}" class="form-control">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Projects Description</label>
                                    <textarea name="description" class="form-control" placeholder="Enter Here Title" rows="5">{{ $Projects->description }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Projects Link</label>
                                    <input type="text" name="link" value="{{ $Projects->link }}" class="form-control"
                                        placeholder="Enter Here Projects Link">
                                    @error('link')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Projects Image</label>
                                    <input type="file" name="image" class="form-control">
                                    <img src="{{ asset($Projects->image) }}" alt="" width="80">
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
