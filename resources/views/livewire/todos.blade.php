<div>
    <form class="flex flex-col gap-4" wire:submit.prevent="addTodo">
        <div class=" flex flex-1 text-xl mb-4">
            <input type="text" name='addTodo' id="addTodo" wire:model="title" placeholder="Enter a Todo..." class="w-full bg-white text-slate-600">
            <button type="submit" class="flex-shrink-0 bg-blue-500 text-white px-4">Add Todo</button>
        </div>
        <div>
            <!-- Add validation checking -->
            @if ($errors->any())
                <div class="text-red-500">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

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

{{-- <x-modal name="showModal" >
    <x-slot name="title">Edit Todo</x-slot>
    <x-slot name="content">
        <form wire:submit.prevent="updateTodo">
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" wire:model="title">
            </div>
            <div>
                <label for="completed">Completed</label>
                <input type="checkbox" name="completed" id="completed" wire:model="completed">
            </div>
            <div>
                <button type="submit">Update Todo</button>
            </div>
        </form>
    </x-slot>
</x-modal> --}}
