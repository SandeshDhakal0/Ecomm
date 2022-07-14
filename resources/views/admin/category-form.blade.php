@extends('layouts.admin')

@section("content")

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
                <h3 class="card-title">Category {{ (isset($detail) ? 'Update' : 'Add') }}</h3>
            </div>
            <div class="card-body">
                //Laravel collective
                @isset($detail)
                    {!! Form::open(['url' => route('category.update', $detail->id), 'files'=>true]) !!}
                    @method('put')
                @else
                    {!! Form::open(['url' => route('category.store'), 'files'=>true]) !!}
                @endisset

                <div class="form-group row mb-3">
                    <label for="" class="col-sm-3">Title: </label>
                    <div class="col-sm-9">
                        {{ Form::text('title',@$detail->title,['class'=>'form-control form-control-sm','required'=>true, 'placeholder'=>'Enter Category Name']) }}
{{-- <input type="text" name="title" required placeholder="Enter Category Name" class="form-control form-control-sm">--}}
                        @error("title")
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>

                    <div class="form-group row mb-3">
                        <label for="" class="col-sm-3">Child of: </label>
                        <div class="col-sm-9">

                            {{ Form::select('parent_id',$parent_cats->pluck('title','id'),@$detail->parent_id,['class'=>'form-control form-control-sm', 'id'=>'parent_id', 'placeholder'=>"---Select Any One---"]) }}
                            @error("parent_id")
                            <span class="text-danger">
                            {{ $message }}
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="" class="col-sm-3">Status: </label>
                        <div class="col-sm-9">
                            {{ Form::select('status',['active'=>'Active','inactive'=>'Inactive'],@$detail->status,['class'=>'form-control form-control-sm', 'id'=>'status']) }}

                            @error("status")
                            <span class="text-danger">
                            {{ $message }}
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="" class="col-sm-3">Image: </label>
                        <div class="col-sm-9">
                            {{ Form::file('image',['accept'=>'image/*']) }}
                            @error("status")
                            <span class="text-danger">
                            {{ $message }}
                        </span>
                            @enderror
                        </div>
                    </div>
                        <div class="form-group row mb-3">
                            <div class="offset-sm-3 col-sm-9">
                                <button class="btn btn-sm btn-danger" type="reset">
                                    <i class="fa fa-trash"></i> Cancel
                                </button>
                                <button class="btn btn-sm btn-success" type="submit">
                                    <i class="fa fa-paper-plane"></i> Submit
                                </button>
                            </div>
                        </div>
                </div>
                </div>
            {{ Form::close() }}
        </div>
    </section>
@endsection
