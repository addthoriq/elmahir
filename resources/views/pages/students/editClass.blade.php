{{-- Modal --}}
<div id="editClass" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">

                <h3 class="m-t-none m-b">Ubah Akun Login Siswa</h3>
                <p>Mengubah data Akun Login Siswa</p>
                <form method="POST" action="{{route('student.updateClassHis',$data->id)}}" class="edit">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Kelas *</label>
                        <select class="form-control m-b" name="class_id">
                            <option value="{{$histories->classroom->id}}">-- {{$histories->classroom->name}} --</option>
                            @foreach ($classroom as $class)
                                <option value="{{$class->id}}">{{$class->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tahun Ajaran *</label>
                        <select class="form-control m-b" name="school_year_id">
                            <option value="{{$histories->school_year->id}}">-- {{$histories->school_year->start_year}}/{{$histories->school_year->end_year}} --</option>
                            @foreach ($years as $year)
                                <option value="{{$year->id}}">{{$year->start_year}}/{{$year->end_year}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status Kelas</label>
                        <div class="i-checks col-sm-6">
                            <label>
                                <input type="radio" value="1" name="status" {{($histories->status)?'checked':''}} >
                                <i></i>
                                Kelas Saat Ini
                            </label>
                        </div>
                        <div class="i-checks col-sm-6">
                            <label>
                                <input type="radio" value="0" name="status" {{($histories->status)?'':'checked'}} >
                                <i></i>
                                Telah Selesai
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
