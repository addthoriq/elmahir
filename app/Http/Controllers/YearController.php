<?php

namespace App\Http\Controllers;

use App\Model\SchoolYear;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Form;

class YearController extends Controller
{

    protected $folder  = 'pages.years';
    protected $rdr     = '/year';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ajax     = route('year.dbtb');
        return view('pages.years.index', compact('ajax'));
    }
    public function dbTables(Request $request)
    {
        $data = SchoolYear::all();
        return Datatables::of($data)
        ->addColumn('action', function($index){
            $tag     = Form::open(["url"=>route('year.destroy', $index->id), "method" => "DELETE"]);
            $tag    .= "<a href=". route('year.show', $index->id) ." class='btn btn-xs btn-info' ><i class='fa fa-search'></i> Detail</a> ";
            $tag    .= "<button type='submit' class='btn btn-xs btn-danger' onclick='javascript:return confirm(`Apakah anda yakin ingin menghapus data ini?`)' ><i class='fa fa-trash'></i> Hapus</button>";
            $tag    .= Form::close();
            return $tag;
        })
        ->rawColumns([
            'id','action'
        ])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data     = new SchoolYear;
        $data->start_year     = $request->start_year;
        $data->end_year     = $request->end_year;
        $data->save();
        return redirect($this->rdr)->with('status','Tahun Ajar berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data     = SchoolYear::findOrFail($id);
        return view($this->folder.'.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        SchoolYear::findOrFail($id)->update([
            'start_year'    => $request->start_year,
            'end_year'    => $request->end_year,
        ]);
        return redirect()->route('year.show', [$id])->with('notif', 'Tahun Ajar berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = SchoolYear::findOrFail($id);
        $data->delete();
        return redirect($this->rdr)->with('notif', 'Tahun Ajar berhasil dihapus');
    }
}
