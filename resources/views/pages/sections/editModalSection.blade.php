<div class="modal inmodal fade" id="materiModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
            <div class="modal-header py-2">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <div class="d-flex justify-content-start pl-2 align-items-start flex-column">
                    <h4 class="modal-title text-align-left">Edit Materi</h4>
                    <h5>{{ $section->title }}</h5>
                </div>
            </div>
            <div class="modal-body">
                <form id="form" action="{{route('section.update', $section->id)}}" class="wizard-big" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Judul Materi *</label>
                        <input id="title" name="title" type="text" class="form-control" value="{{ $section->title }}">
                        @if (Request::is('section/*/home'))
                            <input type="hidden" name="sectionId" value="{{ $section->id }}">
                        @else
                            <input type="hidden" name="fileId" value="{{ $files->id }}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Deskripsi *</label>
                        <textarea name="description" class="form-control" rows="3">{{ $section->description }}</textarea>
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