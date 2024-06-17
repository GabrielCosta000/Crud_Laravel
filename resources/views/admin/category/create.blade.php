<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-secondary overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <h1 class="mb-0">Nova Categoria:</h1>

                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif

                    <form action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data" onsubmit="formatInputs()">
                        @csrf

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Categoria:</label>
                                <input type="text" name="category" class="form-control" placeholder="Nome da Categoria:">
                                @error('category')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-grid">
                                <button class="btn btn-primary" style="width: 100%">Adicionar</button>
                            </div>
                            <div class="d-grid">
                                <button><a href="{{ route('admin.category') }}" class="btn btn-primary" style="width: 100%">Voltar</a></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
