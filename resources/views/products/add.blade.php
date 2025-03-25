@extends('layouts.admin')
@section('content')
<div>
    <h1>Add new products</h1>
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
        <!-- {{ csrf_field() }} -->
        <label for="">Tile</label>
        <input type="text" name="title" placeholder="title" class="form-control" />
        @error('title')
        <p class="alert-danger">{{ $message }}</p>
        @enderror
        <label for="">Price</label>
        <input type="text " name="price" placeholder="price" class="form-control" />
        <label>Category</label>
        <select class="form-select" id="sel1" name="category_id">
            <option value="">Select category</option>
            @foreach ( $categories as $category )
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('price')
        <p class="alert-danger">{{ $message }}</p>
        @enderror
        <label for="">Image</label>
        <input type="file" name="image" accept="image/*" placeholder="image" class="form-control" />
        @error('image')
        <p class="alert-danger">{{ $message }}</p>
        @enderror
        <label for="">Sub Images</label>
        <input type="file" name="images[]" multiple accept="image/*" placeholder="images" class="form-control" />
        @error('images')
        <p class="alert-danger">{{ $message }}</p>
        @enderror
        <label for="">Stock</label>
        <input type="text" name="stock" placeholder="stock" class="form-control" />
        @error('stock')
        <p class="alert-danger">{{ $message }}</p>
        @enderror
        <label for="">Description</label>
        <textarea cols="4" rows="4" name="description" placeholder="description" class="form-control"></textarea>
        @error('description')
        <p class="alert-danger">{{ $message }}</p>
        @enderror
        <label for="">status</label>
        <select name="status" class="form-control">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
        <button type="submit" style="width: 200px; margin-top: 20px;" class="btn btn-primary">create</button>
    </form>
@endsection