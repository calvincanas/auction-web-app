<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect(route('users.index'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->validated());

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect(route('users.index'));
    }

    public function confirmDelete(User $user)
    {
        return view('users.confirm-delete', [
            'user' => $user
        ]);
    }

    public function datatable(Request $request)
    {
        $data = User::query();
        return DataTables::of($data)
            ->addColumn('action', content: function ($row) {
                $editButton = sprintf(
                    '<a href="%s" class="%s">%s</a>',
                    route('users.edit', $row),
                    'btn btn-warning',
                    'Edit',
                );
                $deleteButton = sprintf(
                    '<a href="%s" class="%s">%s</a>',
                    route('users.confirm-delete', $row),
                    'btn btn-danger',
                    'Delete',
                );
                $content = <<<ACTION
                    $editButton $deleteButton 
                ACTION;
                return $content;
            })
            ->make();
    }
}
