<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Npm;

class NPMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $npm= Npm::all();
       return view('npm.index',compact('npm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Npm.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $npm = new Npm;

        $request->validate([
            'npm' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        $npm->npm = $request->npm;
        $npm->nama = $request->nama;
        $npm->alamat = $request->alamat;

        $simpan = $npm->save();

        if($simpan){
            Alert::success('Success', 'Data Berhasil ditambah');
            return redirect('/cast');
        }else{
            Alert::error('Failed', 'Data Gagal ditambah');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cast = Cast::where('id',$id)->first();

        return view('cast.edit', compact('cast'));

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
        $request->validate([
            'nama' => 'required',
            'umur' => 'required',
            'bio' => 'required',
        ]);

        $cast = Cast::find($id);
        $cast->nama = $request->nama;
        $cast->umur = $request->umur;
        $cast->bio = $request->bio;

        $ubah = $cast->save();

        if($ubah ){
            Alert::success('Success', 'Data Berhasil diubah');
            return redirect('/cast');
        }else{
            Alert::error('Failed', 'Data Gagal diubah');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cast = Cast::find($id);
        $hapus = $cast ->delete();

        if($hapus ){
            Alert::success('Success', 'Data Berhasil di Hapus');
            return redirect('/cast');
        }else{
            Alert::error('Failed', 'Data Gagal di Hapus');
        }
        return redirect('/cast');
    }
}
