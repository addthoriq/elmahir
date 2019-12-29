{{-- Modal --}}
<div id="editAccount" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">

                <h3 class="m-t-none m-b">Ubah Akun Login Guru</h3>
                <p>Mengubah data Akun Login Guru</p>
                <form method="POST" action="{{route('teacher.update',$data->id)}}" class="edit">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="email" id="labelEmail">Email</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-at"></i></span>
                            </div>
                            <input required id="email" value="{{$data->email}}" name="email" type="text" class="form-control">
                        </div>
                        <span id="textEmail" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="password" id="labelPass">Password</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input id="password" name="password" type="password" class="form-control">
                        </div>
                        <i class="text-muted">Password minimal 8 karakter</i>
                        <span id="textPassword" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="confirmation_password" id="konfirPass">Konfirmasi Password</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input required id="confirmation_password" name="password" type="password" class="form-control {{$errors->has('confirmation_password')?"border border-danger":""}}">
                        </div>
                        <i class="text-muted">Password minimal 8 karakter</i>
                        <span id="textCPassword"></span>
                    </div>
                    <div>
                        <button id="tombol" type="submit" class="btn btn-sm btn-primary float-right m-t-n-xs">
                            <i class="fa fa-send"></i> Ubah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
