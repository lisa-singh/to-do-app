
@extends('todo.layout')

@section('content')
    <div class="flex justify-between my-2 px-4">
        <h1 class="text-2xl">Todo list</h1>
        <a class="py-2 px-1 bg-blue-400 rounded mx-5 cursor-pointer text-white" href="{{route('todo.create')}}"> <span class="fas fa-plus px-2 "></span></a>

    </div>
    <x-alert/>
    <ul class="my-5">
        @forelse ($todos as $todo)
            <li class="flex justify-between py-2">

                @include('todo.completeButton')
                <p @if($todo->completed)
                        class="line-through"
                    @endif>
                    <a class="cursor-pointer" href="{{route('todo.show', $todo->id)}}">{{$todo -> title}}</a>
                </p>

                <div>
                    <a href="{{ route('todo.edit', $todo->id )}}" class=" cursor-pointer text-white "><span class="fas fa-pen px-2 text-green-400 cursor-pointer text-white" ></span></a>

                    <span class="fas fa-times px-2 text-red-600" onclick="event.preventDefault();
                        if(confirm('Do you want to delete this?')){
                            document.getElementById('form-destroy-{{$todo->id}}').submit()
                        }"></span>
                    <form action="{{route('todo.destroy' , $todo->id)}}" method="post" style="display:none;" id="{{ 'form-destroy-'.$todo->id }}">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </li>
        @empty
            <p>No task available</p>
        @endforelse
    </ul>

@endsection

