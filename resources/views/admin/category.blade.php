@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Category Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                        <li class="breadcrumb-item active">Category Page</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Category List</h3>
            </div>
            <div class="card-body">
                <table class="table table-sm table-bordered table-hover">
                    <thead class="thead-dark">
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($category as $key => $row)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $row['name'] }}</td>
                            <td>{{ $row['status'] }}</td>
                            <td>
                                <a href="" class="btn btn-sm btn-success img-circle">
                                    <i class="fa fa-pen"></i>
                                </a>
                                <a href="" class="btn btn-sm btn-danger img-circle">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
