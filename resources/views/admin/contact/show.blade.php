@extends('layouts.app')

@section('title','Mensagens')

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
                            <p class="card-category">Recebida em: {{$contact->created_at->format('d/m/Y - H:i:s')}}</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <strong>Nome: {{$contact->name}}</strong><br>
                                    <b>Email: {{$contact->email}}</b><br>
                                    <strong>Mensagem: </strong>
                                    <hr>
                                    <p>{{$contact->message}}</p>
                                    <hr>
                                </div>
                            </div>
                            <a href="{{route('contact.index')}}" class="btn btn-primary">Voltar</a>
                            <form id="delete-form-{{$contact->id}}" action="{{route('contact.destroy',$contact->id)}}" style="display: none;" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button type="submit" rel="tooltip" class="btn btn-danger" onclick="if (confirm('Deseja deletar essa Mensagem ?')){
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{$contact->id}}').submit();
                                    }else {
                                    event.preventDefault();
                                    } ">DELETAR
                            </button>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush