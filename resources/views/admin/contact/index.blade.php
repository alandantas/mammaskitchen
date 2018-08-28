@extends('layouts.app')

@section('title','Contato')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.partial.msg')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title mt-0">MENSAGENS</h4>
                            <p class="card-category">Listagem de mensagens recebidas</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table table-hover" width="100%">
                                    <thead class="text-primary">
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Email </th>
                                    <th>Assunto</th>
                                    <th>Mensagem</th>
                                    <th>Data|Contato</th>
                                    <th>Ações</th>
                                    </thead>
                                    <tbody>
                                    @foreach($contacts as $contact)
                                        <tr>
                                            <td>{{$contact->id}}</td>
                                            <td>{{$contact->name}}</td>
                                            <td>{{$contact->email}}</td>
                                            <td>{{$contact->subject}}</td>
                                            <td rel="tooltip" data-original-title="{{$contact->message}}">{{str_limit($contact->message, 15)}}</td>
                                            <td>{{$contact->created_at->format('d/m/Y - H:m:s')}}</td>
                                            <td class="td-actions text-right">
                                                <a href="{{route('contact.show',$contact->id)}}" rel="tooltip" class="btn btn-primary btn-link btn-sm" data-original-title="Visualizar">
                                                    <i class="material-icons">search</i>
                                                </a>
                                                <form id="delete-form-{{$contact->id}}" action="{{route('contact.destroy',$contact->id)}}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" rel="tooltip" class="btn btn-danger btn-link btn-sm" data-original-title="Deletar" onclick="if (confirm('Deseja deletar essa Mensagem ?')){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{$contact->id}}').submit();
                                                        }else {
                                                        event.preventDefault();
                                                        } ">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{$contacts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush