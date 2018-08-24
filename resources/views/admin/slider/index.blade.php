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
                        @include('layouts.partial.msg')
                        <a href="{{route('slider.create')}}" class="btn btn-info"><i class="material-icons">queue_play_next</i>  ADD novo Slider</a>
                        <div class="card">
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
                                                <td>{{$slider->id}}</td>
                                                <td>{{$slider->title}}</td>
                                                <td>{{$slider->sub_title}}</td>
                                                <td>{{$slider->image}}</td>
                                                <td>{{$slider->created_at->format('d/m/Y - H:m:s')}}</td>
                                                <td>{{$slider->updated_at->format('d/m/Y - H:m:s')}}</td>
                                                <td class="td-actions text-right">
                                                    <a href="{{route('slider.edit',$slider->id)}}" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Editar Slide">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{$sliders->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush