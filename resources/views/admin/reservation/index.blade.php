@extends('layouts.app')

@section('title','Reservas')

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
                            <h4 class="card-title mt-0">RESERVAS</h4>
                            <p class="card-category">Listagem das Reservas</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table table-hover" width="100%">
                                    <thead class="text-primary">
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Telefone</th>
                                    <th>Email </th>
                                    <th>Data|Reserva</th>
                                    <th>Mensagem</th>
                                    <th>Status</th>
                                    <th>Data|Contato</th>
                                    <th>Ações</th>
                                    </thead>
                                    <tbody>
                                    @foreach($reservations as $reservation)
                                        <tr>
                                            <td>{{$reservation->id}}</td>
                                            <td>{{$reservation->name}}</td>
                                            <td>{{$reservation->phone}}</td>
                                            <td>{{$reservation->email}}</td>
                                            <td>{{$reservation->date_and_time}}</td>
                                            <td rel="tooltip" data-original-title="{{$reservation->message}}">{{str_limit($reservation->message, 15)}}</td>
                                            <th>
                                                @if($reservation->status == true)
                                                    <span class="badge badge-success">Confirmado</span>
                                                @else
                                                    <span class="badge badge-warning">Pendente</span>
                                                @endif
                                            </th>
                                            <td>{{$reservation->created_at->format('d/m/Y - H:m:s')}}</td>
                                            <td class="td-actions text-right">
                                                <a href="" rel="tooltip" class="btn btn-primary btn-link btn-sm" data-original-title="Editar">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <form id="delete-form-{{$reservation->id}}" action="" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" rel="tooltip" class="btn btn-danger btn-link btn-sm" data-original-title="Deletar" onclick="if (confirm('Deseja deletar essa Reserva ?')){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{$reservation->id}}').submit();
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
                        {{$reservations->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush