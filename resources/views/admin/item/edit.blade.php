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
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title mt-0">ADD NOVO ITEM</h4>
                            <p class="card-category"> Adicione um novo item.</p>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('item.update',$item->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Nome do Item</label>
                                            <input type="name" name="name" class="form-control" value="{{$item->name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Categoria do Item</label>
                                            <select class="form-control" name="category">
                                                @foreach($categories as $category)
                                                    <option {{$category->id == $item->category->id ? 'selected' : '' }} value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Preço do Item</label>
                                            <input type="number" class="form-control" name="price" value="{{$item->price}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Descrição do Item</label>
                                            <textarea class="form-control" name="description" rows="3">{{$item->description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label"></label>
                                        <img class="img-responsive thumbnail rounded" width="80" height="60" src="{{asset('uploads/item/'.$item->image)}}">
                                        <input type="file" name="image"><br>
                                        <small class="text-muted">JPG|PNG|JPEG.</small>
                                    </div>
                                </div>
                                <a href="{{ route('item.index') }}" class="btn btn-danger">Voltar</a>
                                <button type="submit" class="btn btn-primary">Salvar</button>
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
