@extends('layouts.app')

@section('slot')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            @isset($word)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <ul>
                    <li>
                        <strong>{{ $word }}</strong>
                    </li>
                </ul>
            </div>
            @endisset
            <!-- form start -->
            <form action="{{ route('numbered.convert') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="a">Number</label>
                        <input type="number" name="number" class="form-control" id="number" value="{{ old('number') }}"
                            placeholder="Variable A" required>
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
