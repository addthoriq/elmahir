{{-- Modal --}}
<div id="editProfile" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">

                <h3 class="m-t-none m-b">Ubah profil User</h3>
                <p>Mengubah data Informasi profil User</p>
                <form method="POST" action="{{route('user.update',$data->id)}}" class="edit">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label id="labelName" for="name">Nama</label>
                        <input id="name" type="text" value="{{$data->name}}" name="name" class="form-control">
                        <span id="noticeName"></span>
                    </div>
                    <div class="form-group">
                        <label>Sebagai </label>
                        <select class="form-control m-b" name="role_id">
                            <option value="{{$data->role_id}}">-- {{$data->role->name}} --</option>
                            @foreach ($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label id="labelEmail" for="email">Email</label>
                        <input id="email" type="email" value="{{$data->email}}" name="email" class="form-control">
                        <span id="textEmail"></span>
                    </div>
                    <div class="form-group">
                        <label id="labelPass">Password</label>
                        <input id="password" type="password" class="form-control">
                        <i class="text-muted">Password minimal 8 karakter</i>
                        <span id="textPassword"></span>
                    </div>
                    <div class="form-group">
                        <label id="konfirPass">Konfirmasi Password</label>
                        <input id="confirmation_password" type="password" name="password" class="form-control">
                        <i class="text-muted">Password minimal 8 karakter</i>
                        <span id="textCPassword"></span>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <div class="i-checks col-sm-6">
                            <label>
                                <input type="radio" value="1" name="status" {{($data->status)?'checked':''}} >
                                <i></i>
                                Aktif
                            </label>
                        </div>
                        <div class="i-checks col-sm-6">
                            <label>
                                <input type="radio" value="0" name="status" {{($data->status)?'':'checked'}} >
                                <i></i>
                                Tidak Aktif
                            </label>
                        </div>
                    </div>
                    <div>
                        <button type="submit" id="tombol" disabled class="btn btn-sm btn-primary float-right m-t-n-xs"><i class="fa fa-send"></i> Ubah</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
