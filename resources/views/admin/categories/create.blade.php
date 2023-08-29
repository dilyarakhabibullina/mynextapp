@extends('layouts.admin')
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить категорию</h1>
        </div>
      @if($errors->any())
        @foreach($errors->all() as $error)
        <x-alert :message="$error" type="danger"></x-alert>
        @endforeach
        @endif
<form method="post" action="{{route('admin.categories.store')}}">
    @csrf

  
    
    <div class="form-group">
        <label for="categories">Наименование категории</label>
        <input type="text" class="form-control" name="categories" id="categories" value="{{ old('categories')}}">
    </div> 
    <div class="form-group">
        <label for="title">Слаг</label>
        <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug')}}">
    </div> 
       
</br>
<button type="submit" class="btn btn-success">Сохранить</button>

</form>


</main>
@endsection