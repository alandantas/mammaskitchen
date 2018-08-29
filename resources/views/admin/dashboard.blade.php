@extends('layouts.app')

@section('title','Dashboard')

@push('css')

@endpush

@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">Categorias / Item</p>
                  <h3 class="card-title">{{$categoryCount}} / {{$itemCount}}
                    <small></small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">view_list</i>
                    <a href="#">Total de Categorias e Itens</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">slideshow</i>
                  </div>
                  <p class="card-category">Sliders</p>
                  <h3 class="card-title">{{$sliderCount}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">photo_size_select_actual</i>
                    <a href="{{route('slider.index')}}">Gerenciar Sliders</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info</i>
                  </div>
                  <p class="card-category">Reservas</p>
                  <h3 class="card-title">{{$reservations->count()}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">info</i>
                    <a href="{{route('reservation.index')}}">Reservas pendentes!</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">notifications_active</i>
                  </div>
                  <p class="card-category">Mensagens</p>
                  <h3 class="card-title">{{$contactCount}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">notifications_active</i>
                    <a href="{{route('contact.index')}}">Mensagens recebidas.</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

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
                          <th>
                            @if($reservation->status == true)
                              <span class="badge badge-success">Confirmado</span>
                            @else
                              <span class="badge badge-warning">Pendente</span>
                            @endif
                          </th>
                          <td>{{$reservation->created_at->format('d/m/Y - H:i:s')}}</td>
                          <td class="td-actions text-right">
                            @if($reservation->status == false)
                              <form id="status-form-{{$reservation->id}}" action="{{route('reservation.status',$reservation->id)}}" style="display: none;" method="POST">
                                @csrf
                              </form>
                              <button type="button" rel="tooltip" class="btn btn-info btn-link btn-sm" data-original-title="Confirmar" onclick="if (confirm('Deseja Aprovar a Reserva ?')){
                                      event.preventDefault();
                                      document.getElementById('status-form-{{$reservation->id}}').submit();
                                      }else {
                                      event.preventDefault();
                                      } ">
                                <i class="material-icons">done</i>
                              </button>
                            @endif
                            <form id="delete-form-{{$reservation->id}}" action="{{route('reservation.destroy',$reservation->id)}}" style="display: none;" method="POST">
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
