@extends('layouts.main')
@section('title') {{ $news['title'] }} - @parent @stop
@section('content')
<h2>{{$news['title']}}</h2></br>
<h4>
{{$news['text']}}
</h4>
<div>
Это новость из категории номер {{$news['category_id']}}<span style='color:red'> под названием {{ $news->category->categories}} </span> 
 
</div>

<a href="{{route('newsList')}}">К списку новостей</a>
@endsection


