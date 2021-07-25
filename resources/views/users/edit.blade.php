@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Edycja użytkownika</div>
                <div class="panel-body">
                    
                    <img src="{{ url('user-avatar/'. $user->id . '/600') }}" alt="" class="img-responsive">
                    <br>

                    <form method="POST" action="{{ url('/users/' . $user->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                                    <label for="">Avatar</label>
                                    <input type="file" name="avatar" class="form-control" placeholder="Wybierz plik">

                                    @if ($errors->has('avatar'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('avatar') }}</strong>
                                        </span>
                                    @endif                                    
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="">Imię i nazwisko</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="Imię i nazwisko">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif                                    
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" placeholder="Email">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif                                      
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <label for="sex">Płeć</label>
                                <select class="form-control"  id="sex" type="text" class="form-control" name="sex">
                                    <option value="m" @if ($user->sex == 'm') selected @endif>Mężczyzna</option>
                                    <option value="f" @if ($user->sex == 'f') selected @endif>Kobieta</option>
                                </select>
                            </div>
                        </div>

                        

                        <div class="row" style="margin-top:20px;">
                            <div class="col-sm-10 col-sm-offset-1">
                                <button type="submit" class="btn btn-primary btn-sm pull-right">Zapisz zmiany</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
