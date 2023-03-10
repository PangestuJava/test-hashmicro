@extends('layouts.app')

@section('slot')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </strong>
            </div>
            @endif
            <!-- form start -->
            <form action="{{ route('product.update', $product->uuid) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name of Product</label>
                        <input type="text" name="name" class="form-control" id="name"
                            value="{{ old('name', $product->name) }}" placeholder="Name" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category_id" name="category_id" class="form-control">
                            @foreach ($category as $item)
                            <option value="{{ $item->id }}" @if ($item->id == $product->category_id) selected @endif>{{
                                $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="old_stock">Stock</label>
                        <input type="number" name="old_stock" class="form-control" id="old_stock"
                            value="{{ old('old_stock', $product->stock) }}" placeholder="Stock" readonly>
                    </div>
                    <div class="form-group">
                        <label for="stock">Input Stock</label>
                        <input type="number" name="stock" class="form-control" id="stock" placeholder="Stock">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="action" value="add">
                        {{ __('Add') }}</button>
                    <button type="submit" class="btn btn-primary" name="action" value="reduce">
                        {{ __('Reduce Stock') }}</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    <!--/.col (left) -->
</div>
<!-- /.row -->
@endsection