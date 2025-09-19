{{-- resources/views/components/todo-card.blade.php --}}
<div class="bg-white overflow-hidden shadow rounded-lg {{ $todo->is_overdue ? 'border-l-4 border-red-500' : '' }}">
    <div class="p-6">
        <div class="flex items-center justify-between">
            <div class="flex items-start flex-1 space-x-3">
                <!-- Completion Toggle -->
                <form action="{{ route('todos.toggle', $todo) }}" method="POST" class="mt-1">
                    @csrf
                    @method('PATCH')
                    <button type="submit" 
                            class="flex-shrink-0 w-5 h-5 border-2 rounded {{ $todo->is_completed ? 'bg-green-500 border-green-500' : 'border-gray-300 hover:border-green-500' }} transition-colors duration-200">
                        @if($todo->is_completed)
                            <svg class="w-3 h-3 text-white mx-auto mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        @endif
                    </button>
                </form>

                <!-- Todo Content -->
                <div class="flex-1 min-w-0">
                    <h3 class="text-lg font-medium text-gray-900 {{ $todo->is_completed ? 'line-through text-gray-500' : '' }}">
                        {{ $todo->title }}
                    </h3>
                    
                    @if($todo->description)
                        <p class="text-sm text-gray-600 mt-1 {{ $todo->is_completed ? 'line-through' : '' }}">
                            {{ Str::limit($todo->description, 100) }}
                        </p>
                    @endif

                    <!-- Meta Information -->
                    <div class="flex items-center mt-3 space-x-4 text-sm text-gray-500">
                        <!-- Priority Badge -->
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                            {{ $todo->priority === 'high' ? 'bg-red-100 text-red-800' : '' }}
                            {{ $todo->priority === 'medium' ? 'bg-yellow-100 text-yellow-800' : '' }}
                            {{ $todo->priority === 'low' ? 'bg-green-100 text-green-800' : '' }}">
                            {{ ucfirst($todo->priority) }}
                        </span>

                        <!-- Due Date -->
                        @if($todo->due_date)
                            <span class="flex items-center {{ $todo->is_overdue ? 'text-red-600 font-medium' : '' }}">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $todo->formatted_due_date }}
                                @if($todo->is_overdue)
                                    (Overdue)
                                @endif
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex items-center ml-4 space-x-2">
                <a href="{{ route('todos.show', $todo) }}" 
                   class="text-blue-600 transition-colors duration-200 hover:text-blue-900">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                    </svg>
                </a>
                
                <a href="{{ route('todos.edit', $todo) }}" 
                   class="text-yellow-600 transition-colors duration-200 hover:text-yellow-900">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                    </svg>
                </a>
                
                <form action="{{ route('todos.destroy', $todo) }}" method="POST" class="inline"
                      onsubmit="return confirm('Are you sure you want to delete this todo?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 transition-colors duration-200 hover:text-red-900">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" clip-rule="evenodd"></path>
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8 7a1 1 0 012 0v4a1 1 0 11-2 0V7zM12 7a1 1 0 012 0v4a1 1 0 11-2 0V7z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>