@extends('admin.admin_master')
@section('title')
    Add Employees
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid pt-5">
            <div class="row">
                <div class="col-sm-10 offset-sm-1">
                    {{-- data table --}}
                    <div class="card card-primary">
                        <div class="card-header">
                            <h2 class="card-title">Add Employees</h2>
                        </div>

                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Employee Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                        placeholder="Enter Employee Name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Employee Designation</label>
                                    <input name="designation" class="form-control" value="{{ old('description') }}"
                                        placeholder="Enter Employee Designation">
                                    @error('designation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Facebook Link</label>
                                    <input type="text" name="facebookl" value="{{ old('facebookl') }}"
                                        class="form-control" placeholder="Enter Here Facebook Link">
                                    @error('facebookl')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Instagram Link</label>
                                    <input type="text" name="instagraml" value="{{ old('instagraml') }}"
                                        class="form-control" placeholder="Enter Here Instagram Link">
                                    @error('instagraml')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Linkedin Link</label>
                                    <input type="text" name="linkedinl" value="{{ old('linkedinl') }}"
                                        class="form-control" placeholder="Enter Here Linkdin Link">
                                    @error('linkedinl')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Twitter Link</label>
                                    <input type="text" name="twitterl" value="{{ old('twitterl') }}"
                                        class="form-control" placeholder="Enter Here Twitter Link">
                                    @error('twitterl')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Employee Image</label>
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
