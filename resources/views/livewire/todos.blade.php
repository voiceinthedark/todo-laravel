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

<div
	x-data="noticesHandler()"
	class="fixed inset-0 flex flex-col-reverse items-end justify-start h-screen w-screen"
	@notice.window="add($event.detail)"
	style="pointer-events:none">
	<template x-for="notice of notices" :key="notice.id">
		<div
			x-show="visible.includes(notice)"
			x-transition:enter="transition ease-in duration-200"
			x-transition:enter-start="transform opacity-0 translate-y-2"
			x-transition:enter-end="transform opacity-100"
			x-transition:leave="transition ease-out duration-500"
			x-transition:leave-start="transform translate-x-0 opacity-100"
			x-transition:leave-end="transform translate-x-full opacity-0"
			@click="remove(notice.id)"
			class="rounded mb-4 mr-6 w-56  h-16 flex items-center justify-center text-white shadow-lg font-bold text-lg cursor-pointer"
			:class="{
				'bg-green-500': notice.type === 'success',
				'bg-blue-500': notice.type === 'info',
				'bg-orange-500': notice.type === 'warning',
				'bg-red-500': notice.type === 'error',
			 }"
			style="pointer-events:all"
			x-text="notice.text">
		</div>
	</template>
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
