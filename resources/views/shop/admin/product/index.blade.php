@extends('shop.admin.layouts.app_admin')

@section('content')

    <div class="container">
        @component('shop.admin.components.breadcrumb')
            @slot('title') Список товаров @endslot
            @slot('parent') Главная @endslot
            @slot('previous') Предыдущая страница @endslot
            @slot('active') Товары @endslot
        @endcomponent
        <hr>
        <a href="{{route('shop.admin.product.index.create')}}" class="btn btn-primary pull-right">
            <i class="fa fa-plus" aria-hidden="true"></i> Добавить товар
        </a>
        <table class="table table-hover">
            <thead>
            <th>ID</th>
            <th>Наименование</th>
            <th>Фото</th>
            <th>Закупучная цена</th>
            <th>Фактическая цена</th>
            <th>Количество</th>
            <th>Категория</th>
            <th>Склад</th>
            <th>Контрагент</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
            @foreach($rootProducts as $rootProduct)
                <tr>
                    <td>{{ $rootProduct->id }}</td>
                    <td>{{ $rootProduct->title }}</td>
                    <td>{{ $rootProduct->photo }}</td>
                    <td>{{ $rootProduct->retail_price }} Руб.</td>
                    <td>{{ $rootProduct->wholesale_price  }} Руб.</td>
                    <td>{{ $rootProduct->count }}</td>
                    <td>{{ $rootProduct->categories->title}}</td>
                    <td>{{ $rootProduct->storage->title }}</td>
                    <td>{{ $rootProduct->partner->name }}</td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Потвердите действие')){return true} else {return false}"
                              action="{{route('shop.admin.product.index.destroy', $rootProduct->id)}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{csrf_field()}}
                            <a class="btn btn-primary"
                               href="{{route('shop.admin.product.index.edit', $rootProduct->id)}}">
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
                    {{$rootProducts->links()}}
                </ul>
            </td>
            </tfoot>
        </table>


    </div>
@endsection