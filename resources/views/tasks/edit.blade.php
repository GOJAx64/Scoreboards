@extends('layouts.windmil')

@section('title', 'Edit task: ' . $task->title)

@section('content')
    <div class="min-w-0 p-4 text-white bg-purple-600 rounded-lg shadow-xs">
        <label><strong>Edit: {{$task->title}}</strong></label>
    </div>
    <form action="{{route('tasks.update', $task)}}" method="POST">
        @csrf
        @method('put')
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            {{--TITLE--}}
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Title</span>
              <input 
                type="text" 
                name="title" 
                value="{{old('title',$task->title)}}"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" 
                placeholder="Study for test">
            </label>
            @error('title')
                <span class="text-xs text-red-600 dark:text-red-400">
                    *{{$message }}
                </span>
            @enderror
            {{--DESCRIPTION--}}
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Description</span>
                <textarea 
                    name="description"
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" 
                    rows="3" 
                    placeholder="Enter some description."
                    >{{old('description',$task->description)}}</textarea>
            </label>
            @error('description')
                <span class="text-xs text-red-600 dark:text-red-400">
                    *{{$message }}
                </span>
            @enderror
            {{--DUE DATE--}}
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Due date</span>
                <input 
                    type="date" 
                    name="due_date" 
                    value="{{old('due_date',$task->due_date)}}"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" 
                    >
            </label>
            @error('due_date')
                <span class="text-xs text-red-600 dark:text-red-400">
                    *{{$message }}
                </span>
            @enderror
        </div>
        <button 
            type="submit" 
            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            edit task
        </button>
    </form>
@endsection