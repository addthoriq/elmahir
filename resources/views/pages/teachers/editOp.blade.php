{{-- Modal --}}
<div id="editOp" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">

                <h3 class="m-t-none m-b">Jadikan sebagai</h3>
                <p>Menjadikan {{$data->name}} sebagai Operator 1</p>
                <form method="POST" action="{{route('teacher.op',$data->id)}}" class="edit">
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
                    <div class="form-group">
                        <label>Sebagai *</label>
                        <input type="text" class="form-control" value="{{$op1->name}}" readonly>
                        <input type="hidden" name="role_id" class="form-control" value="{{$op1->id}}" readonly>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-sm btn-primary float-right m-t-n-xs"><i class="fa fa-plus"></i> Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
