{{-- Modal --}}
<div id="edit" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">

                <h3 class="m-t-none m-b">Ubah profil User</h3>
                <p>Mengubah data Informasi profil User</p>
                <form method="POST" action="{{route('classroom.update',$data->id)}}" class="edit">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama Kelas</label>
                        <input type="text" value="{{$data->name}}" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Wali Kelas</label>
                        <input type="text" value="{{$data->user->name}}" name="user_id" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Kapasitas Kelas</label>
                        <input type="number" value="{{$data->max_student}}" name="max_student" class="form-control">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-sm btn-primary float-right m-t-n-xs"><i class="fa fa-send"></i> Ubah</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
