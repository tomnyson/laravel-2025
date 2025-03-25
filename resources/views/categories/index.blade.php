@extends('layouts.admin')
@section('content')
    <h1>List category</h1>
    @if(Session::has('message'))
    <p class="alert alert-info">{{ Session::get('message') }}</p>
    @endif
    <a class="btn btn-info btn-create" href="{{ route('category.create') }}">create</a>
    <table class="table table-striped custom-table">
      <thead>
        <tr>
          <th>name</th>
          <th>images</th>
          <th>action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $categories as $category )
        <tr>
          <td>{{ $category->name }}</td>
          <td><img src="/images/{{ $category->image }}" width="100x" /></td>
          <td style="display: flex; justify-content: center;">
          <a href="{{ route('category.edit', $category->id)  }}" data-id="{{ $category->id }}" class="btn btn-info mr2">edit</a>
            <a href="{{ route('category.delete', $category->id)  }}" data-id="{{ $category->id }}" class="btn btn-danger btn-delete ">delete</a>
          </td>
         
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="d-flex justify-content-center">
      <div>

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