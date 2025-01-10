@extends('dashboard/dashboard2')

@section('title','Products')

@section('title2','Products')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Products</li>
@endsection

@section('content')

<div class="mb-5">
    <a href="{{ route('products.create') }}" class="btn btn-sm btn-outline-primary">Create Product</a>
</div>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category </th>
            <th>Store </th>
            <th>Status</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name ?? 'N/A' }}</td>
            <td>{{ $product->store->name ?? 'N/A' }}</td>
            <td>{{ $product->created_at->format('Y-m-d H:i:s') }}</td>
            <td>{{ $product->status }}</td>
            <td>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-outline-success">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="post" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this category?');">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">No products defined.</td>
        </tr>
        @endforelse
    </tbody>
</table>
{{$products->links()}}

@endsection

@section('sidebar')
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="{{asset('img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">Alexander Pierce</a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item has-treeview menu-open">
        <a href="#" class="nav-link active">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Starter Pages
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="far fa-circle nav-icon"></i>
              <p>Active Page</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Inactive Page</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Simple Link
            <span class="right badge badge-danger">New</span>
          </p>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
@endsection
