
@extends("base")
@section("title")
    Mon titre
@endsection

@section("custom-css")
    @vite(['resources/css/materialize-design.css'])
@endsection

@section("nav")
    <x-navbar></x-navbar>
@endsection

@section("body")
    <div>
        @if(session("success"))
            <div class="alert alert-success text-center" role="alert">
                {{session("success")}}
            </div>
        @endif
    </div>

{{--    Ajouter une TASK--}}
    <div class="container d-flex justify-content-center mt-5">
        <form method="POST" action="{{route('task.store')}}" class="form-inline shadow p-4">
            @csrf
            <div class="form-group mr-4">
                <span class="input-field" style="max-width: 250px">
                    <input type="text" id="title" name="title" required>
                    <label for="title">Nom</label>
                </span>
            </div>
            @error('title')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <button class="btn btn-dark text-white mt-3" type="submit">Ajouter</button>
        </form>
    </div>


{{--    Supprimer une Task--}}
    <div class="container d-flex flex-column align-items-center mt-5">
        @foreach($tasks as $task)
            <div class="d-flex align-items-center justify-content-between w-50 border p-3 shadow rounded mb-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="task-{{$task->id}}" name="box">
                    <label class="custom-control-label" for="task-{{$task->id}}"></label>
                </div>
                <span class="flex-grow-1">{{$task->title}}</span>
                    <button class="btn btn-link text-danger p-0 border-0"
                            data-toggle="modal" data-target="#delete">
                        <i class="fas fa-trash-alt"></i>
                    </button>
            </div>

{{--        appel du modal--}}
            <x-modal-delete :taskId="$task->id"></x-modal-delete>
        @endforeach
    </div>


@endsection
