@extends('admin.layouts2.app')

@section('title', 'Detail Materi')

@section('style')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/4.0.0/css/jasny-bootstrap.min.css">
<!-- Custom Stylesheet -->
<link href="{{ asset('qlab/plugins/summernote/dist/summernote.css') }}" rel="stylesheet">
<style>
    .custom .card .card-body .form-group label span {
        color: #ff2a00;
    }
</style>
@endsection

@section('content')
<div class="content-body">

    <div class="row page-titles mt-3 pb-0">
      <div class="col-md-6">
        <h4 class="section-title">Buat Materi</h4>
        <p class="section-lead mt-1"><i class="fas fa-angle-double-right text-primary"></i> Anda bisa menambah materi sesuai dengan mapel yang anda ampu.</p>
      </div>
      <div class="col-md-6 d-flex align-items-end justify-content-end py-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('section.list') }}">Daftar Materi</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
      </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <form action="{{route('section.store')}}" method="POST" enctype="multipart/form-data" class="custom">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Deskripsi Singkat</div>
                        <div class="form-group">
                            <label for="">Judul Materi <span>*</span></label>
                            <input name="title" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi <span>*</span></label>
                            <textarea class="summernote" name="description"></textarea>
                        </div>

                        <p class="font-italic"><span class="text-danger">*</span>) Wajib diisi.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Data Kelas</div>
                        <div class="form-group">
                            <label for="">Mata Pelajaran <span>*</span></label>
                            <select name="course_id" class="form-control">
                                @foreach ($course as $data)
                                    <option value="{{ $data->id }}">{{ $data->list_course }} - {{ $data->classroom }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Upload   <small>(optional)</small></div>                        
                        <div id="accordion-two" class="accordion">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2"><i class="fa" aria-hidden="true"></i>File</h5>
                                </div>
                                <div id="collapseTwo2" class="collapse" data-parent="#accordion-two">
                                    <div class="card-body p-3" id="app">
                                        <div v-for="n in file" :key="index">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <div class="fileinput fileinput-new mb-0" data-provides="fileinput" style="max-width: 70%;">
                                                    <span class="btn btn-sm btn-outline-secondary btn-file">
                                                        <span class="fileinput-new">Select file</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="file[]" multiple>
                                                    </span>
                                                    <span class="fileinput-filename" style="word-wrap: break-word; max-width: 50%;"></span>
                                                        <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
                                                </div>
                                                <button type="button" @click="delfile()" class="btn btn-danger btn-sm">Hapus</button>
                                            </div>
                                        </div>

                                        <button type="button" @click="addfile()" class="btn btn-primary btn-sm">Tambah</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseThree3" aria-expanded="false" aria-controls="collapseThree3"><i class="fa" aria-hidden="true"></i>Link <small><i>(Gunakan APIs)</i></small></h5>
                                </div>
                                <div id="collapseThree3" class="collapse" data-parent="#accordion-two">
                                    <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Actions <span class="text-danger">*</span></div>
                        <div class="form-group">
                            {{-- <label for=""> <span>*</span></label> --}}
                            <select name="status" class="form-control">
                                <option value="0">Draft</option>
                                <option value="1">Publish</option>
                            </select>
                        </div>
                        <a href="{{ route('section.list') }}" class="btn btn-sm btn-danger">Kembali</a>
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <!-- #/ container -->
</div>
@endsection

@section('script')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/4.0.0/js/jasny-bootstrap.min.js"></script>
    <script src="{{ asset('qlab/plugins/summernote/dist/summernote.min.js') }}"></script>
    <script src="{{ asset('qlab/plugins/summernote/dist/summernote-init.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                file: 1,
            },
            methods:{
                addfile(){
                    this.file++;
                },
                delfile(){
                    if (this.file > 1) {
                        this.file--;
                    }
                }
            }
        })
    </script>
@endsection