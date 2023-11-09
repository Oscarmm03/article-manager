<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use Livewire\WithPagination;


class Articles extends Component
{
    use WithPagination;
    public $active, $filter;

    public function render()
    {
        if (auth()->check()) {
            $userId = auth()->user()->id; // Obtener el id del usuario autenticado

            $articlesQuery = Article::where('user_id', $userId)
            ->where('name', 'LIKE', '%' . $this->filter . '%') //flitrar por la base de datos el nombre y creamos un variable como en base de datos
            ->orWhere('price', 'LIKE', '%' . $this->filter . '%')//flitrar por la base de datos el precio y creamos un variable como en base de datos
            ->orWhere('quantity', 'LIKE', '%' . $this->filter . '%');//flitrar por la base de datos el cantidad y creamos un variable como en base de datos

            if($this->active) {
                $articlesQuery->where('status', $this->active); //hacemos el select frente a la query antrior creada
            }

            $articles = $articlesQuery->paginate(10); //mostramos la variable creada, para ello cramos otra variable delante en tes caso $articles=

            return view('livewire.articles', [
                'articles' => $articles
            ]);
        } else {
            // Manejar el caso en el que el usuario no está autenticado
            // por ejemplo, redirigir al usuario a la página de inicio de sesión
            return redirect()->route('login');
        }
    } 
    public function updatingActive(){ //check box activo resetear para ir a pagina 1
        $this->resetPage();
    }
}