@extends('layouts.app')
@section('content')

<h1>Add Product</h1>
<form action="/products/create" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" placeholder="Enter Product Name">
    <input type="text" name="price" placeholder="Enter Price">
    <input type="file" name="photo">
    <select name="category_id"  id="">
        @foreach ($categories as $item)
        <option value="{{ $item->id }}">{{ $item->name}}</option>
        @endforeach
    </select>
    <button type="submit">Submit</button>
</form>

@endsection