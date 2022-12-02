<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {return view('login');}

    public function logout()
    { Auth::logout();
    return redirect('/');}

    public function register()
    {return view('register');}

    public function welcome()
    {return view('dashboard.welcome');}

    public function complated()
    {   $todos = Todo::where([
        ['user_id', '=', Auth::user()->id],
        ['status', '=', 1],
        ])->get();
        return view('dashboard/complated', compact('todos'));}

    public function todolist()
    {   //ambil data dari table todos dengan model Todo
        // all() fungsinya untuk mengambil semua data di table
        //filter data di database -> where('column', 'perbandingan', 'value,)
        //get()->mengambil data
        //filter data di table todos yang isi column user_id nya sama dengan data history login bagian id
        $todos = Todo::where([
            ['user_id', '=', Auth::user()->id],
            ['status', '=', 0],
            ])->get();
        //kirim data yang sudah daimbil ke file blade/ke file yang menampilkan halaman
        // kirim melalui compact()
        //isi compact sesuaikan dengan nama variable, boleh ebih dari 1 (sesuai variable yang ada)
        return view('dashboard.todolist', compact('todos'));
    }

    public function createtodo()
    {return view('dashboard/createtodo');}

    public function auth(Request
    $request){
        $request->validate([
            'username' => 'required|
            exists:users,username',
            'password'=> 'required',
        ], [
            'username.exists' =>'username ini belum tersedia',
            'username.required' => 'username harus diisi',
            'password.required' => 'password harus diisi',
        ]);
        $user = $request->only('username', 'password');
        if(Auth::attempt($user)) {
            return redirect('/dashboard/welcome');
        }else {
            return redirect()->back()->with('error', 'Gagal login, silahkan cek dan coba lagi!');
        }
    }
    
    public function registerAccount(Request
    $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email:dns',
            'username' => 'required|min:4|max:8',
            'password' => 'required|min:4',
            'name' => 'required|min:3',
        ]);
        //input data ke db
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        //redirect kemana setelah berhasil tambah data + dikirim pemberitahuan
        return redirect('/')->with('success', 'Berhasil menambahkan akun! Silahkan Login');
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        //validasi data
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'description' => 'required|min:5',
        ]);
        //mengirim data ke db tabel todos dengan model Todo
        //''= nama column di tabel db
        // $request-> value attribute nama pada input
        // kenapa yangdkirim 5 data? karena tabel pada db todos membutuhkan 6 kolom input
        // salah satunya kolom 'done_time' yang tipedanya nullable, karena nullable jadi ga perlu dikirim nilai
        // 'user_id' untuk memberi tahu data todo ini milik siapa, diambil melalui fitur Auth
        // 'status' tipenya boolean, 0=belum dikerjakan, 1=sudah dikerjakan(todo nya)
        Todo::create([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'status' => 0,
            'user_id' => Auth::user()->id,
        ]);
        return redirect('/dashboard/todolist')->with('successAdd','Successful adding todo data !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //menampilkan halaman input form edit
        //mengambil data satu baris ketika column id pada baris tersebut sama dengan id dari parameter route
        $todo = Todo::where('id', $id)->first();
        //kirim data yang diambil ke file blade dengan compact
        return view('dashboard.edittodo', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //mengubah data di db
        //validasi
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'description' => 'required|min:5',
        ]);
        //cari baris data yang punya id sama dengan data id yg dikirim ke parameter
        //kalau udh ketemu, update column-column datanya
        Todo::where('id', $id)->update([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'status' => 0,
            'user_id' => Auth::user()->id,
        ]);
        return redirect('/dashboard/todolist')->with('successUpdate', 'Data Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Todo::where('id', '=', $id)->delete();
        return redirect('/dashboard/todolist')->with('successDelete', 'Data has deleted');
    }

    public function updateComplated($id)
    {
        Todo::where('id', '=', $id)->update([
            'status' => 1,
            'done_time' => \Carbon\Carbon::now(),
        ]);
        return redirect('/dashboard/todolist')->with('done', 'Todo has complated!');
    }
}
