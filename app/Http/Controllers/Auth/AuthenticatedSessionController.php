<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Users;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login-v2');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $Auth = Auth::user();     

        $Rol = $Auth->rol_id;

        $UserLogin = Users::where('id', $Auth->id)->first();
        $UnidadNegocio = $UserLogin->departamentos->unidadNegocio->DESCRIPCION ?? ' - ';
        $Departamentos = $UserLogin->departamentos->Departamento->DESCRIPCION ?? ' - ';

        session([
            'user_name' => $Auth->name,
            'und_negci' => $UnidadNegocio,
            'departame' => $Departamentos
        ]);

        $Path = in_array($Rol, [2, 4]) ? 'dashboard' : 'new-doc';

        return redirect()->intended(route($Path, absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
