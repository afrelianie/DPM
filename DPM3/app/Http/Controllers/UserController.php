<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
        $data['list_user'] = user::all();
        return view('user.index', $data);
    }

    function Store()
    {
        $user = new user;
        $user->name = request('name');
        $user->password = bcrypt(request('password'));
        $user->save();

        return redirect('admin/user')->with('success', 'Berhasil Ditambahkan');
    }

    function Show(user $user)
    {
        $data['user'] = $user;
        return view('user.show', $data);
    }
    function edit(user $user)
    {
        $data['user'] = $user;
        return view('user.edit', $data);
    }
    // function update(user $user)
    // {

    //     $user->username = request('name');
    //     if (request('password')) $user->password = bcrypt(request('password'));
    //     $user->save();
    //     return redirect('admin/user')->with('sucsess', 'data berhasil tambahkan');
    // }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|min:3|max:37',
        ]);

        if($request->input('password')) {
            $user_data = [
            'name' => $request->name,
            'password' => bcrypt($request->password)
            ];
        }
        else{
            $user_data = [
            'name' => $request->name,
            ];
        }

        $user = User::find($id);
        $user->update($user_data);

        return redirect('admin/user')->with('success','Berhasil Diupdate');

    }


    function destroy(user $user)
    {
        $user->delete();

        return redirect('admin/user')->with('danger', 'data berhasil dihapus');
    }
}
