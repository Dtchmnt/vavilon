@extends('shop.admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('shop.admin.components.breadcrumb')
            @slot('title') Список категорий @endslot
            @slot('parent') Главная @endslot
            @slot('previous') Предыдущая страница @endslot
            @slot('active') Категории @endslot
        @endcomponent

            <hr />

            <form class="form-horizontal" action="{{route('shop.admin.categories.index.store')}}" method="post">
                {{csrf_field()}}
                @include('shop.admin.categories.partials.form')
            </form>

    </div>

@endsection