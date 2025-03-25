@extends('layouts.admin')
@section('content')
<h1>Add new category</h1>
<!-- /resources/views/post/create.blade.php -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

<!-- Create Post Form -->
<form action="" method="post" enctype="multipart/form-data">
    @csrf
    {{ csrf_field() }}
    <label for="">name</label>
    <input type="text" name="name" placeholder="name" class="form-control" />
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <label for="">Image</label>
    <input type="file" name="image" accept="image/*" placeholder="image" class="form-control" />
    @error('image')
    <p class="alert-danger">{{ $message }}</p>
    @enderror

    <button type="submit" style="width: 200px; margin-top: 20px;" class="btn btn-primary">create</button>
</form>
@endsection