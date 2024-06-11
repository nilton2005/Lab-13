
    <h1>prestamos</h1>
    hoala
    <a href="{{ route('prestamos.list') }}">Lista de libros</a>
    <table>
        <thead>s
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
                    <td>{{ $prestamo->book->title }}</td>
                    <td>{{ $prestamo->user->name }}</td>
                    <td>{{ $prestamo->fecha_prestamo }}</td>
                    <td>{{ $prestamo->fecha_devuelto }}</td>
                    <td>{{ $prestamo->estado ? 'Duevuelto' : 'No Devuelto ' }}</td>
                    <td>
                        <a href="{{ route('prestamos.show', $prestamo->id) }}">Ver</a>
                        <a href="{{ route('prestamos.edit', $prestamo->id) }}">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
