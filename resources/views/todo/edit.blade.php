@extends('todo.layout')

@section('content')
    <div class="flex justify-between my-2 px-4">
        <h1 class="text-2xl">Edit to do</h1>
        <a class="py-2 px-3 bg-blue-400 rounded mx-5 cursor-pointer text-white" href="{{route('todo.index')}}"> <span class="fas fa-arrow-left "></span></a>
    </div>
    <x-alert />
    <form action="{{route('todo.update', $todo->id)}}" method="post" class="py-5 ">
        @csrf
        @method('patch')
        <div class="py-1"><input type="text" name="title" value="{{ $todo->title }}" class="py-2 px-2 border rounded"></div>
        <div class="py-1"><textarea name="description" class="p-2 rounded border-purple-50" cols="30" rows="10">{{ $todo->description }}</textarea></div>
        <div class="py-2">
            @livewire('edit-step',['steps'=> $todo->steps])
        </div>
        <div class="py-1"><input type="submit" value="Edit" class='p-2 border rounded'></div>

    </form>

@endsection
