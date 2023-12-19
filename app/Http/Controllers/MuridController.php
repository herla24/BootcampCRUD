<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use App\Http\Requests\StoreMuridRequest;
use App\Http\Requests\UpdateMuridRequest;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        if(!empty($search)){
            $dataSiswa = Murid::where('murids.id','like','%'.$search.'%')
            ->orWhere('murids.NamaLengkap','like','%'.$search.'%')
            ->orWhere('murids.NIK','like','%'.$search.'%')
            ->paginate(5)->fragment('mrd');;
        } else{
            $dataSiswa = Murid::paginate(5)->fragment('mrd');;
        }

       
        return view('siswa.data')->with([
            'siswa' => $dataSiswa,
            'search' => $search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
 

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMuridRequest $request)
    {
        $validate = $request->validated();

        $murid = new Murid;
        $murid->NIK = $request->NIK;
        $murid->NamaLengkap = $request->NamaLengkap;
        $murid->JenisKelamin = $request->JenisKelamin;
        $murid->Alamat = $request->Alamat;
        $murid->NoHp = $request->NoHp;
        $murid->save();

        return redirect('siswa')->with('msg','Menambah Murid Baru Berhasil');
    }

    /**
     * Display the specified resource.
     */

     public function show ($id){
        $data = Murid::find($id);
        // dd($data);
        return view('siswa.edit',compact('data'));
     }


    /**
     * Show the form for editing the specified resource.
     */
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        // $data = Murid::find($id);
        Murid::where('id', $id)->update([
            'NamaLengkap' => $request->NamaLengkap,
            'JenisKelamin' => $request->JenisKelamin,
            'Alamat' => $request->Alamat,
            'NoHp'=>$request->NoHp

        ]);

        return redirect('siswa')->with('msg', 'Data Update');        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        // dd($id);
       
        $data = Murid::find($id);
        
       // $data = $murid->find($id);
       
        $data->delete();

        return redirect('siswa')->with('msg', 'Data Berhasil di Delete');
    }
}
