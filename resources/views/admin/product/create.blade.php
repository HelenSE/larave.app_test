@extends('layouts.admin')
@section('content')
    <div class="col-md-4">

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="text-danger">{{ $error }}</div>
        @endforeach
    @endif

    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" required>
        <br>
        <input type="number" name="price" min="1" required >
        <br>
        <input type="file" name="img">

        <br>
        <input type="checkbox" name="status" value="1">
        <br>
        <button type="submit" class="btn-success btn btn-sm">Send</button>
    </form>
        @isset($path)
            <img class="img-fluid" src="{{asset('/storage/'.$path)}}">
    @endisset
@endsection
