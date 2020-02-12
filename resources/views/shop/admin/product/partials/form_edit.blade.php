<label for="">Наименование товара</label>
<input type="text" class="form-control" name="title" placeholder="Наименование товара"
       value="{{$product->title ?? ""}}" required>

<label for="">ФОТО</label>
<input type="text" class="form-control" name="photo" placeholder="ФОТО"
       value="{{$product->photo ?? ""}}" required>

<label for="">Закупучная цена</label>
<input type="text" class="form-control" name="retail_price" placeholder="Закупучная цена"
       value="{{$product->retail_price ?? ""}}" required>

<label for="">Фактическая цена</label>
<input type="text" class="form-control" name="wholesale_price" placeholder="Фактическая цена"
       value="{{$product->wholesale_price ?? ""}}" required>

<label for="">Количество</label>
<input type="text" class="form-control" name="count" placeholder="Количество"
       value="{{$product->count ?? ""}}" required>

<label for="">Категория</label>
<div class="form-group">
    <select class="form-control" name="category_id">
        <option disabled selected>{{$product->categories->title ?? ""}}</option>
        @foreach($rootCategories as $category)
        <option value="{{$category->id ?? ""}}">{{$category->title}}</option>
            @endforeach
    </select>
</div>

<label for="">Склад</label>
<div class="form-group">
    <select class="form-control" name="storage_id">
        <option disabled selected>{{$product->storage->title ?? ""}}</option>
        @foreach($rootStorage as $storage)
            <option value="{{$storage->id ?? ""}}">{{$storage->title}}</option>
        @endforeach
    </select>
</div>

<label for="">Контрагент</label>
<div class="form-group">
    <select class="form-control" name="partner_id">
        <option disabled selected>{{$product->partner->name ?? ""}}</option>
        @foreach($rootPartner as $partner)
            <option value="{{$partner->id ?? ""}}">{{$partner->name}}</option>
        @endforeach
    </select>
</div>
<hr/>

<input class="btn btn-primary pull-right" type="submit" value="Сохранить">
