@extends('layouts.admin')
@section('content')
<h1>Список категорий</h1>
@include('inc.message')

@foreach($categories as $category) 
 
    <h3>{{$category['categories']}}</h3>&nbsp
<a href="javascript:;" class="delete" rel="{{ $category->id }}">Удалить категорию</a>
@endforeach
<hr>
<a href="categories/create" class="btn btn-sm btn-outline-primary">Добавить категорию</a>
@endsection

@push('js')
<script>
let elements = document.querySelectorAll(".delete");
elements.forEach(function(element, key) {
    element.addEventListener('click', function() {
        const id = this.getAttribute('rel');
        alert('Вы удаляете /admin/categories/'+id);

        send('/admin/categories/'+id).then( ()=>{location.reload();}

        );
    })
    
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
