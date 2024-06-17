<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
            <div class="bg-secondary overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <h1 class="mb-0">Categoria de Produtos</h1>

                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif

                    <hr>

                    <div class="p-4">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                <tr>
                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle">{{ $category->category }}</td>
                                    <td class="align-middle">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{route('admin.category.edit', ['id'=>$category->id])}}" type="button" class="btn btn-warning">Editar</a>
                                            <a href="{{route('admin.category.delete', ['id'=>$category->id])}}" type="button" class="btn btn-danger">Deletar</a>
                                        </div>
                                    </td>
                                </tr>
                                
                                @empty
                                <tr>
                                    <td class="text-center text-danger" colspan="12">Não há nenhuma categoria cadastrada</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                <div class="bg-secondary p-4 mt-4 d-flex justify-content-end">
                    <div >
                        <a href="{{ route('admin.category.create') }}" class="btn btn-primary m-2">Novo</a>
                    </div>
                    <div>
                        <a href="./dashboard" class="btn btn-primary m-2">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

