@extends('admin.admin_master')
@section('title')
    Manage Projects
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid pt-5">
            <div class="row">
                <div class="col-sm-10 offset-sm-1">
                    {{-- data table --}}
                    <div class="card card-primary">
                        <div class="card-header">
                            <h2 class="card-title">Projects List</h2>
                        </div>

                        <div class="card-body">
                            <table class="table table-striped table-bordered table-sm" style="width:100%">
                                <thead class="text-center">
                                    <tr>
                                        <th class="text-center">Sl</th>
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Link</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($Projects as $Project)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $Project->title }}</td>
                                            <td>{{ Str::limit($Project->description, 80) }}</td>
                                            <td>
                                                <img src="{{ asset($Project->image) }}" alt="" width="80">
                                            </td>
                                            <td>{{ $Project->link }}</td>
                                            <td width="10%">
                                                <a href="{{ route('admin.edit.projects', $Project->id) }}"
                                                    class="btn btn-sm
                                                    btn-primary"><i
                                                        class="fas fa-edit"></i></a>
                                                <a href="{{ route('admin.delete.projects', $Project->id) }}"
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
