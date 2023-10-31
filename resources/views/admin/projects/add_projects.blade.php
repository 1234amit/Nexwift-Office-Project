@extends('admin.admin_master')
@section('title')
    Add Projects
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid pt-5">
            <div class="row">
                <div class="col-sm-10 offset-sm-1">
                    {{-- data table --}}
                    <div class="card card-primary">
                        <div class="card-header">
                            <h2 class="card-title">Add Projects</h2>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.projects.add') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Project Title</label>
                                    <input type="text" name="title" value="{{ old('title') }}" class="form-control"
                                        placeholder="Enter Here Title">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Project Description</label>
                                    <textarea name="description" class="form-control" placeholder="Enter Here Projects Description" rows="5">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Project Link</label>
                                    <input type="text" name="link" value="{{ old('link') }}" class="form-control"
                                        placeholder="Enter Here Projects Link">
                                    @error('link')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Project Image</label>
                                    <input type="file" name="image" class="form-control">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Submit" class="btn btn-primary">

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
