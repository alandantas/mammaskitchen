@extends('layouts.app')

@section('title','Slider')

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
                            <h4 class="card-title mt-0">EDITAR SLIDER</h4>
                            <p class="card-category">Faças as devidas alterações no seu slider.</p>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('slider.update',$slider->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Título</label>
                                            <input type="text" name="title" class="form-control" value="{{$slider->title}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Subtítulo</label>
                                            <input type="text" name="sub_title" class="form-control" value="{{$slider->sub_title}}">
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
