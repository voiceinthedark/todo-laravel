<li x-data="{ editingTodo: false }">
    <div class="flex justify-between py-2 px-4 bg-gray-900 font-semibold">
        <div>
            <input type="checkbox" name="completed" id="completed" wire:change="completedTodo({{ $todo->id }})" {{ $todo->completed ? 'checked' : ''}}>
            <a href="" class="{{ $todo->completed ? 'complete' : ''}}">{{ $todo->title }}</a>
        </div>
        <div>
            <button x-on:click="editingTodo = !editingTodo" class="text-green-500 px-4">
                <x-icon-pencil />
            </button>
            <button wire:click="deleteTodo" class="text-red-500">
                <x-icon-trash />
            </button>
        </div>
    </div>
    <!-- Show this div content only when editing by pressing the pencil button -->
    <div x-show="editingTodo"  x-on:click.away="editingTodo = false">
        <input type="text"
            wire:model="todo.title"
            wire:keydown.enter="updateTodo({{ $todo->id }})"
            placeholder="{{ $todo->title }}"
            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:border-blue-400 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">

    </div>
</li>
