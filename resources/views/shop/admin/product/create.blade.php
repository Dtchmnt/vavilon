@extends('shop.admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('shop.admin.components.breadcrumb')
            @slot('title') Список товаров @endslot
            @slot('parent') Главная @endslot
            @slot('previous') Предыдущая страница @endslot
            @slot('active') Товары @endslot
        @endcomponent

            <hr />

            <form class="form-horizontal" action="{{route('shop.admin.product.index.store')}}" method="post">
                {{csrf_field()}}
                @include('shop.admin.product.partials.form')
            </form>

    </div>

@endsection