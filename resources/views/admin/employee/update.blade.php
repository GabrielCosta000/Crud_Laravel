<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-secondary overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <h1 class="mb-0">Editar funcionário</h1>

                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif

                    <form action="{{ route('admin.employee.update', $employees->id) }}" method="POST" onsubmit="prepareData()">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Nome:</label>
                                <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{$employees->name}}">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Sobrenome</label>
                                <input type="text" name="surname" class="form-control" placeholder="Sobrenome:" value="{{$employees->surname}}">
                                @error('surname')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Cargo:</label>
                                <input type="text" name="occupation" class="form-control" placeholder="Cargo:" value="{{$employees->occupation}}">
                                @error('occupation')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Salário</label>
                                <input type="text" name="wage" id="wageInput" class="form-control" placeholder="Salário:" value="{{$employees->wage}}">
                                @error('wage')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Cpf</label>
                                <input type="text" name="cpf" id="cpfInput" class="form-control" placeholder="Cpf:" value="{{$employees->cpf}}">
                                @error('cpf')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                    
                        <div class="row">
                            <div class="d-grid">
                                <button class="btn btn-primary">Editar</button>
                                <a href="{{ route('admin.employee') }}" class="btn btn-primary mt-2">Voltar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('cpfInput').addEventListener('input', function (e) {
            let cpf = e.target.value.replace(/\D/g, '');
            if (cpf.length <= 11) {
                cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
                cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
                cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
            }
            e.target.value = cpf;
        });

        function prepareData() {
            // Format CPF for backend
            const cpfInput = document.getElementById('cpfInput');
            let cpf = cpfInput.value.replace(/\D/g, '');
            if (cpf.length == 11) {
                cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
                cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
                cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
                cpfInput.value = cpf;
            }

            // Convert salary input to use dot instead of comma for backend processing
            const wageInput = document.getElementById('wageInput');
            wageInput.value = wageInput.value.replace(',', '.');
        }

        document.addEventListener('DOMContentLoaded', function() {
            var wageInput = document.getElementById('wageInput');
            wageInput.value = wageInput.value.replace(',', '.');
        });
    </script>
</x-app-layout>
