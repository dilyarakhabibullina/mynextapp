<h1> Добро пожаловать, {{Auth::user()->name}}</h1>
<br>
<a href="{{ route('welcomeRoute') }}">К новостям</a>
@if (Auth::user()->isAdmin === 1)
<a href="{{ route('admin.news.index') }}">В админку</a>
@endif

<!-- проверим, есть ли аватар, и выведем -->

@if(Auth::user()->avatar !== null)
<img src="{{ Auth::user()->avatar }}" style="width:250px;">
@endif