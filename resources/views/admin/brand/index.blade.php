@extends('layouts.admin')
@section('content')
    <div class="content-box-large">
        <div class="panel-heading">
            <div class="panel-title">Responsive Tables</div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <a href="{{ route('admin.brand.create') }}"> Create </a>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Brand Name</th>
                        <th> </th>
                        <th>

                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($brands as $brand)
                    <tr>
                        <td>{{ $loop->iteration + (($brands->currentPage() -1) * $brands->perPage())}}</td>
                        <td>{{$brand->name}}</td>
                        <td>{{ asset('/storage/', $brand->logo)}}</td>
{{--                        <td>{{ Storage::disk('public')->url($brand->logo)) =}}</td>--}}

                        <td></td>
                        <td>
                            <a href="{{ route('admin.brand.show', ['brand' => $brand->id]) }}">Показать</a>
                            <a href="{{ route('admin.brand.edit', ['brand' => $brand]) }}">Редактировать</a>
                            <form action="{{ route('admin.brand.destroy', compact('brand')) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Удалить</button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $brands->links() !!}
            </div>
        </div>
    </div>
@endsection
