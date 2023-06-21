<div>
    <form wire:submit.prevent="addTodo">
        <div class=" flex flex-1 text-xl mb-4">
            <input type="text" name='addTodo' id="addTodo" wire:model="title" placeholder="Enter a Todo..." class="w-full bg-white text-slate-600">
            <button type="submit" class="flex-shrink-0 bg-blue-500 text-white px-4">Add Todo</button>
        </div>
    </form>
    <div>
        <ul>
            @forelse ($todos as $todo)
                <livewire:todo-item :todo="$todo" key="{{$todo->id}}" />

            @empty
                <p>No Todos</p>
            @endforelse

        </ul>
    </div>
</div>
