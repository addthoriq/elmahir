{{-- Modal --}}
<div id="{{$rl->slug}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="m-t-none m-b">Detail Peran</h3>
                <p>Peran berfungsi sebagai status User dan berpengaruh pada Hak Akses</p>
                <form method="POST" action="{{route('role.update', $rl->id)}}" class="store">
                    @csrf
                    @method('PUT')
                        <p>{{$rl->permissions()->name}}</p>
                    <div>
                        <button type="submit" class="btn btn-sm btn-primary float-right m-t-n-xs"><i class="fa fa-send"></i> Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
