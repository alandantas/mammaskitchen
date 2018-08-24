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
                <a href="{{route('slider.create')}}" class="btn btn-primary"><i class="material-icons">queue_play_next</i>  ADD novo Slider</a>
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title mt-0">SLIDER's</h4>
                        <p class="card-category">Listagem dos sliders</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table" class="table table-hover" width="100%">
                                <thead class="text-primary">
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
                                        <td rel="tooltip" data-original-title="{{$slider->title}}">{{str_limit($slider->title, 15)}}</td>
                                        <td  rel="tooltip" data-original-title="{{$slider->sub_title}}">{{str_limit($slider->sub_title, 15)}}</td>
                                        <td>
                                            <img class="img-responsive thumbnail" width="80" height="60" src="{{asset('uploads/slider/'.$slider->image)}}">
                                        </td>
                                        <td>{{$slider->created_at->format('d/m/Y - H:m:s')}}</td>
                                        <td>{{$slider->updated_at->format('d/m/Y - H:m:s')}}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{route('slider.edit',$slider->id)}}" rel="tooltip" class="btn btn-primary btn-link btn-sm" data-original-title="Editar">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <form id="delete-form-{{$slider->id}}" action="{{route('slider.destroy',$slider->id)}}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" rel="tooltip" class="btn btn-danger btn-link btn-sm" data-original-title="Deletar" onclick="if (confirm('Deseja deletar esse Slider ?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$slider->id}}').submit();
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
                    {{$sliders->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

@endpush