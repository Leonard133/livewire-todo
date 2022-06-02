<div>
    <div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans">
        <div class="bg-white rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg">
            <div class="mb-4">
                <h1 class="text-grey-darkest">Todo List</h1>
                <form class="flex mt-4" wire:submit.prevent="addTodo">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker" placeholder="Add Todo" wire:model="newTodo">
                    <button type="submit" class="flex-no-shrink p-2 border-2 rounded text-teal-500 border-teal-500 hover:text-white hover:bg-teal-500">Add</button>
                </form>
            </div>
            <p>{{ $completed }} / {{ $total }}</p>
            <div>
                @foreach($todos as $key => $todo)
                <div class="flex mb-4 items-center">
                    <p class="w-full @if($todo['completed']) line-through text-green-500 @endif text-grey-darkest">{{ $todo['name'] }}</p>
                    <button wire:click.prevent="changeStatus({{ $key }})" class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white @if($todo['completed']) text-gray-500 border-gray-500 hover:bg-gray-500 @else text-green-500 border-green-500 hover:bg-green-500 @endif">
                        @if(!$todo['completed'])
                            Done
                        @else
                            Not Done
                        @endif
                    </button>
                    <button wire:click.prevent="removeTodo({{ $key }})" class="flex-no-shrink p-2 ml-2 border-2 rounded text-red-500 border-red-500  hover:text-white hover:bg-red-500">Remove</button>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
