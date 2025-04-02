
<div>Ma todo liste</div>

<div>
    @if(session("success"))
        <p>{{session("success")}}</p>
    @endif
</div>

<form method="POST" action="{{route("task.store")}}">
    @csrf
    <input type="text" name="title" id="title" value="{{old('title', "ajouter une task")}}"
    />
    @error("title")
     {{$message}}
    @enderror
    <button type="submit">Ajouter</button>
</form>

<div>
    @foreach($tasks as $task)
        <div>
                <span>{{$task->title}}</span>
                <input type="checkbox" name="box" />
                <form method="POST" action="{{route("task.destroy", $task->id)}}">
                    @csrf
                    @method("DELETE")
                    <button>delete</button>
                </form>
                <br>
        </div>
    @endforeach
</div>
