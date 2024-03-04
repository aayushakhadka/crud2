@extends('layouts.app')
@section('content')
<form action="/categories/create" method="POST" enctype="multipart/form-data">
    @csrf
    <input type='text' name="name" placeholder="category name" />
    <input type='file' name="photo" accept="image/png, image/jpg" />
    <button type='submit'>submit</button>
</form>