@extends('layouts.admin')
@section('content')
    <form action="{{ route('admin.category.show', ['category' => $category]) }}"  enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" value="{{$category->name}}">
        <br>
        <input type="checkbox" name="status" value="1" checked="{{$category->status}}">
        <br>
    </form>
@endsection
