<?php

namespace App\Http\Controllers;

use App\Paslon;
use App\voting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class siswaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data = Paslon::all();
        return view('siswa.home', ['data' => $data]);

    }

    
    public function detail( $id ) {

        $data = Paslon::find($id);
        return view('siswa.detail', ['data' => $data]);

    }

    public function pilihPaslon( $id ) {

        $paslon = Paslon::find($id);
        $noUrutPaslon = $paslon->no_urut_paslon;

        $idUser = Auth::user()->id;

        voting::create([

            'id_user' => $idUser,
            'no_urut_paslon' => $noUrutPaslon

        ]);

        Alert::success('Success', 'Kamu Berhasil Memilih');
        return redirect('/home');

    }

}
