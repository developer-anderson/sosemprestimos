<?php

namespace App\Http\Controllers;

use App\Models\{
    Emprestimo,
    Cliente
};
use Illuminate\Http\Request;

class EmprestimosController extends Controller
{

    protected $emprestimo;
    protected $cliente;

    // public function __construct(Emprestimo $emprestimo, Cliente $cliente)
    // {
    //     $this->emprestimo = $emprestimo;
    //     $this->cliente = $cliente;
    // }
    //
    public function index($clientId)
    {
        if (!$cliente = $this->cliente->find($clientId)){
            return redirect()->back();
        }

        $emprestimos = $cliente->emprestimos()->get();
        return view('clientes.emprestimos.index', compact('cliente', 'emprestimos'));
    }

    public function create()
    {
        return view('clientes.emprestimos.create');
    }

    public function store(Request $request)
    {
        Emprestimo::create($request->all());
        return redirect()->route('emprestimos.index');
    }

    public function edit($id)
    {
        $emprestimos = Emprestimo::where('id', $id)->first();
        if (!empty($emprestimos)) {
            return view('emprestimos.edit', ['emprestimos' => $emprestimos]);
        } else {
            return redirect()->route('emprestimos.index');
        }
    }

    public function update(Request $request, $id)
    {
        $data = [
            'nome' => $request->nome,
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            'cep' => $request->cep,
            'logradouro' => $request->logradouro,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'observacoes' => $request->observacoes,
        ];
        Emprestimo::where('id', $id)->update($data);
        return redirect()->route('emprestimos.index');
    }

    public function destroy($id)
    {
        Emprestimo::where('id', $id)->delete();
        return redirect()->route('emprestimos.index');
    }
}
