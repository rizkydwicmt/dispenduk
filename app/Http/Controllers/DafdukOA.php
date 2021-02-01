<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 

use App\Http\Controllers\Controller;

use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;

class DafdukOA extends Controller
{
    public function kk()
    {
        $data = array(
            'provinsi' => [
                            [
                                'id' => 35, 
                                'nama' => 'Jawa Timur'
                            ],
                        ],
            'kabupaten' => Kabupaten::select('NO_KAB', 'NAMA_KAB')->get(),
            'statistik' => [
                            [
                                'id' => 1, 
                                'nama' => 'Statistik Jumlah Kepala Keluarga Menurut jenis Kelamin'
                            ],
                            [
                                'id' => 2, 
                                'nama' => 'Statistik Jumlah Kepala Keluarga Menurut Pendidikan Terakhir'
                            ],
                            [
                                'id' => 3, 
                                'nama' => 'Statistik Jumlah Kepala Keluarga Menurut Status Perkawinan'
                            ],
                            [
                                'id' => 4, 
                                'nama' => 'Statistik Jumlah Kepala Keluarga Menurut Golongan Darah'
                            ],
                            [
                                'id' => 5, 
                                'nama' => 'Statistik Jumlah Kepala Keluarga Menurut Agama'
                            ],
                        ],
        );
        return view('konten/dafduk_oa/kk', $data);
    }

    public function biodata()
    {
        $data = array(
            'provinsi' => [
                            [
                                'id' => 35, 
                                'nama' => 'Jawa Timur'
                            ],
                        ],
            'kabupaten' => Kabupaten::select('NO_KAB', 'NAMA_KAB')->get(),
            'statistik' => [
                            [
                                'id' => 1, 
                                'nama' => 'Statistik Jumlah Penduduk Menurut jenis Kelamin'
                            ],
                            [
                                'id' => 2, 
                                'nama' => 'Statistik Jumlah Penduduk Menurut Pendidikan Akhir'
                            ],
                            [
                                'id' => 3, 
                                'nama' => 'Statistik Jumlah Penduduk Menurut Status Perkawinan'
                            ],
                            [
                                'id' => 4, 
                                'nama' => 'Statistik Jumlah Penduduk Menurut Golongan Darah'
                            ],
                            [
                                'id' => 5, 
                                'nama' => 'Statistik Jumlah Penduduk Menurut Agama'
                            ],
                            [
                                'id' => 6, 
                                'nama' => 'Statistik Jumlah Penduduk Menurut Status Hubungan Dalam Keluarga'
                            ],
                        ],
        );
        return view('konten/dafduk_oa/biodata', $data);
    }

    public function pindah()
    {
        $data = array(
            'provinsi' => [
                            [
                                'id' => 35, 
                                'nama' => 'Jawa Timur'
                            ],
                        ],
            'kabupaten' => Kabupaten::select('NO_KAB', 'NAMA_KAB')->get(),
            'statistik' => [
                            [
                                'id' => 1, 
                                'nama' => 'Jumlah Surat Pindah Menurut Alasan Kepindahan'
                            ],
                            [
                                'id' => 2, 
                                'nama' => 'Jumlah Surat Pindah Menurut Klasifikasi Kepindahan'
                            ],
                            [
                                'id' => 3, 
                                'nama' => 'Jumlah Anggota Pindah Menurut Alasan Kepindahan'
                            ],
                            [
                                'id' => 4, 
                                'nama' => 'Jumlah Anggota Pindah Menurut Klasifikasi Kepindahan'
                            ],
                            [
                                'id' => 5, 
                                'nama' => 'Jumlah Anggota Pindah Menurut Jenis Kelamin'
                            ],
                        ],
        );
        return view('konten/dafduk_oa/pindah', $data);
    }

    public function datang()
    {
        $data = array(
            'provinsi' => [
                            [
                                'id' => 35, 
                                'nama' => 'Jawa Timur'
                            ],
                        ],
            'kabupaten' => Kabupaten::select('NO_KAB', 'NAMA_KAB')->get(),
            'statistik' => [
                            [
                                'id' => 1, 
                                'nama' => 'Jumlah Kedatangan Menurut Alasan Kepindahan'
                            ],
                            [
                                'id' => 2, 
                                'nama' => 'Jumlah Kedatangan Menurut Klasifikasi Kepindahan'
                            ],
                            [
                                'id' => 3, 
                                'nama' => 'Jumlah Kedatangan Menurut Jenis Kedatangan'
                            ],
                            [
                                'id' => 4, 
                                'nama' => 'Jumlah Anggota Datang Menurut Alasan Kepindahan'
                            ],
                            [
                                'id' => 5, 
                                'nama' => 'Jumlah Anggota Datang Menurut Klasifikasi Kepindahan'
                            ],
                            [
                                'id' => 6, 
                                'nama' => 'Jumlah Anggota Datang Menurut Jenis Kedatangan'
                            ],
                            [
                                'id' => 7, 
                                'nama' => 'Jumlah Anggota Datang Menurut Jenis Kelamin'
                            ],
                        ],
        );
        return view('konten/dafduk_oa/datang', $data);
    }

    public function statistik_kk(Request $request){
        $tanggal = explode('-', $request->bulan);
        if($request->statistik == 1) $data = app('db')->table('t5_kepkel_kelamin');
        if($request->statistik == 2) $data = app('db')->table('t5_kepkel_pendidikan');
        if($request->statistik == 3) $data = app('db')->table('t5_kepkel_status_perkawinan');
        if($request->statistik == 4) $data = app('db')->table('t5_kepkel_golongan_darah');
        if($request->statistik == 5) $data = app('db')->table('t5_kepkel_agama');
        if($request->statistik == 6) $data = app('db')->table('t5_kepkel_penyandang_cacat');
        
        $data = $data
                ->whereMonth('BLN', $tanggal[1])
                ->whereYear('BLN', $tanggal[0])
                ->where('NO_PROP', $request->provinsi)
                ->where('NO_KAB', $request->kabupaten)
                ->where('NO_KEC', $request->kecamatan)
                ->where('NO_KEL', $request->kelurahan)
                ->get();
                
        return $data;
    }

    public function statistik_biodata(Request $request){
        $tanggal = explode('-', $request->bulan);
        if($request->statistik == 1) $data = app('db')->table('t5_stt_agr_penduduk');
        if($request->statistik == 2) $data = app('db')->table('t5_stt_struktur_umur');
        if($request->statistik == 3) $data = app('db')->table('t5_stt_pendidikan');
        if($request->statistik == 4) $data = app('db')->table('t5_stt_pekerjaan');
        if($request->statistik == 5) $data = app('db')->table('t5_stt_status_perkawinan');
        if($request->statistik == 6) $data = app('db')->table('t5_stt_golongan_darah');
        if($request->statistik == 7) $data = app('db')->table('t5_stt_agama');
        if($request->statistik == 8) $data = app('db')->table('t5_stt_penyandang_cacat');
        if($request->statistik == 9) $data = app('db')->table('t5_stt_wajib_ktp');
        if($request->statistik == 10) $data = app('db')->table('t5_stt_stathbkel');
        
        $data = $data
                ->whereMonth('BLN', $tanggal[1])
                ->whereYear('BLN', $tanggal[0])
                ->where('NO_PROP', $request->provinsi)
                ->where('NO_KAB', $request->kabupaten)
                ->where('NO_KEC', $request->kecamatan)
                ->where('NO_KEL', $request->kelurahan)
                ->get();
                
        return $data;
    }
}
