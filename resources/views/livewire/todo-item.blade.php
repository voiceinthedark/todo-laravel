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
            <button wire:click="deleteTodo" x-on:click="$dispatch('notice', {type: 'info', text: 'deleted successfully'})" class="text-red-500">
                <x-icon-trash />
            </button>
        </div>
        {{-- <script type='module'>
            console.log('inside module');
            Echo.private('todo.' + {{ $todo->id }})
                .listen('todoCreated', (e) =>{
                    console.log(e);
            });
    </script> --}}
    </div>
    <!-- Show this div content only when editing by pressing the pencil button -->
    <div x-show="editingTodo"
        x-on:click.away="editingTodo = false"
        x-on:click.outside="$dispatch('notice', {type: 'success', text: 'Edited successfully'})"
        x-transition.duration.500ms
        >

        <input type="text"
            wire:model.debounce.500ms="todo.title"
            wire:keydown.enter="updateTodo({{ $todo->id }})"
            placeholder="{{ $todo->title }}"
            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:border-green-400 focus:ring-green-300 focus:outline-dashed focus:ring focus:ring-opacity-40">

    </div>
</li>

