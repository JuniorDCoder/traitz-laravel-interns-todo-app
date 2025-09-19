<! -- Create and store a new todo -->
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Create Todo') }}
            </h2>
            <a href="{{ route('todos.index') }}" 
               class="px-4 py-2 font-bold text-black transition duration-200 bg-gray-500 rounded hover:bg-gray-700">
                Back to Todos
            </a>
        </div>
    </x-slot>
    <! -- Create Form Section -->
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="mb-4 text-2xl font-bold">Create New Todo</h2>
                    <form action="{{ route('todos.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="title" class="block mb-2 font-medium text-gray-700">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" required
                                   class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @error('title')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="description" class="block mb-2 font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="4" required
                                      class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="due_date" class="block mb-2 font-medium text-gray-700">Due Date</label>
                            <input type="date" name="due_date" id="due_date" value="{{ old('due_date') }}"
                                   class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @error('due_date')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Priority Field (Optional) -->
                        <div>
                            <label for="priority" class="block mb-2 font-medium text-gray-700">Priority</label>
                            <select name="priority" id="priority" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low</option>
                                <option value="medium" {{ old('priority') == 'medium' ? 'selected' : '' }}>Medium</option>
                                <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High</option>
                            </select>
                            @error('priority')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex items-center space-x-4">
                            <button type="submit" class="px-4 py-2 font-bold text-black transition duration-200 bg-blue-500 rounded hover:bg-blue-700">
                                Create Todo
                            </button>
                            <a href="{{ route('todos.index') }}" class="px-4 py-2 font-bold text-black transition duration-200 bg-gray-500 rounded hover:bg-gray-700">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>