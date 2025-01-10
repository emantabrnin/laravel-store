@extends('dashboard/dashboard2')

@section('title','Product')

@section('title2','Product')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Edit Product</li>
@endsection

@section('content')
<div class="container mt-5">
    <form action="{{ route('products.update',$product->id) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter product name" required value="{{$product->name}}">
            @error('name')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">price</label>
            <input type="text" name="price" class="form-control" placeholder="Enter price " required value="{{$product->price}}">
            @error('name')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        {{-- <div class="form-group">
            <label for="name"> options</label>
            <input type="text" name="options" class="form-control" placeholder="Enter options" required value="{{$product->options}}">
            @error('options')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div> --}}
        <div class="form-group">
            <label for="image">image</label>
            <input type="file" name="image" class="form-control" placeholder="Enter image URL">
            @error('image')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="4" placeholder="Enter product description">{{$product->description}}</textarea>
            @error('description')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Status</label>
            <div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="active" id="active" checked>
                    <label class="form-check-label" for="active">
                        Active
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="archived" id="archived">
                    <label class="form-check-label" for="archived">
                        Archived
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
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
