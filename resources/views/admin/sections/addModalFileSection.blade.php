<div class="modal inmodal fade" id="fileModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
            <div class="modal-header py-2">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <div class="d-flex justify-content-start pl-2 align-items-start flex-column">
                    <h4 class="modal-title text-align-left">Tambah File Materi</h4>
                    <h5>{{ $section->title }}</h5>
                </div>
            </div>
            <div class="modal-body">
                <form id="form" action="{{route('section.addFile', $section->id)}}" class="wizard-big" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row boxs">
                        <div class="col-md-12">
                            <h3>Multiple File Upload</h3>
                            <p>Meng-upload beberapa files sekaligus.</p>
                            <label for="email">File  *</label>
                            <div class="erase">
                                <div class="row bg-muted p-2">
                                    <div class="col-md-10">
                                        <div class="fileinput fileinput-new m-0" data-provides="fileinput">
                                            <span class="btn btn-default btn-file"><span class="fileinput-new">Pilih File...</span>
                                            <span class="fileinput-exists">Ubah</span><input type="file" name="file[]"/></span>
                                            <span class="fileinput-filename"></span>
                                            <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>
                                        </div> 
                                    </div>
                                </div>
                            </div>

                            <div class="my-3">
                                <button type="button" class="btn btn-success btn-sm" id="add">
                                    <i class="fa fa-plus"></i> Tambah
                                </button>
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