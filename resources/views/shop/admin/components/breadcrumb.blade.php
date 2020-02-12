<h2>{{$title}}</h2>
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('shop.admin.index.index')}}">{{$parent}}</a></li>
    <li class="breadcrumb-item"><a href="{{URL::previous()}}">{{$previous}}</a></li>
    <li class="breadcrumb-item active">{{$active}}</li>
</ol>
</nav>


{{--<div class="container container-md-fluid">--}}
    {{--<div class="row ">--}}
        {{--<div class="col-auto col-md-10">--}}
            {{--<div class="bc-icons-2 ">--}}
                {{--<nav aria-label="breadcrumb " class="first">--}}
                    {{--<ol class="breadcrumb indigo lighten-6 first shadow-lg mb-5 bg-dark navbar-light mb-5 px-md-4">--}}
                        {{--<li class="breadcrumb-item font-weight-bold font-italic"><a class="black-text text-uppercase " href="{{URL::previous()}}"><span class="mr-md-3 mr-2">{{$previous}}</span></a><i class="fa fa-caret-right " aria-hidden="true"></i></li>--}}
                        {{--<li class="breadcrumb-item font-weight-bold font-italic"><a class="black-text text-uppercase" href="{{route('shop.admin.index.index')}}"><span class="mr-md-3 mr-2">{{$parent}}</span></a><i class="fa fa-caret-right text-uppercase " aria-hidden="true"></i></li>--}}
                        {{--<li class="breadcrumb-item font-weight-bold font-italic "><a class="black-text text-uppercase active-1" ><span>{{$active}}</span></a></li>--}}
                    {{--</ol>--}}
                {{--</nav>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}