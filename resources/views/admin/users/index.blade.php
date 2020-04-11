@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">Gebruikers</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td scope="col">Naam</td>
                                    <td scope="col">Email</td>
                                    <td scope="col">Rol</td>
                                    <td scope="col">Verwijderen</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if($user->name != $authUser)
                                                <form action="{{ route('admin.user.role') }}" method="POST">
                                                    @csrf
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <input type="submit" class="btn btn-outline-secondary" value="Wijzigen">
                                                        </div>
                                                        <select class="custom-select" id="roles" name="roles">
                                                            <option @if($user->role == 'user') selected @endif value="user">User</option>
                                                            <option @if($user->role == 'admin') selected @endif value="admin">Admin</option>
                                                        </select>
                                                        <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">
                                                    </div>
                                                </form>
                                            @endif


                                        </td>

                                        <td>

                                        </td>
                                    </tr>
                                @endforeach
                                @foreach ($errors->all() as $error)
                                    <div id="errorMessageBox" class="alert alert-danger mt-4">{{ $error  }}</div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
