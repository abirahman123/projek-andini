<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Formatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Register;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $data['phone'] = Formatter::phone($data['phone'] ?? '');
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'numeric', 'digits_between:7,15', 'starts_with:0,62', 'unique:register,nomor_hp'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8', 'same:password']
        ], [
            'name.required' => 'Nama Lengkap harus diisi',
            'name.max' => 'Nama Lengkap tidak boleh lebih dari 255 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus berupa email',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter',
            'email.unique' => 'Email sudah terdaftar',
            'phone.required' => 'Nomor Telepon harus diisi',
            'phone.numeric' => 'Nomor Telepon harus berupa angka',
            'phone.unique' => 'Nomor Telepon sudah terdaftar',
            'phone.digits_between' => 'Nomor Telepon tidak valid',
            'phone.starts_with' => 'Nomor Telepon harus berawalan 0 atau 62',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi Password tidak sesuai',
            'password_confirmation.required' => 'Konfirmasi Password harus diisi',
            'password_confirmation.string' => 'Konfirmasi Password harus berupa string',
            'password_confirmation.min' => 'Konfirmasi Password minimal 8 karakter',
            'password_confirmation.same' => 'Konfirmasi Password tidak sesuai dengan Password'
        ]);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    protected function register(\Illuminate\Http\Request $request)
    {
        $this->validator($request->all())->validate();
        try{
            $user = $this->create($request->all());
        }catch(\Throwable $th){
            return \ResponseFormatter::error($th->getMessage());
        }

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return \ResponseFormatter::success('Registrasi berhasil. Silakan login untuk melakukan pengajuan dispensasi.');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->email_verified_at = null;
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->password = Hash::make($data['password']);
            $user->remember_token = Str::random(10);
            $user->save();
            $user->assignRole('catin');

            $register = new Register();
            $register->user_id = $user->id;
            $register->nama = $user->name;
            $register->email = $user->email;
            $register->nomor_hp = Formatter::phone($data['phone']);
            $register->alamat = '';
            $register->is_active = '1';
            $register->save();
            DB::commit();
            return $user;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
