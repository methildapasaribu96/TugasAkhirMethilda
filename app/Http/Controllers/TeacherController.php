<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Grade;
use Validator;
use DataTables;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function table()
    {
        $teachers = Teacher::get();

        return DataTables::of($teachers)
          ->addColumn('action', function ($teachers) {
            if (auth()->user()->role == 'operator') {
              return '
                <button class="btn btn-default show" data-id="'.$teachers->id.'"><i class="fa fa-eye"></i></button>
                <button class="btn btn-info edit" data-id="'.$teachers->id.'"><i class="fa fa-pencil-alt"></i></button>
                <button class="btn btn-danger delete" data-id="'.$teachers->id.'"><i class="fa fa-trash"></i></button>
              ';
            } else {
              return '
                <button class="btn btn-default show" data-id="'.$teachers->id.'"><i class="fa fa-eye"></i></button>
              ';
            }
          })
          ->make(true);
    }

    public function index()
    {

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

        if($request->nip !=0){
            $validator = Validator::make($request->all(), [
              'nip' => 'required|unique:teachers',
              'nama' => 'required',
              'golongan' => 'required',
              'pangkat' => 'required',
              'alamat' => 'required',
              'tmt' => 'required|date',
              'gender' => 'required',
              'pendidikan' => 'required',
              'jam_mengajar' => 'required|max:2',
              'tempat_lahir' => 'required',
              'tanggal_lahir' => 'required',
              'masa_kerja' => 'required',
            ]);
        }else{
            $validator = Validator::make($request->all(), [
              'nip' => 'required',
              'nama' => 'required',
              'golongan' => 'required',
              'pangkat' => 'required',
              'alamat' => 'required',
              'tmt' => 'required|date',
              'gender' => 'required',
              'pendidikan' => 'required',
              'jam_mengajar' => 'required|max:2',
              'tempat_lahir' => 'required',
              'tanggal_lahir' => 'required',
              'masa_kerja' => 'required',
            ]);
        }

         if ($validator->fails()) {
          return response()->json([
            'errors' => $validator->getMessageBag()->toArray(),

       
          ]);
        } else {
          $teacher = new Teacher;
          $teacher->nip = $request->nip;
          $teacher->nama = $request->nama;
          $teacher->golongan = $request->golongan;
          $teacher->pangkat = $request->pangkat;
          $teacher->alamat = $request->alamat;
          $teacher->tmt = date($request->tmt);
          $teacher->gender = $request->gender;
          $teacher->pendidikan = $request->pendidikan;
          $teacher->jam_mengajar = $request->jam_mengajar;
          $teacher->tempat_lahir = $request->tempat_lahir;
          $teacher->tanggal_lahir= $request->tanggal_lahir;
          $teacher->masa_kerja = $request->masa_kerja;
          $teacher->save();

          $grade = new Grade;
          $grade->teacher_id = $teacher->id;
          $grade->c1 = 0;
          $grade->c2 = 0;
          $grade->c3 = 0;
          $grade->c4 = 0;
          $grade->c5 = 0;
          $grade->c6 = 0;
          $grade->c7 = 0;
          $grade->c8 = 0;
          $grade->c9 = 0;
          $grade->c10 = 0;
          $grade->c11 = 0;
          $grade->c12 = 0;
          $grade->c13 = 0;
          $grade->c14 = 0;
          $grade->save();

          return response()->json([
            'msg' => $teacher,
          ]);
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
        $teacher = Teacher::find($id);
        return response()->json([
          'msg' => $teacher,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::find($id);

        return response()->json([
          'msg' => $teacher,
        ]);
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
        $teacher = Teacher::find($id);

        $validator = Validator::make($request->all(), [
          'nip' => 'required',
          'nama' => 'required',
          'golongan' => 'required',
          'pangkat' => 'required',
          'alamat' => 'required',
          'tmt' => 'required|date',
          'gender' => 'required',
          'pendidikan' => 'required',
          'jam_mengajar' => 'required',
          'tempat_lahir' => 'required',
          'tanggal_lahir' => 'required',
          'masa_kerja' => 'required',
          
        ]);

        if ($validator->fails()) {
          return response()->json([
            'errors' => $validator->getMessageBag()->toArray(),
          ]);
        } else {
          $teacher->nip = $request->nip;
          $teacher->nama = $request->nama;
          $teacher->golongan = $request->golongan;
          $teacher->pangkat = $request->pangkat;
          $teacher->alamat = $request->alamat;
          $teacher->tmt = date($request->tmt);
          $teacher->gender = $request->gender;
          $teacher->pendidikan = $request->pendidikan;
          $teacher->jam_mengajar = $request->jam_mengajar;
          $teacher->tempat_lahir = $request->tempat_lahir;
          $teacher->tanggal_lahir= $request->tanggal_lahir;
          $teacher->masa_kerja = $request->masa_kerja;
          $teacher->save();

          return response()->json([
            'msg' => $teacher,
          ]);
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
        $teacher = Teacher::find($id);
        $teacher->delete();

        return response()->json([
          'msg' => $teacher,
        ]);
    }
}
