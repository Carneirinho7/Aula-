<?php

namespace App\Http\Controllers;

use App\Models\Chamado;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HelpdeskController extends Controller
{
    public function index(Request $request, Chamado $chamado): View|RedirectResponse
    {
        if ($request->isMethod('post')) {
            $mensagem = $this->processarAcao($request, $chamado);

            return redirect()->route('helpdesk')->with('mensagem', $mensagem);
        }

        $chamados = $chamado->listarChamados();
        $quantidades = $chamado->contarChamados();

        return view('Projeto.helpdesk', [
            'mensagem' => session('mensagem', ''),
            'chamados' => $chamados,
            'quantidades' => $quantidades,
        ]);
    }

    private function processarAcao(Request $request, Chamado $chamado): string
    {
        if ($request->has('cadastrar')) {
            $campos = ['nome', 'setor', 'equipamento', 'descricao', 'prioridade'];
            $dados = [];

            foreach ($campos as $campo) {
                $valor = $request->input($campo);
                $dados[$campo] = is_string($valor) ? $valor : '';
            }

            return $chamado->cadastrarChamado(...array_values($dados))
                ? 'Chamado cadastrado com sucesso!'
                : 'Preencha os campos corretamente para cadastrar o chamado.';
        }

        $numero = filter_var($request->input('numero'), FILTER_VALIDATE_INT);

        if ($numero === false) {
            return 'Não foi possível encontrar o chamado.';
        }

        if ($request->has('atualizar')) {
            $status = $request->input('status');

            return is_string($status) && $chamado->atualizarChamado($numero, $status)
                ? 'Status atualizado!'
                : 'Não foi possível atualizar o chamado.';
        }

        if ($request->has('excluir')) {
            return $chamado->excluirChamado($numero)
                ? 'Chamado excluído!'
                : 'Chamado não encontrado.';
        }

        return 'Ação inválida.';
    }
}
