@extends('layouts.admin')
@section('content')



    <div class="table-responsive small">
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

<label for="notanadmin">
<input type="radio" name="isNotAdmin" value=0 >
Админ
</label>
<label for="admin">
<input type="radio" name="isAdmin" value=1 checked>
Не админ
</label>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <button type="submit" class="btn btn-success">Сохранить</button>


@endsection