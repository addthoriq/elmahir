<div id="edit" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">

                <h3 class="m-t-none m-b">Ubah Tahun Ajar</h3>
                <p>Semester 1 adalah Tahun Pertama, Semester 2 adalah Tahun Kedua</p>
                <form method="POST" action="{{route('year.update',$data->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Tahun Pertama</label>
                        <input type="number" value="{{$data->start_year}}" name="start_year" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tahun Kedua</label>
                        <input type="number" value="{{$data->end_year}}" name="end_year" class="form-control">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-sm btn-primary float-right m-t-n-xs"><i class="fa fa-send"></i> Ubah</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
