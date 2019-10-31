{{-- Modal --}}
<div id="store" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">

                <h3 class="m-t-none m-b">Tambah Tahun Ajar</h3>
                <p>Semester 1 adalah Tahun Pertama, Semester 2 adalah Tahun Kedua</p>
                <form method="POST" action="{{route('year.store')}}" class="store">
                    @csrf
                    <div class="form-group">
                        <label>Tahun Pertama</label>
                        <input type="number" placeholder="Contoh: 2019" name="start_year" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tahun Kedua</label>
                        <input type="number" placeholder="Contoh: 2020" name="end_year" class="form-control">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-sm btn-primary float-right m-t-n-xs"><i class="fa fa-send"></i> Tambah</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
