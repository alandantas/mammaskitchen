@extends('layouts.app')

@section('title','Slider')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="material-icons">close</i>
                                </button>
                                <span>
                                <b> ERRO!! </b>{{ $error }}</span>
                            </div>
                        @endforeach
                    @endif

                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title mt-0">ADD NOVO SLIDER</h4>
                            <p class="card-category"> Adicione um novo slider para o site.</p>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('slider.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Título</label>
                                            <input type="text" name="title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Subtítulo</label>
                                            <input type="text" name="sub_title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Imagem</label>
                                        <input type="file" name="image">
                                    </div>
                                </div>
                                <br> <a href="{{route('slider.index')}}" class="btn btn-danger">voltar</a>
                                    <button type="submit" class="btn btn-primary">salvar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush
