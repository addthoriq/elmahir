<div class="modal inmodal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Input Bab Baru</h4>
                <h5>Mapel {{ $course->name }}</h5>
            </div>
            <div class="modal-body">
                <form id="form" action="{{route('chapter.store')}}" class="wizard-big" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Judul Bab *</label>
                        <input id="nisn" name="title" type="text" class="form-control ">
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi *</label>
                        <textarea name="summary" class="form-control" rows="8"></textarea>
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