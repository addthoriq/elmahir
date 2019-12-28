{{-- Modal --}}
<div id="editProfile" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
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
                            @isset($data->profileUser->nik)
                                <div class="form-group">
                                    <label id="labelNik" for="nik">NIK</label>
                                    <input id="nik" type="text" value="{{isset($data->profileUser->nik)?$data->profileUser->nik:''}}" name="nik" class="form-control" readonly>
                                    <span id="noticeNik"></span>
                                </div>
                            @endisset
                        @empty ($data->profileUser->nik)
                                <div class="form-group">
                                    <label id="labelNik" for="nik">NIK</label>
                                    <input required id="nik" maxlength="16" type="text" value="{{isset($data->profileUser->nik)?$data->profileUser->nik:''}}" name="nik" class="form-control">
                                    <span id="noticeNik"></span>
                                </div>
                            @endempty
                            <div class="form-group">
                                <label id="labelName" for="name">Nama</label>
                                <input required id="name" type="text" value="{{$data->name}}" name="name" class="form-control">
                                <span id="noticeName"></span>
                            </div>
                            <div class="form-group">
                                <label id="labelTtl" for="ttl">Tempat Lahir</label>
                                <input required id="ttl" type="text" value="{{isset($data->profileUser->place_of_birth)?$data->profileUser->place_of_birth:''}}" name="place_of_birth" class="form-control">
                                <span id="noticeTtl"></span>
                            </div>
                            <div class="form-group">
                              <label>Tanggal Lahir</label>
                              <input required type="text" name="date_of_birth" placeholder="07/24/1980" value="{{isset($data->profileUser->date_of_birth)?$data->profileUser->date_of_birth:''}}" class="form-control datepicker">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Jenis Kelamin</label>
                                <div class="selectgroup w-100">
                                  <label class="selectgroup-item">
                                    <input required type="radio" name="gender" value="L" class="selectgroup-input" {{($data->gender == 'L')?'checked':''}}>
                                    <span class="selectgroup-button">Laki-laki</span>
                                  </label>
                                  <label class="selectgroup-item">
                                    <input required type="radio" name="gender" value="P" class="selectgroup-input" {{($data->gender == 'P')?'checked':''}}>
                                    <span class="selectgroup-button">Perempuan</span>
                                  </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="labelYear" for="year">Tahun Masuk</label>
                                <input required id="year" type="text" value="{{$data->start_year}}" name="start_year" class="form-control">
                                <span id="noticeYear"></span>
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
                                <input required id="address" type="text" value="{{isset($data->profileUser->address)?$data->profileUser->address:''}}" name="address" class="form-control">
                                <span id="noticeAddress"></span>
                            </div>
                            <div class="form-group">
                                <label id="labelPhone" for="phone">Nomor Hp</label>
                                <input required id="phone" type="text" maxlength="15" value="{{isset($data->profileUser->phone_number)?$data->profileUser->phone_number:''}}" name="phone_number" class="form-control">
                                <span id="noticePhone"></span>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <div class="selectgroup w-100">
                                  <label class="selectgroup-item">
                                    <input required type="radio" name="status" value="1" class="selectgroup-input" {{($data->status)?'checked':''}}>
                                    <span class="selectgroup-button">Aktif</span>
                                  </label>
                                  <label class="selectgroup-item">
                                    <input required type="radio" name="status" value="0" class="selectgroup-input" {{($data->status)?'':'checked'}}>
                                    <span class="selectgroup-button">Berhenti</span>
                                  </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button id="tombol1" type="submit" class="btn btn-sm btn-primary float-right m-t-n-xs"><i class="fa fa-send"></i> Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
