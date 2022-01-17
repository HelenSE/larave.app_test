@extends('layouts.admin')
@section('content')
    <div class="content-box-large">
        <div class="panel-heading">
            <div class="panel-title">Product Tables</div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <a href="{{ route('admin.product.create') }}" class="btn btn-sm btn-success"> Create </a>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th> </th>
                        <th>

                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $loop->iteration + (($products->currentPage() -1) * $products->perPage())}}</td>
                            <td>{{$product->name}}</td>
                            <td>
                                @if (Storage::disk('public')->exists($product->img))
                                    <img src="{{ asset('/storage/'.$product->img) }}" width="150" height="150">
                                @else
                                    <img src="{{ asset($product->img) }}" width="150" height="150">
                                @endif
                            </td>



                            <td></td>
                            <td>

                                <a href="{{ route('admin.product.show', ['product' => $product->id]) }}" >Показать</a>
                                <a href="{{ route('admin.product.edit', ['product' => $product]) }}">Редактировать</a>
                                <form action="{{ route('admin.product.destroy', compact('product')) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-success">Удалить</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $products->links() !!}
            </div>
        </div>
    </div>
@endsection
