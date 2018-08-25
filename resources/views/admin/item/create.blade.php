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
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title mt-0">ADD NOVA CATEGORIA</h4>
                            <p class="card-category"> Adicione uma nova categoria.</p>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Nome da Categoria</label>
                                            <input type="text" name="name" class="form-control">
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
