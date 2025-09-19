{{-- resources/views/todos/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('My Todos') }}
            </h2>
            <a href="{{ route('todos.create') }}" 
               class="px-4 py-2 font-bold text-black transition duration-200 bg-blue-500 rounded hover:bg-blue-700">
                Add New Todo
            </a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <! -- Session Status -->

    @if (session('success'))
        <div class="relative px-4 py-3 mx-auto text-green-700 bg-green-100 border border-green-400 rounded max-w-7xl" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if (session('error'))
        <div class="relative px-4 py-3 mx-auto text-red-700 bg-red-100 border border-red-400 rounded max-w-7xl" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
        
    @endif

    <! -- Todo List Section -->
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="mb-4 text-2xl font-bold">Your Todo List</h2>
                    
                    {{-- Display success message --}}
                    @if($todos->isEmpty())
                        <p class="text-gray-500">No todos found. Start by adding a new todo!</p>
                    @else
                        <ul class="space-y-4">
                            @foreach($todos as $todo)   
                                <li class="flex items-center justify-between gap-6 p-4 border rounded-lg">
                                    <div>
                                        <h3 class="text-lg font-semibold">{{ $todo->title }}</h3>
                                        <p class="text-gray-600">{{ $todo->description }}</p>
                                        <!-- Priority Display -->
                                        @if($todo->priority)
                                            <p class="text-sm">Priority: 
                                                @if($todo->priority === 'high')
                                                    <span class="px-2 py-1 text-xs font-semibold text-red-800 bg-red-200 rounded-full">High</span>
                                                @elseif($todo->priority === 'medium')
                                                    <span class="px-2 py-1 text-xs font-semibold text-yellow-800 bg-yellow-200 rounded-full">Medium</span>
                                                @else
                                                    <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-200 rounded-full">Low</span>
                                                @endif
                                            </p>
                                        @endif
                                        <p>Due date: {{ $todo->getFormattedDueDateAttribute()}}</p>
                                        <p class="text-sm text-gray-400">Created at: {{ $todo->created_at->format("M d, Y")}}</p>
                                       
                                        <p class="text-sm text-gray-400">Status: 
                                            @if($todo->is_completed)
                                                <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-200 rounded-full">Completed</span>
                                            @else
                                                <span class="px-2 py-1 text-xs font-semibold text-yellow-800 bg-yellow-200 rounded-full">Pending</span>
                                            @endif
                                    </div>
                                    <div class="flex space-x-2">
                                        <form action="{{ route('todos.toggle', $todo) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="px-3 py-1 text-sm text-black bg-green-500 rounded hover:bg-green-700">
                                                {{ $todo->is_completed ? 'Mark Incomplete' : 'Mark Complete' }}
                                            </button>
                                        </form>
                                        <a href="{{ route('todos.edit', $todo) }}" class="px-3 py-1 text-sm text-black bg-blue-500 rounded hover:bg-blue-700">Edit</a>
                                        <form action="{{ route('todos.destroy', $todo) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this todo?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 text-sm text-red-600 bg-red-500 rounded hover:bg-red-700">Delete</button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>