<label for="">Наименование</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок категории"
       value="{{$category->title ?? ""}}" required>
<label for="">Slug</label>
<input class="form-control" type="text" name="slug" placeholder="Генерация сслыки "
       value="{{$category->slug ?? ""}}" readonly="">
<label for="">Родительская категория</label>
    <select class="form-control" name="parent_id">
        <option value="0">-- без родительской категории --</option>
        @include('shop.admin.categories.partials.categories', ['categories' => $categories])
    </select>

<hr />

<input class="btn btn-primary pull-right" type="submit" value="Сохранить">
