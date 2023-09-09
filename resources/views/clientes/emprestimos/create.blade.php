<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Empréstimos > Adicionar Novo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('emprestimos.index') }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Voltar para Listagem
                    </a>
                </div>

                <div class="flex flex-col p-6">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <form action="{{ route('emprestimos.store') }}" class="w-full" method="POST">
                                @csrf
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="grid-first-name">
                                            Valor
                                        </label>
                                        <input name="valor"
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                            id="grid-valor" type="text" placeholder="" required>
                                        {{-- <p class="text-red-500 text-xs italic">Por favor, preencha este campo!</p> --}}
                                    </div>


                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-3">
                                        <label name="estado"
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="estado">
                                            Ciclo de Pagamento
                                        </label>
                                        <div class="relative">
                                            <select name="ciclo"
                                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                id="ciclo">
                                                <option>Escolha o ciclo</option>
                                                <option value="Diário">Diário</option>
                                                <option value="Semanal">Semanal</option>
                                                <option value="Mensal">Mensal</option>
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

                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="grid-first-name">
                                            Valor a Pagar
                                        </label>
                                        <input name="valor-a-pagar"
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                            id="grid-valor-a-pagar" type="text" placeholder="" readonly>
                                        {{-- <p class="text-red-500 text-xs italic">Por favor, preencha este campo!</p> --}}
                                    </div>

                                    <div class="w-full md:w-3/3 px-3 mb-6 md:mb-0 simulador-de-parcelas">
                                        <h2>Simulador de Parcelas</h2>
                                        <hr>
                                        <p>Preencha os campos para simular as parcelas do seu empréstimo e as datas de
                                            pagamento.</p>
                                        <div id="parcelas-list" class="list-disc pl-5"></div>
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
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
        // Função para calcular o valor total com acréscimo de 30%
        function calcularValorTotal() {
            const inputValor = document.getElementById('grid-valor');
            const inputValorAPagar = document.getElementById('grid-valor-a-pagar');

            // Obter o valor informado no campo 'valor'
            const valor = parseFloat(inputValor.value);

            // Verificar se o valor é válido
            if (isNaN(valor)) {
                inputValorAPagar.value = "Valor inválido";
            } else {
                // Calcular o valor total acrescentando 30%
                const valorTotal = valor * 1.3;

                // Exibir o valor total no campo 'valor-a-pagar'
                inputValorAPagar.value = valorTotal.toFixed(2);
            }
        }

        // Associar a função ao evento 'oninput' do campo 'valor'
        const inputValor = document.getElementById('grid-valor');
        inputValor.addEventListener('input', calcularValorTotal);




        // Função para calcular e exibir as parcelas
        function calcularParcelas() {
            const inputCiclo = document.getElementById('ciclo');
            const inputValorAPagar = document.getElementById('grid-valor-a-pagar');

            // Obter o valor a pagar e o ciclo selecionado
            const valorAPagar = parseFloat(inputValorAPagar.value);
            const cicloSelecionado = inputCiclo.value;

            // Verificar se o valor é válido e se um ciclo foi selecionado
            if (isNaN(valorAPagar) || cicloSelecionado === 'Escolha o ciclo') {
                return;
            }

            // Limpar a lista de parcelas
            const parcelasList = document.getElementById('parcelas-list');
            parcelasList.innerHTML = '';

            // Calcular o valor da parcela com base no ciclo selecionado
            let valorParcela;
            let numeroParcelas;
            if (cicloSelecionado === 'Diário') {
                valorParcela = valorAPagar / 30;
                numeroParcelas = 30;
            } else if (cicloSelecionado === 'Semanal') {
                valorParcela = valorAPagar / 4;
                numeroParcelas = 4;
            } else if (cicloSelecionado === 'Mensal') {
                valorParcela = valorAPagar;
                numeroParcelas = 1;
            }

            // Obter a data atual e criar uma data para o próximo dia
            const dataAtual = new Date();
            const proximoDia = new Date(dataAtual);
            proximoDia.setDate(dataAtual.getDate() + 1);

            // Exibir as parcelas
            for (let i = 0; i < numeroParcelas; i++) {
                const dataParcela = new Date(proximoDia);
                const proximoMes = dataParcela.getMonth() + 1;

                if (dataAtual.getDate() > 28) {
                    dataParcela.setDate(0); // Vai para o último dia do mês anterior, o que será o último dia do próximo mês
                }

                if (cicloSelecionado === 'Diário') {
                    dataParcela.setDate(proximoDia.getDate() + i);
                } else if (cicloSelecionado === 'Semanal') {
                    dataParcela.setDate(proximoDia.getDate() + i * 7);
                } else if (cicloSelecionado === 'Mensal') {
                    dataParcela.setMonth(proximoMes);
                }

                const valorFormatado = valorParcela.toFixed(2);

                // Criar um elemento para exibir cada parcela
                const parcelaElement = document.createElement('div');
                parcelaElement.classList.add('grid', 'grid-cols-3', 'gap-3');
                parcelaElement.innerHTML =
                    `
                        <div class="numeroParcela">Parcela ${i+1}</div>
                        <div class="dataParcela">${dataParcela.toLocaleDateString('pt-BR')}</div>
                        <div class="valorParcela">R$ ${valorFormatado}</div>
                    `;
                parcelasList.appendChild(parcelaElement);
            }
        }

        // Associar a função ao evento 'change' do campo 'ciclo'
        const inputCiclo = document.getElementById('ciclo');
        inputCiclo.addEventListener('change', calcularParcelas);
    </script>
</x-app-layout>
