<?php

namespace App\Http\Controllers;

use App\Models\{
    Cliente,
    Emprestimo
};
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    //
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', ['clientes' => $clientes]);
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        Cliente::create($request->all());
        return redirect()->route('clientes.index');
    }

    public function edit($id)
    {
        $clientes = Cliente::where('id', $id)->first();
        if (!empty($clientes)) {
            return view('clientes.edit', ['clientes' => $clientes]);
        } else {
            return redirect()->route('clientes.index');
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
        Cliente::where('id', $id)->update($data);
        return redirect()->route('clientes.index');
    }

    public function destroy($id)
    {
        Cliente::where('id', $id)->delete();
        return redirect()->route('clientes.index');
    }

    public function emprestimos($id)
    {
        $cliente = Cliente::where('id', $id)->first();
        $emprestimos = Emprestimo::all();

        if (!empty($cliente)) {
            return view('clientes.emprestimos.index', ['clientes' => $cliente, 'emprestimos' => $emprestimos]);
        } else {
            return redirect()->route('clientes.index');
        }
    }

    // public function emprestimosCreate($id)
    // {

    //     $cliente = Cliente::where('id', $id)->first();
    //     $emprestimos = Emprestimo::all();

    //     if (!empty($cliente)) {
    //         return view('clientes.emprestimos.create', ['id' => $id]);
    //     } else {
    //         return view('clientes.emprestimos.index', ['clientes' => $cliente, 'emprestimos' => $emprestimos]);
    //     }

    // }


    public function emprestimosCreate($id)
    {
        // Obtenha o cliente com o ID fornecido
        $cliente = Cliente::find($id);

        if (!$cliente) {
            // Se o cliente não for encontrado, redirecione ou retorne uma resposta de erro
            return redirect()->route('clientes.index')->with('error', 'Cliente não encontrado.');
        }

        // Carregue outras informações necessárias para o formulário de criação de empréstimo, se necessário

        // Retorne a view com os dados necessários
        return view('emprestimos.create', compact('cliente'));
    }

    // Método para processar o formulário de criação de empréstimo enviado pelo cliente
    public function emprestimosStore(Request $request, $id)
    {
        // Lógica para salvar os dados do empréstimo relacionados ao cliente com o ID fornecido
        // $request contém os dados enviados pelo formulário de criação de empréstimo

        // Exemplo de lógica para salvar o empréstimo no banco de dados (caso necessário)
        $emprestimo = new Emprestimo();
        $emprestimo->cliente_id = $id;
        $emprestimo->valor = $request->input('valor');
        // ...
        $emprestimo->save();

        // Redirecione ou retorne uma resposta de sucesso
        return redirect()->route('clientes.index')->with('success', 'Empréstimo criado com sucesso.');
    }
}
