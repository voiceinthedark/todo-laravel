<li class="flex justify-between py-2 px-4 bg-gray-900 font-semibold">
    <a href="">{{ $todo->title }}</a>

    <div>
        <button wire:click="editTodo" class="text-green-500 px-4">
            <x-icon-pencil />
        </button>
        <button wire:click="deleteTodo" class="text-red-500">
            <x-icon-trash />
        </button>
    </div>
</li>
