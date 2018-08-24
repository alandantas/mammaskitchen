@extends('layouts.app')

@section('title','Editar Categoria')

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
                            <h4 class="card-title mt-0">EDITAR CATEGORIA</h4>
                            <p class="card-category">Faça as devidas alteraçõs nas categorias.</p>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('category.update',$category->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Nome da Categoria</label>
                                            <input type="text" name="name" class="form-control" value="{{$category->name}}">
                                        </div>
                                    </div>
                                </div>
                                <br> <a href="{{route('category.index')}}" class="btn btn-danger">voltar</a>
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
