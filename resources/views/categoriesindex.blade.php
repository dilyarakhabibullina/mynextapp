@extends('layouts.main')
@section('content')


<h1>Список категорий</h1>

@foreach($categories as $category) 
 <a href="categories/{{$category['id']}}">
    <h3>{{$category['categories']}}</h3>
</a>
@endforeach 

@endsection
