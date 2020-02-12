@extends('shop.admin.layouts.app_admin')

@section('content')

    <div class="container">
        @component('shop.admin.components.breadcrumb')
            @slot('title') Список контрагентов @endslot
            @slot('parent') Главная @endslot
            @slot('previous') Предыдущая страница @endslot
            @slot('active') Контрагенты @endslot
        @endcomponent
        <hr>
        <a href="{{route('shop.admin.storage.index.create')}}" class="btn btn-primary pull-right">
            <i class="fa fa-plus" aria-hidden="true"></i> Добавить склад
        </a>
        <table class="table table-hover">
            <thead>
            <th>ID</th>
            <th>Наименование склада</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
            @foreach($rootStorages as $rootStorage)
                <tr>
                    <td>{{ $rootStorage->id }}</td>
                    <td>{{ $rootStorage->title }}
                    </td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Потвердите действие')){return true} else {return false}"
                              action="{{route('shop.admin.storage.index.destroy', $rootStorage->id)}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{csrf_field()}}
                            <a class="btn btn-primary"
                               href="{{route('shop.admin.storage.index.edit', $rootStorage->id)}}">
                                <i class="fa fa-edit">
                                </i>
                            </a>
                            <button type="button btn" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <td colspan="4">
                <ul class="pagination pull-right">
                    {{$rootStorages->links()}}
                </ul>
            </td>
            </tfoot>
        </table>


    </div>
@endsection