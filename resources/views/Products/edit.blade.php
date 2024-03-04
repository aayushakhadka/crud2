@extends ('layouts.app')
@section('content')
<form action="/products/update/{{$product->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <input type='text' name="name" placeholder='name' value="{{$product->name}}" />
    <img src="{{$product->photo}}" alt="">
    <input type='file' name="photo" placeholder='file' />
    <select name="cagtegory_id" id="">
        @foreach($categories as $category)
        <option value="{{$category->id}}" selected="{{ $category->id == $product->category_id}}">{{ $category->name}}</option>
        @endforeach
    </select>
    <button>edit</button>

</form>
@endsection