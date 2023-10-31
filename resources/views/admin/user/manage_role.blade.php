@extends('admin.admin_master')
@section('title')
    Manage Role
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid pt-5">
            <div class="row">
                <div class="col-sm-10 offset-sm-1">
                    {{-- data table --}}
                    <div class="card card-primary">
                        <div class="card-header">
                            <h2 class="card-title">Manage Role</h2>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.update.role') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <div class="form-group">
                                    <label>Role</label>
                                    <select name="role" id="" class="form-control">
                                        <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>User</option>
                                        <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Admin</option>
                                        <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>Hr</option>
                                        <option value="3" {{ $user->role == 3 ? 'selected' : '' }}>Employee</option>
                                    </select>
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
