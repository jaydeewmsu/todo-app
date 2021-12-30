
<x-app-layout>
    <div style="width: 900px;"class="max-w-full mx-auto mt-10 px-4 py-8 text-gray-500">
        <div class="flex justify-between">
            <h1 class="text-xl uppercase text-gray-500">Tasks</h1>
            <a href="{{route('tasks.create')}}" class="flex items-center bg-gray-200 px-2 py-1 rounded hover:bg-gray-100 border-b-4 border-gray-400">
                <svg 
                    class="w-6 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"              stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                <span>New Task</span>
            </a>
        </div>
        @include('partials.notifications')
        @foreach($tasks as $task)
        <div class="pb-4 pt-2 px-2 mt-4 mb-2 border-b-4 border-gray-400 bg-gray-200 hover:shadow-md rounded">
            <div class="flex justify-between items-center py-2">
                <form class="flex items-center gap-2" method="POST" action="{{route('mark')}}">
                    @csrf  
                    <input class="bg-gray-400 text-green-500" type="checkbox" name="id" value="{{$task->id}}" onClick="this.form.submit()" {{$task->task_status ? 'checked' : ''}}>
                    <h1 class="text-lg text-gray-600">{{$task->task_name}}</h1>
                    <input type="hidden" name="id" value="{{$task->id}}" />
                </form>
                <form action="{{route('tasks.destroy', $task->id)}}" method="POST">
                    @csrf 
                    @method('DELETE')
                    <button onclick="return confirm('Are you sure you want to delete this task?')">
                        <svg class="w-6 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </form>
            </div>
            <p>{{$task->task_details}}</p>
            <div class="mt-4 flex justify-left items-center gap-5">
                <a href="{{route('tasks.edit', $task->id)}}" class="hover:text-gray-400">
                    <svg class="w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>
