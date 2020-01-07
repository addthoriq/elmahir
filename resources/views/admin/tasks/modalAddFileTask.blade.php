<div class="modal fade" id="fileModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah File Tugas</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form id="file" action="{{route('task.addFile', $task->id)}}" class="wizard-big" method="POST" enctype="multipart/form-data">
                @csrf
                @if (Request::is('task/*/detail'))
                    <input type="hidden" name="fileId" value="{{ $files->id }}">
                @else
                    <input type="hidden" name="TaskId" value="{{ $task->id }}">
                @endif
            <div class="modal-body" id="app">
                <div class="row" v-for="n in file" :key="index">
                    <div class="col-md-10">
                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                          <div class="form-control" data-trigger="fileinput">
                            <span class="fileinput-filename"></span>
                          </div>
                          <span class="input-group-append">
                            <span class="input-group-text fileinput-exists" data-dismiss="fileinput">
                              Remove
                            </span>

                            <span class="input-group-text btn-file">
                              <span class="fileinput-new">Select file</span>
                              <span class="fileinput-exists">Change</span>
                              <input type="file" name="file[]" multiple>
                            </span>
                          </span>
                        </div>    
                    </div>
                    <div class="col-md-1">
                        <button type="button" @click="delfile()" class="btn btn-danger btn-sm">Hapus</button>
                    </div>
                </div>
                
                
                <button type="button" @click="addfile()" class="btn btn-primary btn-sm">Tambah</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>