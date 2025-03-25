  @extends('layouts.admin')
@section('content')
    <h1>List products</h1>
    @if(Session::has('message'))
    <p class="alert alert-info">{{ Session::get('message') }}</p>
    @endif
    <a class="btn btn-info btn-create" href="{{ route('products.create') }}">create</a>
    <table class="table table-striped custom-table">
      <thead>
        <tr>
          <th>title</th>
          <th>price</th>
          <th>images</th>
          <th>stock</th>
          <th>category name</th>
          <th>action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $products as $product )
        <tr>
          <td>{{ $product->title }}</td>
          <td>{{ $product->price }}</td>
          <td><img src="/images/{{ $product->image }}" width="100x" /></td>
          <td>{{ $product->stock }}</td>
          <td>{{ $product->category_name }}</td>
          <td style="display: flex; justify-content: center;">
          <a href="{{ route('products.edit', $product->id)  }}" data-id="{{ $product->id }}" class="btn btn-info mr2">edit</a>
            <a href="{{ route('products.delete', $product->id)  }}" data-id="{{ $product->id }}" class="btn btn-danger btn-delete ">delete</a>
          </td>
         
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="d-flex justify-content-center">
      <div>
        {{ $products->links() }}
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
      document.querySelectorAll('.btn-delete').forEach(function (btn) {
        btn.addEventListener('click', function (e) {
          const id = e.target.getAttribute('data-id');
          if (!confirm(`Are you sure delete product id = ${id}?`)) {
            e.preventDefault();
          }
        });
      });
    </script>
@endsection