@extends('layouts.app')
@section('content')
<form action='/categories/update/{{$category->id}}' method="POST">
    @csrf
    @method('PATCH')
    <input type='text' name='name' placeholder='name' value='{{$category->name}}'/>
    <button>edit</button>
</form>
@endsection