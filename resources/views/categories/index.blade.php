@extends('layouts.app')
@section('content')
<div>
    <table>
        @foreach($categories as $key => $item)
        <tr>
            <td>{{$item->name}}</td>
            <td><a href="/categories/edit/{{$item->id}}">Edit</a></td>
            <td>
                <img src="{{$item->photo}}" alt="">
            </td>
            <td>
                <h1>Products</h1>
                <ul>
                    @foreach($item->products as $product)
                    <li>{{ $product->name}}</li>
                    @endforeach
                </ul>
            </td>
            <td>
                <form action="/categories/{{$item->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">delete</button>

                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <a href="/categories/create">Add Categories</a>

</div>
@endsection