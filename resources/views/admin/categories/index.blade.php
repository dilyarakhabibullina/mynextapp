<h1>Список категорий</h1>

@foreach($categories as $category) 
 <a href="categories/{{$category['id']}}">
    <h3>{{$category['category_name']}}</h3>
</a>
@endforeach 
