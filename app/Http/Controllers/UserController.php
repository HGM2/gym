<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Membership;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('membership')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $memberships = Membership::all();
        return view('users.create', compact('memberships'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'membership_id' => 'nullable|exists:memberships,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $validatedData['photo_path'] = $path;
        }

        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);

        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $memberships = Membership::all();
        return view('users.edit', compact('user', 'memberships'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'membership_id' => 'nullable|exists:memberships,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $validatedData['photo_path'] = $path;
        }

        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->photo_path) {
            \Storage::delete('public/' . $user->photo_path);
        }
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
