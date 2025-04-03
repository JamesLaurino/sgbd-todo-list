
@extends("base")
@section("title")
    Mon titre
@endsection

@section("custom-css")
    @vite(['resources/css/materialize-design.css'])
@endsection

@section("nav")
    <div class="container-fluid text-white d-flex justify-content-center bg-dark p-3">
        <p class="h3">Ma todo liste</p>
    </div>
@endsection

@section("body")
    <div>
        @if(session("success"))
            <div class="alert alert-success" role="alert">
                {{session("success")}}
            </div>
        @endif
    </div>

    <div class="container d-flex justify-content-center mt-5">
        <form method="POST" action="{{route('task.store')}}" class="form-inline shadow p-4">
            @csrf
            <div class="form-group mr-4">
{{--                <input type="text" id="title" name="title" class="form-control mr-2" required placeholder="Nom">--}}
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

    <div class="container d-flex flex-column align-items-center mt-5">
        @foreach($tasks as $task)
            <div class="d-flex align-items-center justify-content-between w-50 border p-3 shadow rounded mb-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="task-{{$task->id}}" name="box">
                    <label class="custom-control-label" for="task-{{$task->id}}"></label>
                </div>

                <span class="flex-grow-1">{{$task->title}}</span>

                <form method="POST" action="{{ route('task.destroy', $task->id) }}"
                      onsubmit="return confirm('Voulez-vous vraiment supprimer cette tâche ?');">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-link text-danger p-0 border-0">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </div>
        @endforeach
    </div>



@endsection
