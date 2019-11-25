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
                        <input id="email" type="text" value="{{$data->email}}" name="email" class="form-control">
                        <span id="textEmail" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="password" id="labelPass">Password</label>
                        <input id="password" type="password" class="form-control">
                        <i class="text-muted">Password minimal 8 karakter</i>
                        <span id="textPassword" class="text-danger">
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="confirmation_password" id="konfirPass">Konfirmasi Password</label>
                        <input id="confirmation_password" type="password" name="password" class="form-control">
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
