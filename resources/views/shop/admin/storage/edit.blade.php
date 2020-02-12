@extends('shop.admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('shop.admin.components.breadcrumb')
            @slot('title') Список контрагентов @endslot
            @slot('parent') Главная @endslot
            @slot('previous') Предыдущая страница @endslot
            @slot('active') Контрагенты @endslot
        @endcomponent

        <hr />

        <form class="form-horizontal" action="{{route('shop.admin.storage.index.update', $storage)}}" method="post">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}
            @include('shop.admin.storage.partials.form')
        </form>

    </div>

@endsection