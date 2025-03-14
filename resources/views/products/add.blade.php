<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .btn-create {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .custom-table {
            margin-top: 20px;
        }

        .form-control {
            margin-bottom: 10px;
        }
    </style>

</head>

<body>

    <div class="container">
        <h1>add new products</h1>
        <!-- /resources/views/post/create.blade.php -->
        <!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif -->

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
            @error('price')
            <p class="alert-danger">{{ $message }}</p>
            @enderror
            <label for="">Image</label>
            <input type="file" name="image" accept="image/*" placeholder="image" class="form-control" />
            @error('image')
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
    </div>

</body>

</html>