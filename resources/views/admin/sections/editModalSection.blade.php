<div class="modal fade" id="materiModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Materi</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="section" action="{{route('section.update', $section->id)}}" class="wizard-big" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Judul Materi *</label>
                        <input id="title" name="title" type="text" class="form-control" value="{{ $section->title }}">
                        @if (Request::is('section/*'))
                            <input type="hidden" name="sectionId" value="{{ $section->id }}">
                        @else
                            <input type="hidden" name="fileId" value="{{ $files->id }}">
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Deskripsi *</label>
                        <textarea name="description" class="form-control" rows="3">{{ $section->description }}</textarea>
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