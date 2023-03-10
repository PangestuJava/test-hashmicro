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
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name of Category</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}"
                            placeholder="Name">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    <!--/.col (left) -->
</div>
<!-- /.row -->
@endsection