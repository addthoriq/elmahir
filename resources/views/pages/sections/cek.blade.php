@if ($files->name_file)
    @if ($files->type_file == 'image/png')
        <img alt="image" class="img-fluid" src="{{ Storage::url($files->name_file) }}" style="height: 400px;">
    @else
        <embed src="{{ Storage::url($files->name_file) }}" type="application/pdf" width="100%" height="400px" />
    @endif
@else
    <iframe width="80%" height="400" src="{{ $files->link }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
@endif



@if (Request::is('chapter/*'))
    @include('pages.chapters.editModalBab')
@else
    @include('pages.chapters.editModalMateri')
    @include('pages.chapters.editModalFile')
@endif



<ul class="nav metismenu">
    @foreach ($sections as $section)
        <li class="bg-default border-bottom">
            @inject('file', 'App\Http\Controllers\ChapterController')
            <?php $count = count($file->file($section->id)) ?>
            <a href="#" class="tree-toggle py-2" style="color: #676A6C">{{ $section->title }} <span class="fa arrow"></span><br>
            <small>{{ $count }} file . publish : {{ $section->created_at ? $section->created_at->format('d M Y') : 'undefined' }}</small>
            </a>
            <form action="{{ route('section.destroy', $section->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-xs ml-4 mb-3" onclick="return confirm('are you sure?')">
                    <i class="fa fa-trash"></i> Hapus
                </button>
            </form>
            <ul class="tree pl-0">
            @foreach ($file->file($section->id) as $file)
                <li class="nav-link p-0 mb-2 detail pl-5 py-1">
                    <a href="{{ route('section.show', $file->id) }}" style="color: #676A6C">{{ $file->title }}<br>
                    <small>
                        @if ($file->type_file == 'image/png')
                            <i class="fa fa-file-image-o" size="10"></i>
                        @elseif($file->type_file == 'application/pdf')
                            <i class="fa fa-file-pdf-o" size="10"></i>
                        @elseif($file->type_file == 'video/link')
                            <i class="fa fa-play-circle-o" size="10"></i>
                        @endif
                        publish : {{ date_format($file->created_at,"d M Y") }}
                    </small>
                    </a>
                </li>
            @endforeach
            </ul>
        </li>
    @endforeach
</ul>   
<a href="{{ route('section.add', $chapter->id) }}" class="btn btn-primary m-3"><i class="fa fa-plus"></i> Tambah Materi</a>
</div>