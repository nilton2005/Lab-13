
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
    
    
    <div class="header">
        <h1>prestamos</h1>
        <div class="name">
            @if (Auth::check())
                {{ Auth::user()->name }}
                <a href="{{ url('/logout') }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Salir">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </a>
            @endif
        </div>
    </div>
    <div class="container mt-5">
        <a href="{{ route('prestamos.create') }}" class="btn btn-primary mb-3">Prestar libro</a>
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Book</th>
                    <th>User</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($prestamos as $prestamo)
                    <tr>
                        <td>{{ $prestamo->id }}</td>
                        <td>{{ $prestamo->book->titulo }}</td>
                        <td>{{ $prestamo->user->name }}</td>
                        <td>{{ $prestamo->fecha_prestamo }}</td>
                        <td>{{ $prestamo->fecha_devuelto }}</td>
                        <td>{{ $prestamo->estado ? 'Devuelto' : 'No Devuelto' }}</td>
                        <td>
                            <a href="{{ route('prestamos.show', $prestamo->id) }}" class="btn btn-info btn-sm">Ver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        