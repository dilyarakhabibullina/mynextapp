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
            <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Заголовок</th>
              <th scope="col">Категория номер</th>
              <th scope="col">Название категории</th>
              <th scope="col">Автор</th>
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
              <td>{{$news['author']}}</td>
              <td>{{$news['text']}}</td>
              <td>{{$news['isPrivate']}}</td>
              <td><a href="{{route('admin.news.edit', ['news' =>$news])}}">Редактировать</a>&nbsp<a href="javascript:;" class="delete" rel="{{ $news->id }}">Удалить</a></td>
            </tr>
           @endforeach
          </tbody>
        </table>

       
      </div>
    </main>
  </div>
</div>
@endsection

@push('js')
<script>
document.addEventListener("DOMContentLoaded", function(){
  let filter = document.getElementById("filter");
  filter.addEventListener("change", function(event) {
    location.href = "?f=" + this.value;
  });




let elements = document.querySelectorAll(".delete");
elements.forEach(function(element, key) {
  element.addEventListener('click', function() {
  const id = this.getAttribute('rel');
  // alert (id);
  // alert ('/admin/news/'+id);
  if(confirm('Подтверждаете удаление записи с #ID = '+id)) {
send('/admin/news/'+id).then( ()=>{
location.reload();
});
  }
  else {
    alert ("Вы отменили удаление записи");
  }
});
});

async function send(url) {
  let response = await fetch (url, {
    method: 'DELETE',
    headers: {
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    }
  });
  let result = await response.json();
  return result.ok;

}
});
</script>


@endpush