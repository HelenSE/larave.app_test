@extends('layouts.admin')
@section('content')
    <div class="content-box-large">
        <div class="panel-heading">
            <div class="panel-title">Responsive Tables</div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <a href="{{ route('admin.category.create') }}"> Create </a>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th> </th>
                        <th>

                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration + (($categories->currentPage() -1) * $categories->perPage())}}</td>
                            <td>{{$category->name}}</td>
                            <td></td>
                            <td>
                                <a href="{{ route('admin.category.show', ['category' => $category->id]) }}">Показать</a>
                                <a href="{{ route('admin.category.edit', ['category' => $category]) }}">Редактировать</a>
                                <form action="{{ route('admin.category.destroy', compact('category')) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Удалить</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $categories->links() !!}
            </div>
        </div>
    </div>
@endsection
