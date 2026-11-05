<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class Portfolio extends Controller
{
    public function index(): View
    {
        return view('Projeto.portfolio');
    }

    public function idade(): View
    {
        return view('Projeto.idade');
    }

    public function jogos(): View
    {
        return view('Projeto.jogos');
    }

    public function notas(): View
    {
        return view('Projeto.notas');
    }

    public function loginBasico(): View
    {
        return view('Projeto.login-basico');
    }

    public function poo2(): View
    {
        return view('Projeto.poo2');
    }
}
