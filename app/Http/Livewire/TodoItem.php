<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;

class TodoItem extends Component
{
    public $todo;

    public function render()
    {
        return view('livewire.todo-item', [
            'todo' => $this->todo
        ]);
    }

    public function deleteTodo()
    {
        Todo::where('id', $this->todo->id)->delete();
        // Refresh the todos list
        $this->emit('refreshTodos');
    }


}
