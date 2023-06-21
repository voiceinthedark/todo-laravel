<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;

class TodoItem extends Component
{

    // Set the rules for the validation
    protected array $rules = [
        'todo.title' => 'required'
    ];


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

    public function completedTodo($id) {
        $todo = Todo::find($id);
        $todo->completed = !$todo->completed;
        $todo->save();

        $this->emit('refreshTodos');
    }

    public function updateTodo($id) {

        // validate the form
        $this->validate($this->rules);

        $todo = Todo::find($id);
        $todo->title = $this->todo->title;
        $todo->save();
    }


}
