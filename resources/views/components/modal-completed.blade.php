@props(["taskId"])

<!-- Modal completed -->
<div class="modal fade" id="completed-{{ $taskId }}"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation de completion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Est-ce que vous certain de vouloir mettre la tâche en completé ?
            </div>
            <form method="POST" action="{{ route('task.update', $taskId) }}">
                @csrf
                @method("PATCH")
                <div class="modal-footer">
                    <button type="button" id="btnCompleted" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Completed</button>
                </div>
            </form>
        </div>
    </div>
</div>
