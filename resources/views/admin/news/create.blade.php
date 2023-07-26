@extends('layouts.admin')
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить новость</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-sm btn-outline-secondary">Добавить запись</button>
        </div>
      </div>
      @if($errors->any())
        @foreach($errors->all() as $error)
        <x-alert :message="$error" type="danger"></x-alert>
        @endforeach
        @endif
<form method="post" action="{{route('admin.news.store')}}">
    @csrf

    <div class="form-group">
        <label for="categories">Категория</label>
        <select class="form-control" name="category_id" id="category_id">
            @foreach ($categories as $category)
            <option value="{{$category->id}}" @if($category->id === old('category_id')) selected @endif>{{$category->categories}}</option>
 @endforeach
        <select>
    </div> 
    
    <div class="form-group">
        <label for="title">Заголовок</label>
        <input type="text" class="form-control" name="title" id="title" value="{{ old('title')}}">
    </div> 
    <div class="form-group">
        <label for="text">Содержание</label>
        <input type="text" class="form-control" name="text" id="text" value="{{ old('text')}}">
    </div> 
    <div class="form-group">
        <label for="author">Автор</label>
        <input type="text" class="form-control" name="author" id="author">
    </div> 
    <div class="form-group">
        <label for="status">Приватная ли новость?</label>
        <select class="form-control" name="status" id="status" value="{{ old('text')}}">
            <option @if(old('status') ==='yes') selected @endif>yes</option>
            <option @if(old('status') ==='no') selected @endif>no</option>
        <select>
    </div> 
</br>
<button type="submit" class="btn btn-success">Сохранить</button>

</form>


</main>
@endsection