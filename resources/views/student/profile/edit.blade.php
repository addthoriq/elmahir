<div class="modal fade" role="dialog" id="edit">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <ul class="nav nav-pills" id="myTab3" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Poto Profil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Informasi Akun</a>
              </li>
          </ul>
          <div class="tab-content" id="myTabContent2">
            <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                <div class="text-center">
                    <div class="m-b-sm">
                        @if ($data->avatar)
                            <img alt="image" class="rounded-circle" src="{{Storage::url($data->avatar)}}" width="100px" height="100px">
                        @else
                            <img alt="image" class="rounded-circle" src="{{Avatar::create($data->name)->toBase64()}}">
                        @endif
                    </div>
                </div>
                <form method="POST" action="{{route('spr.ava')}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Ubah Poto Profil</label>
                        <div class="custom-file">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                              <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 200px;"></div>
                              <div>
                                <span class="btn btn-outline-secondary btn-file">
                                    <span class="fileinput-new">Pilih Gambar</span>
                                    <span class="fileinput-exists">Ubah</span>
                                    <input type="file" accept="image/*" name="avatar">
                                </span>
                                <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Hapus</a>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-icon icon-left btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                <form action="{{route('spr.update')}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="labelName" for="name">Nama</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                    <input id="name" type="text" class="form-control" value="{{Auth::user()->name}}" name="name">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="labelEmail" for="email">Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                    </div>
                                    <input id="email" type="email" class="form-control" value="{{Auth::user()->email}}" name="email">
                                </div>
                                <span id="textEmail" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="labelPass" for="password">Password (Kosongkan Password jika tidak diganti)</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password">
                                </div>
                                <i class="text-muted">Password minimal 8 karakter</i>
                                <span id="textPassword" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label id="konfirPass" for="confirmation_password">Konfirmasi Password</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                  </div>
                                </div>
                                <input id="confirmation_password" type="password" class="form-control" name="confirmation_password">
                              </div>
                              <i class="text-muted">Password minimal 8 karakter</i>
                              <span id="textCPassword"></span>
                            </div>
                        </div>
                    </div>
                </form>
                <button type="submit" class="btn btn-icon icon-left btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
