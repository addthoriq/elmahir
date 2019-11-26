{{-- Modal --}}
<div id="editAvatar" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">

                <h3 class="m-t-none m-b">Ubah profil User</h3>
                <p>Mengubah Poto Profil User</p>

                <div class="text-center">
                    <div class="m-b-sm">
                        @if ($data->avatar)
                            <img alt="image" class="rounded-circle" src="{{Storage::url($data->avatar)}}" width="100px" height="100px">
                        @else
                            <img alt="image" class="rounded-circle" src="{{Avatar::create($data->name)->toBase64()}}">
                        @endif
                    </div>
                </div>

                <form method="POST" action="{{route('teacher.ava',$data->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Ubah Poto Profil</label>
                        <div class="custom-file">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                              <div class="fileinput-new img-thumbnail" style="max-width:100%">
                                <img src="{{Storage::url($data->avatar)}}" style="max-width:100%">
                              </div>
                              <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 200px;"></div>
                              <div>
                                <span class="btn btn-outline-secondary btn-file">
                                    <span class="fileinput-new">Pilih Gambar</span>
                                    <span class="fileinput-exists">Ubah</span>
                                    <input type="file" name="avatar">
                                </span>
                                <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Hapus</a>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-sm btn-primary float-right m-t-n-xs"><i class="fa fa-send"></i> Ubah</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
