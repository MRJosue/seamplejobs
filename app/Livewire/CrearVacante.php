<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{

    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image|max:1024',
    ];

    public function CrearVacante(){
        $datos = $this->validate();

        // se almacena la imagen 
        $this->imagen->store('public/vacantes');
            // retornamos donde se almacena
            $imagen = $this->imagen->store('public/vacantes');
            // Obtenemos el nombre de la imagen 
            $datos['imagen'] = str_replace('public/vacantes/','',$imagen);


        // se Crea la Vacante 

        Vacante::create([
            'titulo' => $datos['titulo'],  
            'salario_id' => $datos['salario'],
            'categoria_id' => $datos['categoria'],
            'empresa' => $datos['empresa'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $datos['imagen'],
            'user_id'=> auth()->user()->id,
        ]);

        $mensaje = 'la vacante:'.$datos['titulo'].' se creo correctamente';
        // Crear un mensaje 
        session()->flash('mensaje',  'la vacante se creo correctamente');

        // Redireccionar al usuario
        // se ocupa la ruta nombranda con
        return redirect()->route('vacantes.index');

    }


    public function render()
    {

        // Consultar a la DB 
        $salarios = Salario::all();

        $categorias = Categoria::all();

        return view('livewire.crear-vacante', ['salarios' => $salarios, 'categorias' => $categorias]);
    }
}
