@extends('layouts.app')

@section('title','Itens')

@push('css')

@endpush

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.partial.msg')
                <a href="{{route('item.create')}}" class="btn btn-primary"><i class="material-icons">restaurant_menu</i> ADD NOVO ITEM</a>
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title mt-0">ITENS</h4>
                        <p class="card-category">Listagem de Itens</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table" class="table table-hover" width="100%">
                                <thead class="text-primary">
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Imagem</th>
                                    <th>Categoria</th>
                                    <th>Descrição</th>
                                    <th>Preço</th>
                                    <th>Data|Criação</th>
                                    <th>Data|Modificação</th>
                                    <th>Ações</th>
                                </thead>
                                <tbody>
                                    @forelse($items as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>
                                            <img class="img-responsive img-thumbnail rounded" width="80" height="60" src="{{asset('uploads/item/'.$item->image)}}">
                                        </td>
                                        <td rel="tooltip" data-original-title="{{$item->category->name}}">{{str_limit($item->category->name, 15)}}</td>
                                        <td rel="tooltip" data-original-title="{{$item->description}}">{{str_limit($item->description, 15)}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>{{$item->created_at->format('d/m/Y - H:m:s')}}</td>
                                        <td>{{$item->updated_at->format('d/m/Y - H:m:s')}}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{route('item.edit',$item->id)}}" rel="tooltip" class="btn btn-primary btn-link btn-sm" data-original-title="Editar">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <form id="delete-form-{{$item->id}}" action="{{route('item.destroy',$item->id)}}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" rel="tooltip" class="btn btn-danger btn-link btn-sm" data-original-title="Deletar" onclick="if (confirm('Deseja realmente deletar esse item ?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$item->id}}').submit();
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
                                            <span class="text-center">Desculpe, não há Itens cadastrados :(</span>
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                        {{$items->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

@endpush