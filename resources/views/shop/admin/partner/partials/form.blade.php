<label for="">ФИО</label>
<input type="text" class="form-control" name="name" placeholder="ФИО"
       value="{{$partner->name ?? ""}}" required>

<label for="">Номер телефона</label>
<input type="text" class="form-control" name="number" placeholder="Номер"
       value="{{$partner->number ?? ""}}" required>

<label for="">email</label>
<input type="text" class="form-control" name="email" placeholder="email"
       value="{{$partner->email ?? ""}}" required>

<label for="">Адресс</label>
<input type="text" class="form-control" name="address" placeholder="Адресс"
       value="{{$partner->address ?? ""}}" required>

<label for="">Статус</label>
<div class="form-group">
    <select class="form-control" name="status">
        @if($partner->status ?? "")
            <option disabled value="{{$partner->status ?? ""}}" selected>{{$partner->status ?? ""}}</option>
            <option value="Физическое лицо">Физическое лицо</option>
            <option value="Юридическое лицо">Юридическое лицо</option>
        @else
            <option disabled value="">Выбирите статус лица</option>
            <option value="Физическое лицо">Физическое лицо</option>
            <option value="Юридическое лицо">Юридическое лицо</option>
        @endif
    </select>
</div>


<label for="">ИНН</label>
<input type="text" class="form-control" name="inn" placeholder="ИНН"
       value="{{$partner->inn ?? ""}}" required>

<hr/>

<input class="btn btn-primary pull-right" type="submit" value="Сохранить">
