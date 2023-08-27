@extends('layouts.admin')
@section('content')


    

    <div class="table-responsive small">
        @include('inc.message')
        <table class="table table-striped table-small">
            <thead>
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">Имя пользователя</th>
                    <th scope="col">Email пользователя</th>
                    <th scope="col">Признак администратора</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user['name']}}</td>
                    <td>{{$user['email']}}</td>
                    <td>{{$user['isAdmin']}}</td>
                    <td>
                    <form action="{{route('admin.profile.update', ['users' =>$users])}}" method="post">
    @csrf
<input type="radio" name="{{$user['name']}}" value='0' @if($user['isAdmin'] === 0) checked @endif> 
Не Админ
</label>
<label for="admin">
<input type="radio" name="{{$user['name']}}" value='1' @if($user['isAdmin'] === 1) checked @endif>
Админ
</label>

                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </div>
    
</form>

@endsection