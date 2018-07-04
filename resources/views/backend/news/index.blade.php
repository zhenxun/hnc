@extends('layouts.backend.app')

@section('content')

    <div class="container my-5 ">
        <div class="row">
            <div class="col-12 p-4 form-div">

                @include('layouts.backend.components.alert.alert')

                @component('layouts.backend.components.index_header')
                  @slot('create') true @endslot
                  @slot('edit') false @endslot
                  @slot('url_create') {{ route('admin.news.create') }} @endslot
                  @slot('url_back') {{ route('admin.dashboard') }} @endslot
                @endcomponent

                <table id="datatable" class="table table-striped table-bordered responsive display" style="width:100%">
                        <thead>
                            <tr>
                                <th>序</th>
                                <th>標題</th>
                                <th>編輯</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($news as $data)
                                <tr>
                                    <td class="datatable-iteration">{{ $loop->iteration }}</td>
                                    <td>{{ str_limit($data->title, 50) }}</td>
                                    <td class="datatable-editbar">
                                        <div class="d-flex justify-content-center flex-nowrap">
                                            <div class="mr-3">
                                                <a href="{{ route('admin.news.edit', $data->id) }}" title="編輯">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </div>
                                            <div class="mr-3">
                                                <a href="{{ route('admin.news.show', $data->id) }}" title="檢視">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </div>
                                            <div class="">
                                                <a href="" class="toggle-delete" role="{{ $data->id }}" title="刪除">
                                                    <i class="fa fa-trash"></i>
                                                </a>

                                                {{ Form::open(['method' => 'DELETE', 'route' => ['admin.news.destroy', $data->id]]) }}
                                                    {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-delete', 'id' => $data->id,  'style' => 'display:none']) }}
                                                {{ Form::close() }}

                                            </div>
                                        </div> 
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection