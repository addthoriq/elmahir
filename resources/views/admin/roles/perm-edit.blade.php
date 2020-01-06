{{-- Modal --}}
<div id="{{$rl->slug}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="m-t-none m-b">Detail Peran</h3>
                <p>Peran berfungsi sebagai status User dan berpengaruh pada Hak Akses</p>
                <div class="basic-form">
                    <form method="POST" action="{{route('perm.ubah', $rl->id)}}" class="store">
                        @csrf
                        @method('PUT')
                            <div class="form-group">
                                @foreach ($perms as $p)
                                <div class="form-check form-check-inline">
                                    <label>
                                        <input type="checkbox" name="permissions[]" class="form-check-input" {{$rl->hasPermissions($p->slug)?'checked':''}} value="{{$p->id}}">
                                        {{$p->slug}}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        <div>
                            <button type="submit" class="btn btn-sm btn-primary float-right m-t-n-xs"><i class="fa fa-send"></i> Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
