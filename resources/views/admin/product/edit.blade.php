@extends('layouts.admin')
@section('content')
    <form action="{{ route('admin.product.update', ['product' => $product]) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="text" name="name" value="{{$product->name}}">
        <br>
        <input type="number" name="price" value="{{$product->price}}">
        <br>
        <input type="file" name="img">
        @if (Storage::disk('public')->exists($product->img))
            <img src="{{ asset('/storage/'.$product->img) }}" width="150" height="150">
        @else
            <img src="{{ asset($product->img) }}" width="150" height="150">
        @endif
        <br>
        <input type="checkbox" name="status" value="1" checked="{{$product->status}}">
        <br>
        <button type="submit" class="btn-success btn btn-sm">Send</button>
    </form>
@endsection
