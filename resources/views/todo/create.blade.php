@extends('todo.layout')

@section('content')
    <div class="flex justify-between my-2 px-4">
        <h1 class="text-2xl">What next you need To-do</h1>
        <a class="py-2 px-3 bg-blue-400 rounded mx-5 cursor-pointer text-white" href="{{route('todo.index')}}"> <span class="fas fa-arrow-left "></span></a>
    </div>
    <x-alert />
    <form action="{{route('todo.store')}}" method="post" class="py-5 ">
        @csrf
        <div class="py-1"><input type="text" name="title" class="py-2 px-2 border-purple-50 rounded" placeholder="title"></div>
        <div class="py-1"><textarea name="description" class="p-2 rounded border-purple-50" cols="30" rows="10" placeholder="description"></textarea></div>
        <div class="py-2">
            @livewire('step')
        </div>
        <div class="py-1"><input type="submit" value="Create" class='p-2 border rounded'></div>
    </form>
@endsection
