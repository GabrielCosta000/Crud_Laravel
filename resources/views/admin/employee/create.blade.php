<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-secondary overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <h1 class="mb-0">Novo funcionário:</h1>

                    

                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif

                    <form action="{{ route('admin.employee.store') }}" method="POST" enctype="multipart/form-data" onsubmit="formatInputs()">
                        @csrf

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Nome:</label>
                                <input type="text" name="name" class="form-control" placeholder="Nome:">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Sobrenome</label>
                                <input type="text" name="surname" class="form-control" placeholder="Sobrenome:">
                                @error('surname')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Cargo:</label>
                                <input type="text" name="occupation" class="form-control" placeholder="Cargo:">
                                @error('occupation')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Salário</label>
                                <input type="text" name="wage" id="priceInput" class="form-control" placeholder="Salário:" oninput="formatWage()">
                                @error('wage')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Cpf</label>
                                <input type="text" name="cpf" id="cpfInput" class="form-control" placeholder="Cpf:" oninput="formatCpf()">
                                @error('cpf')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-grid">
                                <button class="btn btn-primary" style="width: 100%">Adicionar</button>
                            </div>
                            <div class="d-grid mt-2">
                                <button><a href="{{ route('admin.employee') }}" class="btn btn-primary" style="width: 100%">Voltar</a></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function formatCpf() {
            var cpfInput = document.getElementById('cpfInput');
            var cpfValue = cpfInput.value.replace(/\D/g, ''); // Remove non-digit characters
            if (cpfValue.length <= 11) {
                cpfValue = cpfValue.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, function(_, g1, g2, g3, g4) {
                    return g1 + '.' + g2 + '.' + g3 + '-' + g4;
                });
            }
            cpfInput.value = cpfValue;
        }
        function formatInputs() {
            formatCpf();
        }

    </script>
</x-app-layout>
