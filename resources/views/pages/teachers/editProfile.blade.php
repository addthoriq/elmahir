{{-- Modal --}}
<div id="editProfile" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">

                <h3 class="m-t-none m-b">Ubah profil Siswa</h3>
                <p>Mengubah data Informasi profil Siswa</p>
                <form method="POST" {{-- action="{{route('teacher.profile',$data->id)}}" --}} class="edit">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>NISN</label>
                                <input type="text" value="{{$data->nisn}}" name="nisn" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" value="{{isset($data->profileTeacher->nisn)?$data->profileTeacher->nisn:''}}" name="nik" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" value="{{$data->name}}" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" value="{{isset($data->profileTeacher->place_of_birth)?$data->profileTeacher->place_of_birth:''}}" name="place_of_birth" class="form-control">
                            </div>
                            <div class="form-group" id="data_1">
                                <label class="font-normal">Tanggal Lahir</label>
                                <div class="input-group date">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" name="date_of_birth" value="{{isset($data->profileTeacher->date_of_birth)?$data->profileTeacher->date_of_birth:''}}" class="form-control" placeholder="03/04/2014">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <div class="i-checks col-sm-6">
                                    <label>
                                        <input type="radio" value="L" name="gender" {{($data->gender == 'L')?'checked':''}} >
                                        <i></i>
                                        Laki-Laki
                                    </label>
                                </div>
                                <div class="i-checks col-sm-6">
                                    <label>
                                        <input type="radio" value="P" name="gender" {{($data->gender == 'P')?'checked':''}} >
                                        <i></i>
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tahun Masuk</label>
                                <input type="text" value="{{$data->start_year}}" name="start_year" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Pilih Agama </label>
                                <select class="form-control m-b" name="religion">
                                    <option value="{{isset($data->profileTeacher->religion)?$data->profileTeacher->religion:''}}">-- {{isset($data->profileTeacher->religion)?$data->profileTeacher->religion:'Pilih Agama'}} --</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" value="{{isset($data->profileTeacher->address)?$data->profileTeacher->address:''}}" name="address" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nomor Hp</label>
                                <input type="number" value="{{isset($data->profileTeacher->phone_number)?$data->profileTeacher->phone_number:''}}" name="phone_number" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <div class="i-checks col-sm-6">
                                    <label>
                                        <input type="radio" value="1" name="status" {{($data->status)?'checked':''}} >
                                        <i></i>
                                        Siswa
                                    </label>
                                </div>
                                <div class="i-checks col-sm-6">
                                    <label>
                                        <input type="radio" value="0" name="status" {{($data->status)?'':'checked'}} >
                                        <i></i>
                                        Alumni
                                    </label>
                                </div>
                            </div>
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
