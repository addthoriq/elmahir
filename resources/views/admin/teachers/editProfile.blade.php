{{-- Modal --}}
<div id="editProfile" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">

                <h3 class="m-t-none m-b">Ubah profil Pengajar</h3>
                <p>Mengubah data Informasi profil {{$data->name}}</p>
                <form method="POST" action="{{route('teacher.profile',$data->id)}}" class="edit">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-6">
                            @isset($data->nip)
                                <div class="form-group">
                                    <label id="labelNip" for="nip">Nomor Induk Pegawai (NIP)</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-id-card"></i></span></div>
                                        <input required readonly id="nip" name="nip" type="text" value="{{$data->nip}}" class="form-control">
                                    </div>
                                    <i id="noticeNip"></i>
                                </div>
                            @endisset
                            @empty ($data->nip)
                                <div class="form-group">
                                    <label id="labelNip" for="nip">Nomor Induk Pegawai (NIP)</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-id-card"></i></span></div>
                                        <input required id="nip" name="nip" type="text" value="{{$data->nip}}" class="form-control">
                                    </div>
                                    <i id="noticeNip"></i>
                                </div>
                            @endempty
                            @isset($data->profileTeacher->nik)
                                <div class="form-group">
                                    <label id="labelNik" for="nik">Nomor Induk Kependudukan (NIK)</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-address-card"></i></span></div>
                                        <input required readonly id="nik" type="text" value="{{isset($data->profileTeacher->nik)?$data->profileTeacher->nik:''}}" name="nik" class="form-control">
                                    </div>
                                    <i id="noticeNik"></i>
                                </div>
                            @endisset
                            @empty ($data->profileTeacher->nik)
                                <div class="form-group">
                                    <label id="labelNip" for="nik">Nomor Induk Kependudukan (NIK)</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-address-card"></i></span></div>
                                        <input required id="nik" type="text" value="{{isset($data->profileTeacher->nik)?$data->profileTeacher->nik:''}}" name="nik" class="form-control">
                                    </div>
                                    <i id="noticeNik"></i>
                                </div>
                            @endempty
                            <div class="form-group">
                                <label id="labelName" for="name">Nama</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                                    <input required id="name" value="{{$data->name}}" name="name" type="text" class="form-control">
                                </div>
                                <i id="noticeName"></i>
                            </div>
                            <div class="form-group">
                                <label id="labelTtl" for="ttl">Tempat Lahir</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-thumbtack"></i></span></div>
                                    <input id="ttl" type="text" value="{{isset($data->profileTeacher->place_of_birth)?$data->profileTeacher->place_of_birth:''}}" name="place_of_birth" class="form-control">
                                </div>
                                <i id="noticeTtl"></i>
                            </div>
                            <div class="form-group">
                                <label id="labelDate" class="font-normal">Tanggal Lahir</label>
                                <div class="input-group">
                                    <span class="input-group-append"><span class="input-group-text"><i class="fas fa-calendar-alt"></i></span></span>
                                    <input type="text" class="form-control" value="{{isset($data->profileTeacher->date_of_birth)?$data->profileTeacher->date_of_birth:''}}" id="datepicker-autoclose" placeholder="07/24/1980" name="date_of_birth">
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
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="labelSYear">Tahun Masuk</label>
                                <input required id="start_year" value="{{$data->start_year}}" maxlength="4" name="start_year" type="text" maxlength="4" class="form-control">
                                <i id="noticeSYear"></i>
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
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span></div>
                                    <input required id="address" type="text" value="{{isset($data->profileTeacher->address)?$data->profileTeacher->address:''}}" name="address" class="form-control">
                                </div>
                                <i id="noticeAddress"></i>
                            </div>
                            <div class="form-group">
                                <label id="labelPhone" for="phone">Nomor Hp</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-phone"></i></span></div>
                                    <input required id="phone" type="number" value="{{isset($data->profileTeacher->phone_number)?$data->profileTeacher->phone_number:''}}" name="phone_number" class="form-control">
                                </div>
                                <i id="noticePhone"></i>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <div class="i-checks col-sm-6">
                                    <label>
                                        <input type="radio" value="1" name="status" {{($data->status)?'checked':''}} >
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
                        <button type="submit" class="btn btn-sm btn-primary float-right m-t-n-xs"><i class="fa fa-send"></i> Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
