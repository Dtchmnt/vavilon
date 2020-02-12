<ul>
    @foreach($categories as $category)
        <li>{{ $category->title }}
            @if($category->ProductCategory->count() > 0)
                @include('shop.admin.categories.partials.treeChildMenu', ['categories' => $category->ProductCategory])
            @endif
        </li>
        <form onsubmit="if(confirm('Потвердите действие')){return true} else {return false}"
              action="{{route('shop.admin.categories.index.destroy', $category)}}" method="post">
            <input type="hidden" name="_method" value="DELETE">
            {{csrf_field()}}
            <a class="btn btn-default" href="{{route('shop.admin.categories.index.edit', $category)}}">
                <i class="fa fa-edit">
                </i>
            </a>
            <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
        </form>
    @endforeach
</ul>
