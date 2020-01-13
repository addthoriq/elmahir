{{-- Modal --}}
<div id="editProfile" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">

                <h3 class="m-t-none m-b">Profil Elearning</h3>
                <p>Mengubah Informasi pribadi</p>
                <form method="POST" action="{{route('profile.profile',$data->id)}}" class="edit">
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
                            @isset($data->profileUser->nik)
                                <div class="form-group">
                                    <label id="labelNik" for="nik">Nomor Induk Kependudukan (NIK)</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-address-card"></i></span></div>
                                        <input required readonly id="nik" type="text" maxlength="16" value="{{isset($data->profileUser->nik)?$data->profileUser->nik:''}}" name="nik" class="form-control">
                                    </div>
                                    <i id="noticeNik"></i>
                                </div>
                            @endisset
                        @empty ($data->profileUser->nik)
                                <div class="form-group">
                                    <label id="labelNip" for="nik">Nomor Induk Kependudukan (NIK)</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-address-card"></i></span></div>
                                        <input required id="nik" type="text" maxlength="16" value="{{isset($data->profileUser->nik)?$data->profileUser->nik:''}}" name="nik" class="form-control">
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
                                    <input id="ttl" type="text" value="{{isset($data->profileUser->place_of_birth)?$data->profileUser->place_of_birth:''}}" name="place_of_birth" class="form-control">
                                </div>
                                <i id="noticeTtl"></i>
                            </div>
                            <div class="form-group">
                                <label id="labelDate" class="font-normal">Tanggal Lahir</label>
                                <div class="input-group">
                                    <span class="input-group-append"><span class="input-group-text"><i class="fas fa-calendar-alt"></i></span></span>
                                    <input type="text" class="form-control" id="mdate" value="{{isset($data->profileUser->date_of_birth)?$data->profileUser->date_of_birth:''}}" placeholder="07/24/1980" name="date_of_birth">
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
                                    <option selected value="{{isset($data->profileUser->religion)?$data->profileUser->religion:''}}">-- {{isset($data->profileUser->religion)?$data->profileUser->religion:'Pilih Agama'}} --</option>
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
                                    <input required id="address" type="text" value="{{isset($data->profileUser->address)?$data->profileUser->address:''}}" name="address" class="form-control">
                                </div>
                                <i id="noticeAddress"></i>
                            </div>
                            <div class="form-group">
                                <label id="labelPhone" for="phone">Nomor Hp</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-phone"></i></span></div>
                                    <input required id="phone" type="number" maxlength="12" value="{{isset($data->profileUser->phone_number)?$data->profileUser->phone_number:''}}" name="phone_number" class="form-control">
                                </div>
                                <i id="noticePhone"></i>
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
