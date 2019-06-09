@extends('layouts.base')

@section('css')
    <link href="{{ asset('css/detail.css') }}" rel="stylesheet">
@endsection


@section('header')
    {{ trans('index.details.form') }}
@endsection
@section('content')
    @if ($data)
        
    <div class="table-responsive">
        
        <table class="table table-striped table-dark  ">
            <thead>
                <tr>
                    <th scope="col" class="text-center">{{ trans('index.name') }}</th>
                    <th scope="col" class="text-center">{{ trans('index.lastname') }}</th>
                    <th scope="col" class="text-center">{{ trans('index.ci') }}</th>
                    <th scope="col" class="text-center">{{ trans('index.sex') }}</th>
                    <th scope="col" class="text-center">{{ trans('index.age') }}</th>
                    <th scope="col" class="text-center">{{ trans('index.married') }}</th>
                    <th scope="col" class="text-center">{{ trans('index.accions') }}</th>
                </tr>
            </thead>
            <tbody class="data">
                @foreach ($data as $d1)                
                <tr class={{$d1->Cedula}}>
                    <td class="text-center">{{$d1->Nombre}}</td>
                        <td class="text-center">{{$d1->Apellido}}</td>
                        <td class="text-center">{{$d1->Cedula}}</td>
                        <td class="text-center">
                            @if($d1->Sexo=='M')
                                {{ trans('index.male') }}
                            @else
                                {{ trans('index.female') }}
                            @endif
                            </td>
                        <td class="text-center">{{$d1->Edad}}</td>
                        <td class="text-center">
                            @if ($d1->Casado)
                                {{ trans('index.married') }}
                            @else    
                                {{ trans('index.unmarried') }}
                            @endif
                            </td>
                        <td class="actions">
                            <a class="btn-actions" href="{{ route('update', $d1->Cedula) }}">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <button class="btn-actions"  data-toggle="modal" data-target="#modal_delete" onclick="del({{$d1->Cedula}})">
                                <i class="fa fa-close"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    
                    
                </tbody>
            </table>
        </div>
        <script type="application/javascript">
            function del(value) {
                let hola=$(".btn-delete")
                hola[0].id= value;
            }
            function delRegister(event) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('remove') }}",
                    data: { 'cedula': event.id, "_token": "{{ csrf_token() }}", },
                    success: function (response) {
                        value = $("." + response)[0]
                        value.remove();
                        let h=$(".data").children();
                        if(h.length==0){
                            let data=$(".table-responsive")[0].parentElement;
                            $(".table-responsive")[0].remove();
                            data.append("{{ trans('index.deletelastrecord') }}");
                        }
                        $('#modal_delete').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                    }
                });
            }
    
            </script>
        @include('layouts.modal_delete')
        @else
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{{ trans('index.norecords') }}</strong>
            </div>
            <a class="btn btn-success btn-lg btn-block" href="{{ route('indexClean') }}">{{ trans('index.goform') }}</a>
        @endif

@endsection

