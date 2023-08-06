@extends('layouts.admin')
@section('content')

<div class="container-fluid">

  <div class="row">
   

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      
      <h2>News-панель администратора</h2>
      <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{route('admin.news.create')}}" class="btn btn-sm btn-outline-secondary">Добавить запись</a>
        </div>
      <div class="table-responsive small">
        @include('inc.message')
        <label for="isPrivate">Приватная ли новость?</label> c
        <select id="filter">
            <option value=1>yes</option>
            <option value=0>no</option>
        <select>
          <button CLASS="btn small filter_btn">FILTER</button>

        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Заголовок</th>
              <th scope="col">Категория номер</th>
              <th scope="col">Название категории</th>
              <th scope="col">Текст новости</th>
              <th scope="col">Приватная ли новость</th>
              <th scope="col">Действия</th>
            </tr>
          </thead>
          <tbody>
           @foreach($newsList as $news)
            <tr>
              <td>{{$news['id']}}</td>
              
              <td>{{$news['title']}}</td>
              <td>{{$news['category_id']}}</td>
              <td>{{$news->category->slug}}</td>
              <td>{{$news['text']}}</td>
              <td>{{$news['isPrivate']}}</td>
              <td><a href="{{route('admin.news.edit', ['news' =>$news])}}">Редактировать</a>&nbsp<a href="">Удалить</a></td>
            </tr>
           @endforeach
          </tbody>
        </table>

        {{$newsList->links()}}
      </div>
    </main>
  </div>
</div>
@endsection