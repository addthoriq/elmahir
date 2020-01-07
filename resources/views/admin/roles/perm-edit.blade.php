{{-- Modal --}}
<div id="{{$pr->slug}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="m-t-none m-b">Detail Hak Akses</h3>
                <p>Hak Akses berfungsi sebagai akses Halaman</p>
                <div class="basic-form">
                    <form method="POST" action="{{route('perm.ubah', $pr->id)}}" class="store">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Hak Akses</label>
                            <input type="text" name="name" value="{{$pr->name}}" class="form-control">
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
