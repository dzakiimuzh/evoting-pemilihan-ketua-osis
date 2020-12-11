<?php

namespace App\Http\Controllers;

use App\HasilVoting;
use App\Imports\UserImport;
use App\Paslon;
use App\User;
use App\voting;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;


class AdminController extends Controller
{
    public function index() {

        $data = Paslon::all();
        return view('admin.dashboard', ['data' => $data]);

    }

    public function hapus( $id ) {

        $data = Paslon::find($id);

        $imgKetua = $data->img_ketua;
        $imgWakil = $data->img_wakil;

        File::delete('img_ketua/' . $imgKetua);
        File::delete('img_wakil/' . $imgWakil);

        $data->delete();

        Alert::success('Success', 'Data Berhasil Di Hapus');


        return redirect('/dashboard');

    }

    public function viewTambah() {

        return view('admin.tambah');

    }

    public function prosesTambah( Request $request ) {

        $this->validate($request, [

            'no_urut_paslon' => 'required|integer|unique:tbl_paslon,no_urut_paslon',
            'ketua_paslon' => 'required',
            'wakil_paslon' => 'required',
            'visi_paslon' => 'required',
            'misi_paslon' => 'required',
            'img_ketua' => 'required|max:2000|file|mimes:jpg,png,jpeg|image',
            'img_wakil' => 'required|max:2000|file|mimes:jpg,png,jpeg|image'

        ]);

        $imgKetua = $request->file('img_ketua');
        $imgWakil = $request->file('img_wakil');

        $namaFileKetua = time() . '_' . $imgKetua->getClientOriginalName();
        $namaFileWakil = time() . '_' . $imgWakil->getClientOriginalName();

        $folderKetua = 'img_ketua';
        $folderWakil = 'img_wakil';

        Paslon::create([

            'no_urut_paslon' => $request->no_urut_paslon,
            'ketua_paslon' => $request->ketua_paslon,
            'wakil_paslon' => $request->wakil_paslon,
            'visi_paslon' => $request->visi_paslon,
            'misi_paslon' => $request->misi_paslon,
            'img_ketua' => $namaFileKetua,
            'img_wakil' => $namaFileWakil

        ]);

        $imgKetua->move($folderKetua, $namaFileKetua);
        $imgWakil->move($folderWakil, $namaFileWakil);

        Alert::success('Success', 'Upload Paslon Berhasil');


        return redirect()->route('dashboard');

    }

    public function edit( $id ) {

        $data = Paslon::find($id);
        return view('admin.edit', ['data' => $data]);

    }

    public function prosesEdit( $id, Request $request ) {

        $this->validate($request, [

            'no_urut_paslon' => 'required|integer',
            'ketua_paslon' => 'required',
            'wakil_paslon' => 'required',
            'visi_paslon' => 'required',
            'misi_paslon' => 'required',
            'img_ketua' => 'max:2000|file|mimes:jpg,png,jpeg|image',
            'img_wakil' => 'max:2000|file|mimes:jpg,png,jpeg|image'

        ]);

        $data = Paslon::find($id);
        $data->no_urut_paslon = $request->no_urut_paslon;
        $data->ketua_paslon = $request->ketua_paslon;
        $data->wakil_paslon = $request->wakil_paslon;
        $data->visi_paslon = $request->visi_paslon;
        $data->misi_paslon = $request->misi_paslon;
        
        if ( $request->file('img_ketua') !== null && $request->file('img_wakil') !== null ) {
        
            $imgKetua = $request->file('img_ketua');
            $imgWakil = $request->file('img_wakil');

            // Nama File
            $namaFileKetua = time() . '_' . $imgKetua->getClientOriginalName();
            $namaFileWakil = time() . '_' . $imgWakil->getClientOriginalName();

            // Nama Folder
            $folderKetua = 'img_ketua';
            $folderWakil = 'img_wakil';

            // Masukkan Gambar Ke Dalam Folder
            $imgKetua->move($folderKetua, $namaFileKetua);
            $imgWakil->move($folderWakil, $namaFileWakil);

            // Ambil img lama
            $imgWakilLama = $data->img_wakil;
            $imgKetuaLama = $data->img_ketua;

            // Hapus File Yg Lama
            File::delete('img_ketua/' . $imgKetuaLama);
            File::delete('img_wakil/' . $imgWakilLama);

             // Ubah Gambar Lama Dengan Yg Baru
            $data->img_ketua = $namaFileKetua;
            $data->img_wakil = $namaFileWakil;

            $data->save();

        } elseif ( $request->file('img_ketua') == null || $request->file('img_wakil') == null ) {

            $data->save();

        }      

        Alert::success('Success', 'Data Berhasil Di Ubah');

        return redirect('/dashboard');

    }

    public function detail( $id ) {

        $data = Paslon::find($id);
        return view('admin.detail', ['data' => $data]);

    }

    public function registerSiswa() {

        return view('admin.registerSiswa');

    }

    public function prosesRegisterSiswa( Request $request ) {

        $this->validate($request, [

            'username' => 'required',
            'email' => 'email|required',
            'password' => 'required'

        ]);

        User::create([

            'username' => $request->username,
            'role' => 'siswa',
            'email' => $request->email,
            'password' => Hash::make($request->password)

        ]);

        Alert::success('Success', 'Register Siswa Berhasil');
        return redirect('/registerSiswa');

    }

    public function voteSelesai() {
        
        $i = 1;

        while( $i <= 2 ) {

            $hasilNoUrut = count(voting::where('no_urut_paslon', $i)->get());

            HasilVoting::create([

                'no_urut_paslon' => $i,
                'jumlah_vote' => $hasilNoUrut
    
            ]);

            $i++;

        }

        return redirect('/dashboard');

    }

    public function hasilVote() {

        $data = HasilVoting::all();
        return view('admin.hasilVote', ['data' => $data]);

    }

    public function importSiswa() {

        return view('admin.importSiswa');

    }

    public function importExcel( Request $request ) {

        $this->validate($request, [

            'file_excel' => 'required|mimes:csv,xls,xlsx'

        ]);

        $file = $request->file('file_excel');

        $namaFile = rand().$file->getClientOriginalName();
        $file->move('file_user', $namaFile);

        Excel::import(new UserImport, public_path('/file_user' . '/' . $namaFile));

        Alert::success('Success', 'Import Data Berhasil');

        return redirect('/dashboard');

    }


}