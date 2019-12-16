<div class="modal inmodal fade" id="fileModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
            <div class="modal-header py-2">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <div class="d-flex justify-content-start pl-2 align-items-start flex-column">
                    <h4 class="modal-title text-align-left">Edit Materi</h4>
                    <h5>{{ $section->title }}</h5>
                </div>
            </div>
            <div class="modal-body">
                @inject('fileEdit', 'App\Http\Controllers\ChapterController')
                <?php $no = 1; ?>
                <div class="table-responsive">
                        <table class="table table-striped table-hover dataTables-example" style="border-spacing:0px;">
                            <thead>
                                <tr>
                                    <th style="width: 20px;">No</th>
                                    <th>Nama File</th>
                                    <th>Tipe</th>
                                    <th>Tanggal Upload</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fileEdit->file($section->id) as $file)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $file->title }}</td>
                                        <td>{{ $file->type_file }}</td>
                                        <td>{{ date_format($file->created_at,"d M Y") }}</td>
                                        <td>
                                            <form action="{{ route('section.deleteFile', $file->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('are you sure?')"><i class="fa fa-trash"></i> Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>