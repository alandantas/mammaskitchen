@extends('layouts.app')

@section('title','Categorias')

@push('css')

@endpush

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.partial.msg')
                <a href="{{route('category.create')}}" class="btn btn-primary"><i class="material-icons">playlist_add</i>  ADD Nova Categoria</a>
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title mt-0">CATEGORIAS</h4>
                        <p class="card-category">Listagem das categorias</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table" class="table table-hover" width="100%">
                                <thead class="text-primary">
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Slug</th>
                                    <th>Data|Criação</th>
                                    <th>Data|Modificação</th>
                                    <th>Ações</th>
                                </thead>
                                <tbody>
                                    @forelse($categories as $key=>$category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->slug}}</td>
                                        <td>{{$category->created_at->format('d/m/Y - H:m:s')}}</td>
                                        <td>{{$category->updated_at->format('d/m/Y - H:m:s')}}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{route('category.edit',$category->id)}}" rel="tooltip" class="btn btn-primary btn-link btn-sm" data-original-title="Editar">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <form id="delete-form-{{$category->id}}" action="{{route('category.destroy',$category->id)}}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" rel="tooltip" class="btn btn-danger btn-link btn-sm" data-original-title="Deletar" onclick="if (confirm('Deseja realmente deletar essa categoria ?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$category->id}}').submit();
                                            }else {
                                                event.preventDefault();
                                                    } ">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </td>
                                    </tr>
                                    @empty
                                        <div class="alert alert-danger">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="material-icons">close</i>
                                            </button>
                                            <span class="text-center">Desculpe, não há categorias salvas :(</span>
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                        {{$categories->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

@endpush