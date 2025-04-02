
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
                <input type="checkbox" name="box" />
                <span>{{$task->title}}</span>
                <button>delete</button>
                <br>
        </div>
    @endforeach
</div>
