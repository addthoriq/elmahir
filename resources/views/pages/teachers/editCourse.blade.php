{{-- Modal --}}
<div id="editClass" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">

                <h3 class="m-t-none m-b">Ubah Akun Login Siswa</h3>
                <p>Mengubah data Akun Login Siswa</p>
                <form method="POST" action="{{route('teacher.updateTeacherHis',$data->id)}}" class="edit">
                        @csrf
                        @method('PUT')
                        {{-- <div class="form-group">
                            <label id="labelClassroom" for="classroom_id">Kelas</label>
                            <select id="classroom_id" class="form-control m-b" name="classroom_id">
                                <option value="{{$data->classroom_id}}">-- {{$data->classroom->name}} --</option>
                                @foreach ($classroom as $class)
                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="form-group">
                            <label id="labelYearT" for="yearTeach">Tahun Ajaran</label>
                            <select id="yearTeach" class="form-control m-b" name="school_year_id">
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
                                    Masih mengajar
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
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
