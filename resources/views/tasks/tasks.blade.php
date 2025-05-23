
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

{{-- Supprimer - completed a Task--}}
    <div class="container d-flex flex-column align-items-center mt-5">
        @foreach($tasks as $task)
            @if($task->completed == false)
                <div class="d-flex align-items-center justify-content-between w-50 border p-3 shadow rounded mb-2">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class=" custom-control-input" id="task-{{$task->id}}" name="box">
                            <label class="custom-control-label" for="task-{{$task->id}}"></label>
                        </div>
                    <span class="flex-grow-1">{{$task->title}}</span>
                    <button class="btnModal btn btn-link text-success p-0 border-0 mr-2"
                             data-target="#completed-{{ $task->id }}">
                        <i class="fas fa-check"></i>
                    </button>
                    <button class="btnModal btn btn-link text-danger p-0 border-0"
                             data-target="#delete-{{ $task->id }}">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>

            @else
                <div class="d-flex align-items-center justify-content-between w-50 border p-3 shadow rounded mb-2">
                    <s><span class="flex-grow-1">{{$task->title}}</span></s>
                    <button class="btnModal btn btn-link text-danger p-0 border-0"
                             data-target="#delete-{{ $task->id }}">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>

            @endif

            {{-- appel du modal complete --}}
            <x-modal-completed :taskId="$task->id"></x-modal-completed>

            {{--  appel du modal delete --}}
            <x-modal-delete :taskId="$task->id"></x-modal-delete>
        @endforeach
    </div>


<script>
        document.querySelectorAll(".btnModal").forEach(function(button) {
            button.addEventListener('click', function (e) {
                e.preventDefault();

                const taskContainer = this.closest('.d-flex');
                const checkbox = taskContainer.querySelector('input[type="checkbox"]');

                if (!checkbox || checkbox.checked) {
                    const target = this.getAttribute('data-target');
                    $(target).modal('show');
                } else {
                    alert("Veuillez cocher la tâche avant de continuer.");
                }
            });
        });


        document.getElementById("btnCompleted").addEventListener("click", function() {
            window.history.back();
        });
</script>
@endsection

