<label for="">Наименование</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок категории"
       value="{{$storage->title ?? ""}}" required>
<hr />

<input class="btn btn-primary pull-right" type="submit" value="Сохранить">
