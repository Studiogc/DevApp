<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\rol;

class RolController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;

        if ($buscar==''){
            $roles = rol::orderBy('id', 'desc')->paginate(3);
        }
        else{
            $roles = rol::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(3);
        }

        return [
            'pagination' => [
                'total'        => $roles->total(),
                'current_page' => $roles->currentPage(),
                'per_page'     => $roles->perPage(),
                'last_page'    => $roles->lastPage(),
                'from'         => $roles->firstItem(),
                'to'           => $roles->lastItem(),
            ],
            'roles' => $roles
        ];
    }

    public function selectRol(Request $request){
        $roles = rol::where('condicion','=','1')
            ->select('id','nombre')
            ->orderBy('nombre','asc')->get();
        return ['roles' => $roles];
    }
}
