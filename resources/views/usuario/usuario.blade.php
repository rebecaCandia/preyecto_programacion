@extends('body.cuerpo')
@section('title', 'Login')
@section('cuerpo')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="row w-100">
        <div class="col-md-8 col-lg-6 mx-auto">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header text-center">
                    <h3 class="font-weight-light my-4">Iniciar Sesión</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email" class="form-label">Nombre de Usuario</label>
                            <input type="text" name= "email"  class="form-control" id="email" placeholder="Ingresa tu nombre de usuario" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Ingresa tu contraseña" required>
                        </div>
                        <div class="form-group d-flex justify-content-between align-items-center mt-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Recordarme</label>
                            </div>
                            <a href="#" class="small">¿Olvidaste tu contraseña?</a>
                        </div>
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary btn-lg w-100" style="background: #007bff; border-color: #007bff; font-weight: bold; transition: background-color 0.3s ease;">
                                Iniciar Sesión
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p class="small">¿No tienes una cuenta? <a href="#">Regístrate aquí</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection