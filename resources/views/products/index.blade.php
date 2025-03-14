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
  </style>

</head>

<body>

  <div class="container">
    <h1>List products</h1>
    @if(Session::has('message'))
    <p class="alert alert-info">{{ Session::get('message') }}</p>
    @endif
    <a class="btn-info btn-create" href="{{ route('products.create') }}">create</a>
    <table class="table custom-table">
      <thead>
        <tr>
          <th>title</th>
          <th>price</th>
          <th>images</th>
          <th>stock</th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $products as $product )
        <tr>
          <td>{{ $product->title }}</td>
          <td>{{ $product->price }}</td>
          <td><img src="images/{{ $product->image }}" width="200px" /></td>
          <td>{{ $product->stock }}</td>

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</body>

</html>