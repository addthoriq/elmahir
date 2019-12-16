<div class="modal inmodal fade" id="babModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
            <div class="modal-header py-2">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <div class="d-flex justify-content-start pl-2 align-items-start flex-column">
                    <h4 class="modal-title text-align-left">Edit Bab</h4>
                    <h5>Mapel {{ $chapter->course->name }}</h5>
                </div>
            </div>
            <div class="modal-body">
                <form id="form" action="{{route('chapter.update', $chapter->id)}}" class="wizard-big" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Judul Bab *</label>
                        <input id="nisn" name="title" type="text" class="form-control" value="{{ $chapter->title }}">
                        <input type="hidden" name="course_id" value="{{ $chapter->course->id }}">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi *</label>
                        <textarea name="summary" class="form-control" rows="5">{{ $chapter->summary }}</textarea>
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