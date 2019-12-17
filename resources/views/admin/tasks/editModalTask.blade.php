<div class="modal inmodal fade" id="taskModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
            <div class="modal-header py-2">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <div class="d-flex justify-content-start pl-2 align-items-start flex-column">
                    <h4 class="modal-title text-align-left">Edit Bab</h4>
                    <h5>Mapel {{ $task->title }}</h5>
                </div>
            </div>
            <div class="modal-body">
                <form id="form" action="{{route('task.update', $task->id)}}" class="wizard-big" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label>Judul Bab *</label>
                                <input id="title" name="title" type="text" class="form-control" value="{{ $task->title }}">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi *</label>
                                <textarea name="description" class="form-control" rows="5">{{ $task->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group" id="data_1">
                                <label class="font-normal">Tanggal Mulai</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" name="start_periode" value="{{ $task->start_periode }}">
                                </div>        
                            </div>
                            <div class="form-group" id="data_2">
                                <label class="font-normal">Tanggal Selesai</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" name="end_periode" value="{{ $task->end_periode }}">
                                </div>
                            </div>
                        </div>
                    </div>
            <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            </div>
                </form>
            </div>
        </div>
    </div>
</div>