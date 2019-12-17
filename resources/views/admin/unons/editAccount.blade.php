{{-- Modal --}}
<div id="editAccount" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">

                <h3 class="m-t-none m-b">Ubah Akun Login Guru</h3>
                <p>Mengubah data Akun Login Guru</p>
                <form method="POST" action="{{route('unon.update',$data->id)}}" class="edit">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" value="{{$data->email}}" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-sm btn-primary float-right m-t-n-xs"><i class="fa fa-send"></i> Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
