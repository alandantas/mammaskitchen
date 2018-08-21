@extends('layouts.app')

@section('title','Slider')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title mt-0"> Table on Plain Background</h4>
                                <p class="card-category"> Here is a subtitle for this table</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="">
                                            <th>ID</th>
                                            <th>Título</th>
                                            <th>Subtítulo </th>
                                            <th>Imagem</th>
                                            <th>Data|Criação</th>
                                            <th>Data|Modificação</th>
                                            <th>Ações</th>
                                        </thead>
                                        <tbody>
                                            @foreach($sliders as $key=>$slider)
                                            <tr>
                                                <td>{{$key +1}}</td>
                                                <td>{{$slider->title}}</td>
                                                <td>{{$slider->sub_title}}</td>
                                                <td>{{$slider->image}}</td>
                                                <td>{{$slider->created_at}}</td>
                                                <td>{{$slider->updated_at}}</td>
                                                <td></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush