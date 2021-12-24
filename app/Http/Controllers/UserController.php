<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function registration() {
        return view('auth.register');
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function saveRegistration(Request $request) {
        $validator = Validator::make($request->all(), array(
            'name'          => 'required | string | max:100',
            'email'         => 'required| unique:users,email',
            'password'      => 'required | confirmed',
            'phone'         => 'required',
        ));

        if ($validator->fails()) 
        {
            return redirect()
                ->route('registration')
                ->with('error.alert', 'Registrasi gagal');
        }

        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'phone' => $request->get('phone'),
        ])->assignRole('CUSTOMER');

        return redirect()->route('login');
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function listPengguna(Request $request) 
    {
        $jumlah_halaman = 5;

        $keyword = $request->get('search') ? $request->get('search') : '';

        $users = User::where("name", "LIKE", "%$keyword%")->simplePaginate($jumlah_halaman);

        $number = numberPagination($jumlah_halaman);

        return view('admin.pengguna.index', compact('users', 'number'));
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function createPengguna() 
    {
        return view('admin.pengguna.create');
    }
    
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function storePengguna(Request $request) 
    {
        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'phone' => $request->get('phone'),
        ])->assignRole($request->get('role'));

        return redirect()->route('admin.pengguna.index');
    }

    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    public function editPengguna($id) 
    {
        $user = User::find($id);
        return view('admin.pengguna.edit', compact('user'));
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function updatePengguna(Request $request, $id) 
    {
        $user = User::find($id);
        
        $user->name = $request->get('name');
        $user->phone = $request->get('phone');
        
        if ($request->get('password')) {
            $user->password = Hash::make($request->get('password'));
        }

        $user->save();

        $user->syncRoles($request->role);

        return redirect()->route('admin.pengguna.index');
    }
}
