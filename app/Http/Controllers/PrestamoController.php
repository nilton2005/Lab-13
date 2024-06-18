<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        // Obtener todos los libros con información sobre su estado de préstamo
        $books = Book::leftJoin('prestamos', 'books.id', '=', 'prestamos.book_id')
            ->select('books.id', 'books.titulo', 'books.año', 'books.estado_default as libro_estado', 'prestamos.estado as prestamo_estado')
            ->get();

        $users = User::all();

        return view('prestamos.create', compact('books', 'users'));
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

    public function postProductSearch(Request $request){
        $rules = [
            'search' =>'required',
      
           
        ];
        $messages = [
            'search.required'=>'Deve ingresar una consulta',
    
        ];
    
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();
        else:
            switch($request->input('filter')):
                case '0':
                    $books = Book::with(['prestamos'])->where('titulo', 'LIKE', '%'.$request->input('search'))->orderBy('id','desc')->get(); 
                    break; 
                case '1':
                    $books = Book::with(['prestamos'])->where('año',$request->input('search'))->orderBy('id','desc')->get(); 
                    break;
                endswitch;
    
                $books = ['books'=> $books];
                return view('prestamos/create', $books);
    
        endif;
    }
}
