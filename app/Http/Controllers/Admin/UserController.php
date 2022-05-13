<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            $query = User::query(); 
            return Datatables::of($query)
            ->addColumn('action', function($item) {
                 return '
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="' . route('user.edit', $item->id) .'">Edit</a>
                            <form action="' . route('user.destroy', $item->id) . '" method="POST">
                                ' . method_field('delete') . csrf_field() .'
                                <button type="submit" class="dropdown-item text-danger">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                ';
            })
            ->rawColumns(['action'])
            -> make();
        }
        $this->authorize('super_admin');
        return view('pages.admin.user.index');
    }

    public function create()
    {
        $this->authorize('super_admin');
        return view('pages.admin.user.create');
    }

    public function store(UserRequest $request)
    {
        $this->authorize('super_admin');
        $data = $request->all();

        $data['password'] = bcrypt($request->password);

        User::create($data);

        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        $this->authorize('super_admin');
        $item = User::findOrFail($id);

        return view('pages.admin.user.edit',[
            'item' => $item,
        ]);
    }

     public function update(UserRequest $request, $id)
    {
        $this->authorize('super_admin');
        $item = User::findOrFail($id);
        $data = $request->all();

        if($request->password)
        {
            $data['password'] = bcrypt($request->password);
        }
        else
        {
            unset($data['password']);
        }

        $item->update($data);

        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        $item = User::findOrFail($id);
        $item->delete();

        return redirect()->route('user.index');
    }
}
