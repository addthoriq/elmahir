<div id="edit" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">

                <h3 class="m-t-none m-b">Ubah Tahun Ajaran</h3>
                <p>Semester 1 adalah Tahun Pertama, Semester 2 adalah Tahun Kedua</p>
                <form method="POST" action="{{route('year.update',$data->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Tahun Pertama</label>
                        <input maxlength="4" id="yf" type="text" value="{{$data->start_year}}" name="start_year" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tahun Kedua</label>
                        <input maxlength="4" id="ys" type="text" value="{{$data->end_year}}" name="end_year" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <div class="col-sm-6">
                            <label>
                                <input type="radio" value="1" name="status" {{($data->status)?'checked':''}} >
                                Tahun saat ini
                            </label>
                        </div>
                        <div class="col-sm-6">
                            <label>
                                <input type="radio" value="0" name="status" {{($data->status)?'':'checked'}} >
                                Telah usai
                            </label>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-sm btn-primary float-right m-t-n-xs"><i class="fa fa-send"></i> Ubah</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
