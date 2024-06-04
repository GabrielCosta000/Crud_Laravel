<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-secondary overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <h1 class="mb-0">Editar produto:</h1>

                    <p>
                        <a href="{{ route('admin.product') }}" class="btn btn-primary">Voltar</a>
                    </p>

                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif

                    <form action="{{ route('admin.product.update', $products->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Nome:</label>
                                <input type="text" name="title" class="form-control" placeholder="Nome:" value="{{$products->title}}">
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Categoria:</label>
                                <input type="text" name="category" class="form-control" placeholder="Categoria:" value="{{$products->category}}">
                                @error('category')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Preço:</label>
                                <input type="number" name="price" class="form-control" id="priceInput" placeholder="Preço:" value="{{$products->price}}">
                                @error('price')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="d-grid">
                                <button class="btn btn-primary">Editar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function formatPrice() {
            var priceInput = document.getElementById('priceInput');
            var price = priceInput.value.replace(/[^\d,]/g, ''); // Remove todos os caracteres não numéricos exceto a vírgula
            priceInput.value = price.replace(',', '.'); // Substitui a vírgula por ponto para garantir um formato numérico adequado
        }
    </script>
</x-app-layout>