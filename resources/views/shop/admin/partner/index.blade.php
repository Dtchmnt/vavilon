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
        <a href="{{route('shop.admin.partner.index.create')}}" class="btn btn-primary pull-right">
            <i class="fa fa-plus" aria-hidden="true"></i> Добавить контрагента
        </a>
        <table class="table table-hover">
            <thead>
            <th>ID</th>
            <th>ФИО</th>
            <th>Номер</th>
            <th>email</th>
            <th>адресс</th>
            <th>Статус</th>
            <th>ИНН</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
            @foreach($rootPartners as $rootPartner)
                <tr>
                    <td>{{ $rootPartner->id }}</td>
                    <td>{{ $rootPartner->name }}</td>
                    <td>{{ $rootPartner->number }}</td>
                    <td>{{ $rootPartner->email }}</td>
                    <td>{{ $rootPartner->address  }}</td>
                    <td>{{ $rootPartner->status }}</td>
                    <td>{{ $rootPartner->inn }}</td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Потвердите действие')){return true} else {return false}"
                              action="{{route('shop.admin.partner.index.destroy', $rootPartner->id)}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{csrf_field()}}
                            <a class="btn btn-primary"
                               href="{{route('shop.admin.partner.index.edit', $rootPartner->id)}}">
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

            </tfoot>
        </table>


    </div>
@endsection