@extends('prestamos.master')

<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 title="Biblioteca virtual"></h2>
           
        </div>
        <div class="inside">
            <div class="form_search" id="form_search">
                {!!Form::open(['url'=>'/prestamos/search'])!!}
                <div class="row">
                    <div class="col-md-4">
                        {!!Form::text('search',null,['class'=>'form-control','placeholder'=>'Busqueda por nombre'])!!}
                    </div>
                    <div class="col-md-4">
                        {!!Form::select('filter', ['0'=>'Nombre del producto','1'=>'Código'],0,['class'=>'form-control'])!!}
                    </div>
                    <div class="col-md-2">
                        {!!Form::select('status', ['0'=>'Privado','1'=>'Público'],0,['class'=>'form-control'])!!}
                    </div>
                    <div class="col-md-2">
                        {!!Form::submit('Buscar', ['class'=>'btn btn-primary'])!!}
                    </div>
                </div>
                {!!Form::close()!!}
            </div>

            <table class=" table table-responsive-lg table-striped mtop16">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Titulo</th>
                        <th>Año</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                    <tr >
                        <th>{{$book->id}}</th>
                        <td >
                            {{--
                            <a href="{{url('/uploads/'.$p->file_path.'/'.$p->image)}}" data-fancybox data-caption ="Single image">

                                <img src="{{url('/uploads/'.$p->file_path.'/t_'.$p->image)}} " width="80px" alt="imagen destacada del producto x" >
                            </a>
                            <script>
                                $(document).ready(function(){
                                    Fancybox.bind("[data-fancybox]",{
                                        });
                                });
                            </script>
                         --}}   
                        </td>
                        

                        <td>{{$book->titulo}} 
                                @foreach($prestamos as $prestamo)
                                    @if($prestamo->estado == 0) <i class="fa-solid fa-lock" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-custom-class="custom-tooltip"
                                    data-bs-title="Estado: Reservado"></i>  
                                    @endif</td>
                                @endforeach
                        <td>{{ $book->año }}</td>
                        <td>
                            <div class="opts">
                                {{--
                                <button class="btn btn-primary">
                                    <a href="{{url('/admin/product/'.$p->id.'/edit')}}" class="edit" title="Editar" data-placement = "top" data-toggle= "tooltip"><i class="fas fa-edit"></i></a>
                                --}} Reservar
                                </button>  
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>           
        </div>
    </div>
</div>
