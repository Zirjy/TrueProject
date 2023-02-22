<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiswaRequest;
use Illuminate\Http\Request;
use App\Models\Siswa;


class SiswaController extends Controller
{
    public function __construct()
    {
        $this -> middleware('auth');
        $this -> middleware('verified');
    }

    public function index(Request $request) {
        if ($request->search) {
            $siswa = Siswa::where('task', 'LIKE', 
            "%$request->search%")->get();
        }
        $siswa = Siswa::paginate(3);
        return view('siswa.index' ,[
        'data' => $siswa
    ]);
    }

    public function show($id) {
        $siswa = Siswa::find($id);
        return $siswa;
    }

    public function store(SiswaRequest $request) {

        
        // $this->taskList[$request->key] = $request->task;
        // return $this->taskList;
        Siswa::create([
            'siswa' => $request->siswa,
            'user' => $request->user
        ]);
        return redirect('/siswas');
    }

    public function update(SiswaRequest $request,$id){
        $task = Siswa::find($id);
        $task->update([
            'siswa' => $request->siswa,
            'user' => $request->user
        ]);
        return redirect('/siswas');
    }

    public function edit($id){
        $siswa = Siswa::find($id);
        return view('siswa.edit', compact('siswa'));
    }

    public function delete($id){
        $siswa = Siswa::find($id)->delete();
        return redirect('/siswas');
    }

    public function create(){
        return view('siswa.create');
    }
}
