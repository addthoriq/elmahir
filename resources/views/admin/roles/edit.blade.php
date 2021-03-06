{{-- Modal --}}
<div id="{{$rl->slug}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <h3 class="m-t-none m-b">Detail Peran</h3>
                <p>Peran berfungsi sebagai status User dan berpengaruh pada Hak Akses</p>
                <form method="POST" action="{{route('role.update', $rl->id)}}" class="store">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Peran</label>
                        <input type="text" name="name" value="{{$rl->name}}" class="form-control">
                    </div>
                    <label>Hak Akses</label>
                    <div class="form-group row" style="margin:auto 0px">
                        @foreach ($perms as $p)
                        <div class="col-sm-4 form-check form-check-inline" style="margin: 3px auto">
                            <label class="form-check-label">
                                <input type="checkbox" name="permissions[]" class="form-check-input" {{$rl->hasPermissions($p->slug)?'checked':''}} value="{{$p->id}}">
                                {{$p->name}}
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
