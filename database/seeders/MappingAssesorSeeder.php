<?php

namespace Database\Seeders;

use App\Models\Admin\Asesor;
use App\Models\AsesmenJadwal;
use App\Models\AsesmenPenilaian;
use App\Models\Assesor\CatinPersyaratan;
use App\Models\Dashboard\Catin;
use App\Models\Dispensasi;
use App\Models\Master\Agama;
use App\Models\Master\JabatanFungsional;
use App\Models\Master\Kecamatan;
use App\Models\Master\Kelurahan;
use App\Models\Master\Pegawai;
use App\Models\Master\Pendidikan;
use App\Models\Master\Periode;
use App\Models\Master\PersyaratanDispensasi;
use App\Models\Register;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MappingAssesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_catin = [
            'name' => 'Muhammad Saiful Hatta',
            'email' => 'saifulhatta@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ];

        $catin = User::updateOrCreate(['email' => 'saifulhatta@gmail.com'], $user_catin);
        $catin->assignRole('catin');

        $kecamatan = Kecamatan::inRandomOrder()->first()->toArray();

        $kelurahan = Kelurahan::inRandomOrder()->first()->toArray();

        $agama = Agama::inRandomOrder()->first()->toArray();

        $register = [
            'user_id' => User::where('email', 'saifulhatta@gmail.com')->first()->id,
            'nama' => 'Muhammad Saiful Hatta',
            'email' => 'saifulhatta@gmail.com',
            'nomor_hp' => '081000000001',
            'kecamatan_id' => $kecamatan['id'],
            'kelurahan_id' => $kelurahan['id'],
            'alamat' => 'Jl. Durian No. 123456',
            'agama_id' => $agama['id'],
            'is_active' => '1',
            'created_by' => '1',
            'updated_by' => '1',
        ];

        Register::updateOrCreate(['email' => 'saifulhatta@gmail.com'], $register);

        $dispensasi = [
            'register_id' => Register::latest()->first()->id,
            'nomor_surat' => '123456',
            'tanggal_surat' => '2021-01-01',
            'tanggal_pengajuan' => '2021-01-01',
            'status_persetujuan' => '1',
            'keterangan' => 'Izin kawin',
            'created_by' => '1',
            'updated_by' => '1',
        ];

        Dispensasi::updateOrCreate(['nomor_surat' => '123456'], $dispensasi);

        $periode = [
            'periode' => '2021-01-01',
            'tahun' => '2021',
            'keterangan' => 'Musim kawin',
            'is_active' => '1',
            'created_by' => '1',
            'updated_by' => '1',
        ];

        Periode::updateOrCreate(['periode' => '2021-01-01'], $periode);

        $asesmen_jadwal = [
            'dispensasi_id' => Dispensasi::latest()->first()->id,
            'periode_id' => Periode::latest()->first()->id,
            'tanggal_asesmen' => '2021-01-01',
            'catatan' => 'Kawinkan mereka',
            'status' => 'SUBMITTED',
            'keterangan' => 'Jangan lupa kawinkan mereka',
            'created_by' => '1',
            'updated_by' => '1',
        ];

        AsesmenJadwal::updateOrCreate(['tanggal_asesmen' => '2021-01-01'], $asesmen_jadwal);

        $asesor = [
            'nama' => 'Asesor',
            'email' => 'asesor@arkatama.test',
            'nomor_hp' => '082000000002',
            'kecamatan_id' => $kecamatan['id'],
            'kelurahan_id' => $kelurahan['id'],
            'alamat' => 'Jl. Melon No. 8374',
            'user_id' => User::where('email', 'asesor@arkatama.test')->first()->id,
            'created_by' => '1',
            'updated_by' => '1',
        ];

        Asesor::updateOrCreate(['email' => 'asesor@arkatama.test'], $asesor);

        $asesmen_penilaian = [
            'asesmen_id' => AsesmenJadwal::latest()->first()->id,
            'asesor_id' => Asesor::latest()->first()->id,
        ];

        AsesmenPenilaian::updateOrCreate(['asesmen_id' => AsesmenJadwal::latest()->first()->id, 'asesor_id' => Asesor::latest()->first()->id], $asesmen_penilaian);

        $catin_pria = [
            'jenis_kelamin' => 'L',
            'nik' => '1234567890123456',
            'nama_lengkap' => 'Budi Santoso',
            'tempat_lahir' => 'Ngawi',
            'tanggal_lahir' => '1945-12-31',
            'nomor_hp' => '083000000003',
            'pekerjaan' => 'Mentri BUMN',
            'kecamatan_id' => $kecamatan['id'],
            'kelurahan_id' => $kelurahan['id'],
            'alamat' => 'Jl. Jambu No. 0192',
            'agama_id' => $agama['id'],
            'pendidikan_id' => Pendidikan::inRandomOrder()->first()->id,
            'nama_ayah' => 'Mail',
            'nama_ibu' => 'Rose',
            'nama_wali' => 'Mail',
            'status_verifikasi' => 'SUBMITTED',
            'pas_foto' =>   'catin/pas_foto-pria.jpg',
            'dispensasi_id' => Dispensasi::latest()->first()->id,
            'created_by' => '1',
            'updated_by' => '1',
        ];

        Catin::updateOrCreate(['nik' => '1234567890123456'], $catin_pria);

        $catin_wanita = [
            'jenis_kelamin' => 'P',
            'nik' => '9876543210987654',
            'nama_lengkap' => 'Mei Mei',
            'tempat_lahir' => 'Cirebon',
            'tanggal_lahir' => '2021-01-01',
            'nomor_hp' => '084000000004',
            'pekerjaan' => 'DPR',
            'kecamatan_id' => $kecamatan['id'],
            'kelurahan_id' => $kelurahan['id'],
            'alamat' => 'Jl. Durian No. 9283',
            'agama_id' => $agama['id'],
            'pendidikan_id' => Pendidikan::inRandomOrder()->first()->id,
            'nama_ayah' => 'Fizi',
            'nama_ibu' => 'Susanti',
            'nama_wali' => 'Fizi',
            'status_verifikasi' => 'SUBMITTED',
            'pas_foto' =>   'catin/pas_foto-wanita.jpg',
            'dispensasi_id' => Dispensasi::latest()->first()->id,
            'created_by' => '1',
            'updated_by' => '1',
        ];

        Catin::updateOrCreate(['nik' => '9876543210987654'], $catin_wanita);

        $persyaratans = [
            [
                'periode_id' => Periode::latest()->first()->id,
                'nama_persyaratan' => 'KTP',
                'keterangan' => 'Upload KTP',
                'is_wajib' => '1',
                'is_active' => '1',
                'created_by' => '1',
                'updated_by' => '1',
            ],
            [
                'periode_id' => Periode::latest()->first()->id,
                'nama_persyaratan' => 'AKTA KELAHIRAN',
                'keterangan' => 'Upload Akta Kelahiran',
                'is_wajib' => '0',
                'is_active' => '1',
                'created_by' => '1',
                'updated_by' => '1',
            ]
        ];


        foreach ($persyaratans as $persyaratan) {
            PersyaratanDispensasi::updateOrCreate(['nama_persyaratan' => $persyaratan['nama_persyaratan']], $persyaratan);
        }

        $pegawais = [
            [
                'nip' => 'SB001',
                'nama' => 'Dimas Anhar',
                'tempat_lahir' => 'Blitar',
                'tanggal_lahir' => '1986-07-14',
                'jenis_kelamin' => 'L',
                'nomor_hp' => '081234567890',
                'email' => 'dimas@gmail.com',
                'kecamatan_id' => $kecamatan['id'],
                'kelurahan_id' => $kelurahan['id'],
                'alamat' => '123 Pineapple Street',
                'agama_id' => $agama['id'],
                'status' => '1',
                'created_by' => '1',
                'updated_by' => '1',
            ],
            [
                'nip' => 'SB002',
                'nama' => 'Patrick Jones',
                'tempat_lahir' => 'Blitar',
                'tanggal_lahir' => '1987-02-26',
                'jenis_kelamin' => 'L',
                'nomor_hp' => '082345678901',
                'email' => 'patrick@gmail.com',
                'kecamatan_id' => $kecamatan['id'],
                'kelurahan_id' => $kelurahan['id'],
                'alamat' => '456 Rock Street',
                'agama_id' => $agama['id'],
                'status' => '1',
                'created_by' => '1',
                'updated_by' => '1',
            ],
            [
                'nip' => 'SB003',
                'nama' => 'Reyhan Alkatiri',
                'tempat_lahir' => 'Blitar',
                'tanggal_lahir' => '1972-10-09',
                'jenis_kelamin' => 'L',
                'nomor_hp' => '083456789012',
                'email' => 'rey@gmail.com',
                'kecamatan_id' => $kecamatan['id'],
                'kelurahan_id' => $kelurahan['id'],
                'alamat' => '789 Clarinet Avenue',
                'agama_id' => $agama['id'],
                'status' => '1',
                'created_by' => '1',
                'updated_by' => '1',
            ],
            [
                'nip' => 'SB004',
                'nama' => 'Sandy Setyowati',
                'tempat_lahir' => 'Texas',
                'tanggal_lahir' => '1985-11-17',
                'jenis_kelamin' => 'P',
                'nomor_hp' => '084567890123',
                'email' => 'sandy@gmail.com',
                'kecamatan_id' => $kecamatan['id'],
                'kelurahan_id' => $kelurahan['id'],
                'alamat' => '321 Treedome Lane',
                'agama_id' => $agama['id'],
                'status' => '1',
                'created_by' => '1',
                'updated_by' => '1',
            ],
            [
                'nip' => 'SB005',
                'nama' => 'Dudi Sutrisno',
                'tempat_lahir' => 'Blitar',
                'tanggal_lahir' => '1942-11-30',
                'jenis_kelamin' => 'L',
                'nomor_hp' => '085678901234',
                'email' => 'dudi@gmail.com',
                'kecamatan_id' => $kecamatan['id'],
                'kelurahan_id' => $kelurahan['id'],
                'alamat' => '987 Money Street',
                'agama_id' => $agama['id'],
                'status' => '1',
                'created_by' => '1',
                'updated_by' => '1',
            ],
            [
                'nip' => 'SB006',
                'nama' => 'Mario Latuconsina',
                'tempat_lahir' => 'Chum Bucket',
                'tanggal_lahir' => '1977-07-30',
                'jenis_kelamin' => 'L',
                'nomor_hp' => '086789012345',
                'email' => 'mario@gmail.com',
                'kecamatan_id' => $kecamatan['id'],
                'kelurahan_id' => $kelurahan['id'],
                'alamat' => '654 Evil Lane',
                'agama_id' => $agama['id'],
                'status' => '1',
                'created_by' => '1',
                'updated_by' => '1',
            ],
            [
                'nip' => 'SB007',
                'nama' => 'Gary Johanes',
                'tempat_lahir' => 'Blitar',
                'tanggal_lahir' => '1999-05-14',
                'jenis_kelamin' => 'L',
                'nomor_hp' => '087890123456',
                'email' => 'gary@gmail.com',
                'kecamatan_id' => $kecamatan['id'],
                'kelurahan_id' => $kelurahan['id'],
                'alamat' => '234 Shell Street',
                'agama_id' => $agama['id'],
                'status' => '1',
                'created_by' => '1',
                'updated_by' => '1',
            ],
        ];

        foreach ($pegawais as $pegawai) {
            Pegawai::updateOrCreate(['nip' => $pegawai['nip']], $pegawai);
        }

        $jabatan_fungsional = [
            'periode_id' => Periode::latest()->first()->id,
            'kepala_upt' => Pegawai::where('nip', 'SB001')->first()->id,
            'pembina_utama_muda' => Pegawai::where('nip', 'SB002')->first()->id,
            'pembina' => Pegawai::where('nip', 'SB003')->first()->id,
            'sekretaris' => Pegawai::where('nip', 'SB004')->first()->id,
            'bendahara' => Pegawai::where('nip', 'SB005')->first()->id,
            'pengawas' => Pegawai::where('nip', 'SB006')->first()->id,
            'pengadministrasi_umum' => Pegawai::where('nip', 'SB007')->first()->id,
            'created_by' => '1',
            'updated_by' => '1',
        ];

        JabatanFungsional::updateOrCreate(['periode_id' => Periode::latest()->first()->id], $jabatan_fungsional);
    }
}
