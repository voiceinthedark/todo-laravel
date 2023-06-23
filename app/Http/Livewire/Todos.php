<?php

namespace App\Http\Livewire;

use App\Events\TodoCreated;
use App\Models\Todo;
use Illuminate\Support\Facades\Event;
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
        $todo = Todo::create([
            'title' => $this->title,
            'user_id' => auth()->user()->id,
            'completed' => false,
        ]);
        $this->title = '';

        // Doesn't seem to working from a livewire component
        Event::dispatch(new TodoCreated($todo), ['todo' => $todo]);
        // Send a todo created event
        $this->emit('todoCreated', $todo->id);
    }




}
