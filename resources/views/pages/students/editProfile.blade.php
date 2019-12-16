{{-- Modal --}}
<div id="editProfile" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">

                <h3 class="m-t-none m-b">Ubah profil Siswa</h3>
                <p>Mengubah data Informasi profil Siswa</p>
                <form method="POST" action="{{route('student.profile',$data->id)}}" class="edit">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-6">
                            @isset($data->nisn)
                                <div class="form-group">
                                    <label for="nisn" id="labelNisn">NISN</label>
                                    <input id="nisn" type="text" maxlength="15" value="{{$data->nisn}}" name="nisn" class="form-control" readonly>
                                    <span id="noticeNisn"></span>
                                </div>
                            @endisset
                            @empty ($data->nisn)
                            <div class="form-group">
                                <label for="nisn" id="labelNisn">NISN</label>
                                <input id="nisn" type="text" maxlength="15" value="{{$data->nisn}}" name="nisn" class="form-control">
                                <span id="noticeNisn"></span>
                            </div>
                            @endempty
                            @isset($data->profileStudent->nik)
                                <div class="form-group">
                                    <label id="labelNik" for="nik">NIK</label>
                                    <input id="nik" type="text" maxlength="16" value="{{isset($data->profileStudent->nik)?$data->profileStudent->nik:''}}" name="nik" class="form-control" readonly>
                                    <span id="noticeNik"></span>
                                </div>
                            @endisset
                            @empty ($data->profileStudent->nik)
                                <div class="form-group">
                                    <label id="labelNik" for="nik">NIK</label>
                                    <input id="nik" type="text" maxlength="16" value="{{isset($data->profileStudent->nik)?$data->profileStudent->nik:''}}" name="nik" class="form-control">
                                    <span id="noticeNik"></span>
                                </div>
                            @endempty
                            <div class="form-group">
                                <label id="labelName" for="name">Nama</label>
                                <input id="name" type="text" value="{{$data->name}}" name="name" class="form-control">
                                <span id="noticeName"></span>
                            </div>
                            <div class="form-group">
                                <label for="labelTtl">Tempat Lahir</label>
                                <input id="ttl" type="text" value="{{isset($data->profileStudent->place_of_birth)?$data->profileStudent->place_of_birth:''}}" name="place_of_birth" class="form-control">
                                <span id="noticeTtl"></span>
                            </div>
                            <div class="form-group" id="data_1">
                                <label class="font-normal">Tanggal Lahir</label>
                                <div class="input-group date">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" name="date_of_birth" value="{{isset($data->profileStudent->date_of_birth)?$data->profileStudent->date_of_birth:''}}" class="form-control" placeholder="03/04/2014">
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
                                <label id="labelYear">Tahun Masuk</label>
                                <input id="year" type="text" maxlength="4" value="{{$data->start_year}}" name="start_year" class="form-control">
                                <span id="noticeYear"></span>
                            </div>
                            <div class="form-group">
                                <label id="labelReligion">Pilih Agama </label>
                                <select class="form-control m-b" id="religion" name="religion">
                                    <option selected value="{{isset($data->profileStudent->religion)?$data->profileStudent->religion:''}}">-- {{isset($data->profileStudent->religion)?$data->profileStudent->religion:'Pilih Agama'}} --</option>
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
                                <input id="address" type="text" value="{{isset($data->profileStudent->address)?$data->profileStudent->address:''}}" name="address" class="form-control">
                                <span id="noticeAddress"></span>
                            </div>
                            <div class="form-group">
                                <label id="labelPhone" for="phone">Nomor Hp</label>
                                <input id="phone" type="text" maxlength="15" value="{{isset($data->profileStudent->phone_number)?$data->profileStudent->phone_number:''}}" name="phone_number" class="form-control">
                                <span id="noticePhone"></span>
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
                        <button type="submit" disabled id="tombol" class="btn btn-sm btn-primary float-right m-t-n-xs">
                            <i class="fa fa-send"></i> Ubah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
