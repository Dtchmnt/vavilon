@extends('shop.admin.layouts.app_admin')

@section('content')

    <div class="container">
        @component('shop.admin.components.breadcrumb')
            @slot('title') Список категорий @endslot
            @slot('parent') Главная @endslot
            @slot('previous') Предыдущая страница @endslot
            @slot('active') Категории @endslot
        @endcomponent
        <hr>
        <a href="{{route('shop.admin.categories.index.create')}}" class="btn btn-primary pull-right">
            <i class="fa fa-plus" aria-hidden="true"></i> Создать категорию
        </a>
        <table class="table table-hover">
            <thead>
            <th>ID</th>
            <th>Наименование категории</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
            @foreach($rootCategories as $rootCategory)
                <tr>
                    <td>{{ $rootCategory->id }}</td>
                    <td>{{ $rootCategory->title }}
                        @if($rootCategory->ProductCategory->count() > 0)
                            @include('shop.admin.categories.partials.treeChildMenu', ['categories' => $rootCategory->ProductCategory])
                        @endif
                    </td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Потвердите действие')){return true} else {return false}"
                              action="{{route('shop.admin.categories.index.destroy', $rootCategory)}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{csrf_field()}}
                            <a class="btn btn-primary"
                               href="{{route('shop.admin.categories.index.edit', $rootCategory)}}">
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
                    {{$rootCategories->links()}}
                </ul>
            </td>
            </tfoot>
        </table>


    </div>
@endsection