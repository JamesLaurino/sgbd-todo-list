
<div>Ma todo liste</div>
<div>
    @foreach($tasks as $task)
        <p>{{$task->id}}</p>
        <p>{{$task->title}}</p>
        <br>
    @endforeach
</div>
