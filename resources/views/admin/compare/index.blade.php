@extends('layouts.app')

@section('slot')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            @if (Session::has('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <ul>
                    <li>
                        <strong>{{ Session::get('message') }}</strong>
                    </li>
                </ul>
            </div>
            @endif
            <!-- form start -->
            <form action="{{ route('compare.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="input1">Input 1</label>
                        <input type="text" name="input1" class="form-control" id="input1" value="{{ old('input1') }}"
                            placeholder="Input 1" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="input2">Input 2</label>
                        <input type="text" name="input2" class="form-control" id="input2" value="{{ old('input2') }}"
                            placeholder="Input 2">
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