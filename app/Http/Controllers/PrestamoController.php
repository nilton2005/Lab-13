<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;


class PrestamoController extends Controller
{
    //
    public function index(){
        $prestamos = Prestamo::with('book','user')->get();
        return view('prestamos.index', compact('prestamos'));

    }

    public function create(){
        $books = Book::all();
        $users = User::all();
        $prestamos = Prestamo::all();
        return view('prestamos.create',compact('books','users','prestamos'));
    }

    public  function store(Request $request){
        Prestamo::create()->route('prestamos.index');
    }

    public function show(Prestamo $prestamo){
        return view('prestamos.show', compact('prestamo'));

    }

    public function edit(Prestamo  $prestamo){
        $books = Book::all(); 
        $users = User::all();
        return view('prestamos.edit',compact('prestamo', 'books','users'));
    }

    public function update(Request $request, Prestamo $prestamo){
        $prestamo->update($request->all());
        return redirect()->route('prestamos.index');
    }
    //public function destroy(Prestamo $prestamo){
    //    $prestamo->delete();
    //    return redirect()->route('prestamos.index');
    //}
}
