@extends('layouts.admin')
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать новость</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-sm btn-outline-secondary">Добавить запись</button>
        </div>
      </div>
      @if($errors->any())
        @foreach($errors->all() as $error)
        <x-alert :message="$error" type="danger"></x-alert>
        @endforeach
        @endif
<form method="post" action="{{route('admin.news.update', ['news' =>$news])}}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="categories">Категория</label>
        <select class="form-control" name="category_id" id="category_id">
            @foreach ($categories as $category)
            <option value="{{$category->id}}" @if($category->id === $news->category_id) selected @endif>{{$category->categories}}</option>
 @endforeach
        <select>
    </div> 
    
    <div class="form-group">
        <label for="title">Заголовок</label>
        <input type="text" class="form-control" name="title" id="title" value="{{ $news->title}}">
    </div> 
    <div class="form-group">
        <label for="text">Содержание</label>
        <input type="text" class="form-control" name="text" id="text" value="{{ $news->text}}">
    </div> 
    <div class="form-group">
        <label for="author">Автор</label>
        <input type="text" class="form-control" name="author" id="author" value="{{ $news->author }}">
    </div> 

    <div class="form-group">
        <label for="image">Изображение</label>
        <input type="file" class="form-control" name="image" id="image">
    </div>

    <div class="form-group">
        <label for="isPrivate">Приватная ли новость?</label>
        <select class="form-control" name="isPrivate" id="isPrivate" value="{{ $news->isPrivate}}">
            <option @if($news->isPrivate ==='yes') selected @endif value=1>yes</option>
            <option @if($news->isPrivate ==='no') selected @endif value=0>no</option>
        <select>
    </div> 
</br>
<button type="submit" class="btn btn-success">Сохранить</button>

</form>


</main>
@endsection