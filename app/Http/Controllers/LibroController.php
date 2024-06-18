<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibroController extends Controller
{
    //
public function index()
{
    $libros_estado = DB::table('books')->leftJoin('prestamos', 'books.id', '=', 'prestamos.book_id')->select('books.id', 'books.titulo', 'books.estado_default as libro_estado', 'prestamos.estado as prestamo_estado')->get();

    return view('prestamos.create', compact('libros_estado'));
}


}
