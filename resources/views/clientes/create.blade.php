<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clientes > Adicionar Novo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('clientes.index') }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Voltar para Listagem
                    </a>
                </div>

                <div class="flex flex-col p-6">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <form action="{{ route('clientes.store') }}" class="w-full" method="POST">
                                @csrf
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="grid-first-name">
                                            Nome Completo
                                        </label>
                                        <input name="nome"
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                            id="grid-first-name" type="text" placeholder="" required>
                                        {{-- <p class="text-red-500 text-xs italic">Por favor, preencha este campo!</p> --}}
                                    </div>
                                    <div class="w-full md:w-1/3 px-3">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="grid-last-name">
                                            E-mail
                                        </label>
                                        <input name="email"
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            id="grid-email" type="email" placeholder="" required>
                                    </div>
                                    <div class="w-full md:w-1/3 px-3">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="grid-whatsapp">
                                            WhatsApp
                                        </label>
                                        <input name="whatsapp"
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            id="grid-whatsapp" type="text" placeholder="" required>
                                        {{-- <p class="text-gray-600 text-xs italic">Preencha este campo!</p> --}}
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6 px-3">
                                    <h4>Endereço</h4>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-3">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="grid-zip">
                                            CEP
                                        </label>
                                        <input name="cep"
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            id="grid-cep" type="text" placeholder="">
                                    </div>

                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-3">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="grid-logradouro">
                                            Logradouro
                                        </label>
                                        <input name="logradouro"
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            id="grid-logradouro" type="text" placeholder="">
                                    </div>
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-3">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="grid-city">
                                            Número
                                        </label>
                                        <input name="numero"
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            id="grid-numero" type="text" placeholder="">
                                    </div>
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-3">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="grid-bairro">
                                            Bairro
                                        </label>
                                        <input name="bairro"
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            id="grid-bairro" type="text" placeholder="">
                                    </div>
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-3">
                                        <label name="cidade"
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="grid-cidade">
                                            Cidade
                                        </label>
                                        <input name="cidade"
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            id="grid-cidade" type="text" placeholder="">
                                    </div>
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-3">
                                        <label name="estado"
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="estado">
                                            Estado
                                        </label>
                                        <div class="relative">
                                            <select name="estado"
                                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                id="estado">
                                                <option value="AC">Acre</option>
                                                <option value="AL">Alagoas</option>
                                                <option value="AP">Amapá</option>
                                                <option value="AM">Amazonas</option>
                                                <option value="BA">Bahia</option>
                                                <option value="CE">Ceará</option>
                                                <option value="DF">Distrito Federal</option>
                                                <option value="ES">Espírito Santo</option>
                                                <option value="GO">Goiás</option>
                                                <option value="MA">Maranhão</option>
                                                <option value="MT">Mato Grosso</option>
                                                <option value="MS">Mato Grosso do Sul</option>
                                                <option value="MG">Minas Gerais</option>
                                                <option value="PA">Pará</option>
                                                <option value="PB">Paraíba</option>
                                                <option value="PR">Paraná</option>
                                                <option value="PE">Pernambuco</option>
                                                <option value="PI">Piauí</option>
                                                <option value="RJ">Rio de Janeiro</option>
                                                <option value="RN">Rio Grande do Norte</option>
                                                <option value="RS">Rio Grande do Sul</option>
                                                <option value="RO">Rondônia</option>
                                                <option value="RR">Roraima</option>
                                                <option value="SC">Santa Catarina</option>
                                                <option value="SP">São Paulo</option>
                                                <option value="SE">Sergipe</option>
                                                <option value="TO">Tocantins</option>
                                                <option value="EX">Estrangeiro</option>
                                            </select>
                                            <div
                                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-3/3 px-3 mb-6 md:mb-3">
                                        <label for="observacoes"
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Observações</label>
                                        <textarea name="observacoes" id="observacoes" rows="4"
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            placeholder=""></textarea>

                                    </div>
                                    <div class="w-full md:w-3/3 px-3 mb-6 md:mb-3">
                                        <input type="submit"
                                            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                                            value="Salvar">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        document.getElementById('grid-cep').addEventListener('input', buscarCEP);
        document.getElementById('grid-cep').addEventListener('blur', function(){
            const cep = document.getElementById('grid-cep').value.replace(/\D/g, '');
            if(cep.length < 8){
                alert('Digite um CEP válido!');
            }
        })

        function buscarCEP() {
            const cep = document.getElementById('grid-cep').value.replace(/\D/g, '');
            
            const url = `https://viacep.com.br/ws/${cep}/json/`;

            fetch(url)
                .then(response => response.json())
                .then(data => exibirDadosCEP(data))
                .catch(error => console.error('Erro ao buscar CEP:', error));
        }

        function exibirDadosCEP(data) {
            if (data.erro) {
                alert('CEP não encontrado. Verifique o CEP digitado.');
            } else {
                const logradouro = document.getElementById('grid-logradouro')
                const bairro = document.getElementById('grid-bairro')
                const cidade = document.getElementById('grid-cidade')
                const estado = document.getElementById('estado')

                logradouro.value = data.logradouro
                bairro.value = data.bairro
                cidade.value = data.localidade
                estado.value = data.uf
            }
        }
    </script>
</x-app-layout>
