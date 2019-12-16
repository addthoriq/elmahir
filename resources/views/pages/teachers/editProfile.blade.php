{{-- Modal --}}
<div id="editProfile" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">

                <h3 class="m-t-none m-b">Ubah profil Guru</h3>
                <p>Mengubah data Informasi profil Guru</p>
                <form method="POST" action="{{route('teacher.profile',$data->id)}}" class="edit">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-6">
                            @isset($data->nip)
                                <div class="form-group">
                                    <label id="labelNip" for="nisn">NIP</label>
                                    <input id="nip" type="text" value="{{$data->nip}}" name="nip" class="form-control" readonly>
                                    <span id="noticeNip"></span>
                                </div>
                            @endisset
                            @empty ($data->nip)
                            <div class="form-group">
                                <label id="labelNip" for="nisn">NIP</label>
                                <input id="nip" type="text" value="{{$data->nip}}" name="nip" class="form-control">
                                <span id="noticeNip"></span>
                            </div>
                            @endempty
                            @isset($data->profileTeacher->nik)
                                <div class="form-group">
                                    <label id="labelNik" for="nik">NIK</label>
                                    <input id="nik" type="text" value="{{isset($data->profileTeacher->nik)?$data->profileTeacher->nik:''}}" name="nik" class="form-control" readonly>
                                    <span id="noticeNik"></span>
                                </div>
                            @endisset
                            @empty ($data->profileTeacher->nik)
                                <div class="form-group">
                                    <label id="labelNik" for="nik">NIK</label>
                                    <input id="nik" type="text" value="{{isset($data->profileTeacher->nik)?$data->profileTeacher->nik:''}}" name="nik" class="form-control">
                                    <span id="noticeNik"></span>
                                </div>
                            @endempty
                            <div class="form-group">
                                <label id="labelName" for="name">Nama</label>
                                <input id="name" type="text" value="{{$data->name}}" name="name" class="form-control">
                                <span id="noticeName"></span>
                            </div>
                            <div class="form-group">
                                <label id="labelTtl" for="ttl">Tempat Lahir</label>
                                <input id="ttl" type="text" value="{{isset($data->profileTeacher->place_of_birth)?$data->profileTeacher->place_of_birth:''}}" name="place_of_birth" class="form-control">
                                <span id="noticeTtl"></span>
                            </div>
                            <div class="form-group" id="data_1">
                                <label id="labelDate" class="font-normal">Tanggal Lahir</label>
                                <div class="input-group date">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" name="date_of_birth" value="{{isset($data->profileTeacher->date_of_birth)?$data->profileTeacher->date_of_birth:''}}" class="form-control" placeholder="07/24/1980">
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
                                <label id="labelYear" for="year">Tahun Masuk</label>
                                <input id="year" type="text" value="{{$data->start_year}}" name="start_year" class="form-control">
                                <span id="noticeYear"></span>
                            </div>
                            <div class="form-group">
                                <label id="labelReligion">Agama </label>
                                <select id="religion" class="form-control m-b" name="religion">
                                    <option selected value="{{isset($data->profileTeacher->religion)?$data->profileTeacher->religion:''}}">-- {{isset($data->profileTeacher->religion)?$data->profileTeacher->religion:'Pilih Agama'}} --</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label id="labelAddress" for="address">Alamat</label>
                                <input id="address" type="text" value="{{isset($data->profileTeacher->address)?$data->profileTeacher->address:''}}" name="address" class="form-control">
                                <span id="noticeAddress"></span>
                            </div>
                            <div class="form-group">
                                <label id="labelPhone" for="phone">Nomor Hp</label>
                                <input id="phone" type="number" value="{{isset($data->profileTeacher->phone_number)?$data->profileTeacher->phone_number:''}}" name="phone_number" class="form-control">
                                <span id="noticePhone"></span>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <div class="i-checks col-sm-6">
                                    <label>
                                        <input type="radio" value="1" name="status" {{($data->status)?'checked':''}} >
                                        <i></i>
                                        Pengajar Aktif
                                    </label>
                                </div>
                                <div class="i-checks col-sm-6">
                                    <label>
                                        <input type="radio" value="0" name="status" {{($data->status)?'':'checked'}} >
                                        <i></i>
                                        Berhenti
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button id="tombol1" type="submit" disabled class="btn btn-sm btn-primary float-right m-t-n-xs"><i class="fa fa-send"></i> Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
