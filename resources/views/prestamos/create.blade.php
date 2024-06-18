@extends('prestamos.master')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css">


    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/1d70819719.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css">
<link rel="stylesheet" href="{{url('/static/css/login.css?v='.time())}}">
<script src="https://kit.fontawesome.com/1d70819719.js" crossorigin="anonymous"></script>




<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-solid fa-store"></i>Biblioteca virtual</h2>
            <ul>
           
        </div>
        <div class="inside">
            <div class="form_search" id="form_search">
                {!!Form::open(['url'=>'/prestamos/create/search'])!!}
                <div class="row">
                    <div class="col-md-4">
                        {!!Form::text('search',null,['class'=>'form-control','placeholder'=>'Ingrese aqui el nombre o codigo'])!!}
                    </div>
                    <div class="col-md-4">
                        {!!Form::select('filter', ['0'=>'Titulo','1'=>'Año'],0,['class'=>'form-control'])!!}
                    </div>
                    <div class="col-md-2">
                        {!!Form::select('status', ['0'=>'Diponible','1'=>'Reservado'],0,['class'=>'form-control'])!!}
                    </div>
                    <div class="col-md-2">
                        {!!Form::submit('Buscar', ['class'=>'btn btn-primary'])!!}
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
            <table class="table table-responsive-lg table-striped mtop16">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Año</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                    <tr>
                        <th>{{ $book->id }}</th>
                        <td>{{ $book->titulo}}
                            </td>

                                <td>{{ $book->año }}</td>
                        <td>
                            @if($book->libro_estado == 1 && (is_null($book->prestamo_estado) || $book->prestamo_estado == 1))
                            <span class="badge bg-success">Disponible</span>
                            @elseif($book->prestamo_estado == 0)
                            <span class="badge bg-warning">Reservado</span>
                            @else
                            <span class="badge bg-danger">No disponible</span>
                            @endif
                        </td>
                        <td>
                            @if($book->libro_estado == 1 && (is_null($book->prestamo_estado) || $book->prestamo_estado == 1))
                            <button class="btn btn-primary" style="color:#fff; text-decoration:none;">
                                @auth
                                    <a href="{{ url('prestamos/create/reservar') }}" class="reserva" style="color:#fff; text-decoration:none;" title="Reservar" data-placement="top" data-toggle="tooltip">
                                        <i class="fa-solid fa-bookmark"></i> Reservar
                                    </a>
                                @else
                                    <a href="{{ url('/prestamos/create/register') }}" class="reserva" style="color:#fff; text-decoration:none;" title="Iniciar sesión" data-placement="top" data-toggle="tooltip">
                                        <i class="fa-solid fa-lock"></i> Iniciar sesión
                                    </a>
                                @endauth
                            </button>
                            
                            @elseif($book->prestamo_estado == 0)
                            <button class="btn btn-secondary" disabled>
                                <a href="#" class="reserva" title="Reservado"  style="color:#fff; text-decoration:none;" data-placement="top" data-toggle="tooltip">
                                    <i class="fa-solid fa-lock"></i> Reservado
                                </a>
                            </button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
           
        </div>           
        </div>
    </div>
</div>
