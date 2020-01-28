<div class="modal fade" id="scoreModal">
    <div class="modal-dialog" role="document" style="max-width: 500px !important">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Nilai</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="task" action="{{route('answertask.update', $task->id)}}" class="wizard-big" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nilai *</label>
                        <input id="title" name="score" type="text" class="form-control" value="{{ $assessment ? $assessment->score : null }}">
                        <input type="hidden" name="taskId" value="{{ $task->id }}">
                        <input type="hidden" name="studentId" value="{{ $classHistory->student->id }}">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
                </form>
        </div>
    </div>
</div>