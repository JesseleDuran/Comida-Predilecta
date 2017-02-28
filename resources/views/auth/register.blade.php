@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Cedula</label>

                            <div class="col-md-6">
                                <input id="cedula" type="text" class="form-control" name="cedula" value="{{ old('cedula') }}" required>

                                @if ($errors->has('cedula'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cedula') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                            <label for="telefono" class="col-md-4 control-label">telefono</label>

                            <div class="col-md-6">
                                <input id="telefono" type="telefono" class="form-control" name="telefono" value="{{ old('telefono') }}" required>

                                @if ($errors->has('telefono'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                            <label for="direccion" class="col-md-4 control-label">direccion</label>

                            <div class="col-md-6">
                                <input id="direccion" type="direccion" class="form-control" name="direccion" value="{{ old('direccion') }}" required>

                                @if ($errors->has('direccion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('clave') ? ' has-error' : '' }}">
                            <label for="clave" class="col-md-4 control-label">clave</label>

                            <div class="col-md-6">
                                <input id="clave" type="password" class="form-control" name="clave" required>

                                @if ($errors->has('clave'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('clave') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="clave-confirm" class="col-md-4 control-label">Confirm clave</label>

                            <div class="col-md-6">
                                <input id="clave-confirm" type="password" class="form-control" name="clave_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@include ('errors.list')
