<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;

class Todos extends Component
{

    protected $listeners = [
        'refreshTodos' => 'render',
    ];

    public $title = '';
    // public $todos;


    public function render()
    {
        return view('livewire.todos', [
            'todos' => auth()->user()->todos,
        ]);
    }

    public function addTodo()
    {
        // dd($this->title);

        $this->validate([
            'title' => 'required'
        ]);
        Todo::create([
            'title' => $this->title,
            'user_id' => auth()->user()->id,
            'completed' => false,
        ]);
        $this->title = '';
    }




}
