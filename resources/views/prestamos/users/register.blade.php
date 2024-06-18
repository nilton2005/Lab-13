@extends('prestamos.master')
<!-- register.blade.php -->
<!-- ... -->
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css">
    <link rel="stylesheet" href="{{url('/static/css/login.css?v='.time())}}">

    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/1d70819719.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

<div class="box  box_register shadow">
    <dicv class="header">
        <a href="{{url('/')}}">
            <img src="{{url('/static/images/logo.jpg')}}" >
        </a>
    </dicv>
    <div class="inside">
    {!!Form:: open(['url'=> '/prestamos/create/register'])!!}

    
    <label for="name" >Nombre: </label>
    <div class="input-group">
        <div class="input-group-text"><i class="fa-regular fa-user"></i>
        </div>
        {!!Form:: text('name', null, ['class' => 'form-control', 'required'])!!}
    </div>
    <label for="dni">DNI</label>
    <div class="input-group">
        <div class="input-group-text"><i class="fa-solid fa-id-card"></i>
        </div>
        {!!Form::number('dni',null,['class'=>'form-control','required'])!!}
    </div>

    <label for="direccion">Dirección</label>
    <div class="input-group">
        <div class="input-group-text"><i class="fa-solid fa-id-card"></i>
        </div>
        {!!Form::text('direccion', null,['class'=>'form-control','required'])!!}
    </div>

    <label for="email" class="mtop16" >Correo Electrónico</label>
    <div class="input-group">
        <div class="input-group-text"><i class="fa-regular fa-envelope"></i> 
        </div>
        {!!Form:: email('email', null, ['class' => 'form-control', 'required'])!!}
    </div>


    <label for="password" class= "mtop16">Contraseña</label>
    <div class="input-group">
        <div class="input-group-text"><i class="fa-solid fa-lock"></i>
        </div>
        {!!Form:: password('password', null, ['class' => 'form-control', 'required'])!!}
    </div>


    <label for="password" class= "mtop16">Confirmar Contraseña</label>
    <div class="input-group">
        <div class="input-group-text"><i class="fa-solid fa-lock"></i>
        </div>
        {!!Form:: password('cpassword', null, ['class' => 'form-control', 'required'])!!}
    </div>



    
    {!!Form::submit('Registrarse', ['class' =>'btn btn-success mtop16'])!!}
    {!!Form:: close()!!}

    @if (Session::has('message'))
        <div class="container">
            <div class=" mtop16 alert alert-{{Session::get('typealert')}}" style="display:none">
                {{Session::get('message')}}
                @if($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
                <script>
                    $('.alert').slideDown();
                    setTimeout(function(){$('.alert').slideUp();}, 10000);
                </script>
            </div>
        </div>
    @endif






    <div class="footer mtop16">
        <a href="{{url('/prestamos/create/login')}}" class="btn btn-primary"><i class="fa fa-home"></i> Ya tengo una cuenta, ingresar</a>

    </div>

     </div>
</div>
