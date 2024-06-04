<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-secondary overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <h1 class="mb-0">Novo produto:</h1>

                    <p><a href="{{ route('admin.product') }}" class="btn btn-primary">Voltar</a></p>

                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif

                    <form action="{{route('admin.product.save')}}" method="POST" enctype="multipart/form-data" onsubmit="formatPrice()">
                        @csrf

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Nome:</label>
                                <input type="text" name="title" class="form-control" placeholder="Nome:">
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Categoria:</label>
                                <input type="text" name="category" class="form-control" placeholder="Categoria:">
                                @error('category')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Preço:</label>
                                <input type="text" name="price" id="priceInput" class="form-control" placeholder="Preço:">
                                @error('price')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="d-grid">
                                <button class="btn btn-primary">Adicionar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para formatar o preço antes de enviar o formulário -->
    <script>
        function formatPrice() {
            var priceInput = document.getElementById('priceInput');
            var price = priceInput.value.replace(/[^\d,]/g, ''); // Remove todos os caracteres não numéricos exceto a vírgula
            priceInput.value = price.replace(',', '.'); // Substitui a vírgula por ponto para garantir um formato numérico adequado
        }
    </script>
</x-app-layout>
