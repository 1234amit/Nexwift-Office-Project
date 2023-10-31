@extends('admin.admin_master')
@section('title')
    Manage User
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid pt-5">
            <div class="row">
                <div class="col-sm-10 offset-sm-1">
                    {{-- data table --}}
                    <div class="card card-primary">
                        <div class="card-header">
                            <h2 class="card-title">User List</h2>
                        </div>

                        <div class="card-body">
                            <table class="table table-striped table-bordered table-sm" style="width:100%">
                                <thead class="text-center">
                                    <tr>
                                        <th class="text-center">Sl</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Role</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $user)
                                        <tr class="text-center">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if ($user->role == '0')
                                                    User
                                                @endif

                                                @if ($user->role == '1')
                                                    Admin
                                                @endif

                                                @if ($user->role == '2')
                                                    Hr
                                                @endif

                                                @if ($user->role == '3')
                                                    Employee
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-primary"
                                                    href="{{ route('admin.manage.role', $user->id) }}">Manage Roles</a>
                                                <a href="{{ route('admin.delete.user', $user->id) }}"
                                                    class="btn btn-sm btn-danger" onclick="confirmation(event)"><i
                                                        class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- data table end --}}
                </div>
            </div>
        </div>
    </div>
@endsection
