<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               
                    <div class="container w-25 mt-5" style="padding-bottom: 50px;">
                        <div class="card shadow-sm" style="background-color: darkturquoise;">
                            <div class="card-body">
                                <h3>Lista de tareas</h3>
                                <form action="{{ route('store') }}" method="POST" autocomplete="off">
                                    @csrf
                                    <div class="input-group" style="background-color: cornflowerblue;" >
                                        <input type="text" name="content" class="form-control" placeholder="Añade tu tarea" style="background-color: aliceblue;">
                                        <button type="submit" class="btn btn-dark btn-sm px-4"><i class="fas fa-plus"></i></button>
                                    </div>
                                </form>
                                @if(count($todolist))
                                <ul class="list-group list-group-flush mt-3">
                                @foreach($todolist as $todolist)
                                <li class="list-group-item" style="background-color: aliceblue;">
                                <form action="{{ route('destroy', $todolist->id) }}" method="POST">
                                    {{$todolist->content}}
                                    @csrf
                                    @method('delete')
                                    <button type="submite" class="btn btn-link  btn-sm float-end"><i class="fas fa-trash"></i></button>
                                </form>
                                </li>
                                @endforeach
                                </ul>
                                @else
                                <p class="text-center mt-3">No tienes tareas pendientes!</p>
                                @endif
                            </div>
                        </div>
                    </div>


            </div>
        </div>
    </div>
</x-app-layout>
