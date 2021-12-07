<div class="form-group">
    <label for="inputTitle">Символьный код</label>
    <input type="text" class="form-control" id="inputTitle" name="slug"
           placeholder="Добавьте символьный код" value="{{ isset($slug) ? old('slug',$slug->slug) : old('slug') }}"
           {{ isset($slug) ? 'readonly' : '' }}
    >

</div>

<div class="form-group">
    <label for="inputName">Название</label>
    <input type="text" class="form-control" id="inputName" name="name"
           placeholder="Добавьте название статьи" value="{{ isset($slug) ? old('name',$slug->name) : old('name') }}">

</div>

<div class="form-group">
    <label for="inputDescription">Описание</label>
    <textarea class="form-control" id="inputDescription" name="description" rows="3"
              placeholder="Краткое описание">{{ isset($slug) ? old('description',$slug->description) : old('description') }}</textarea>
</div>

<div class="form-group">
    <label for="inputBody">Текст</label>
    <textarea class="form-control" id="inputBody" name="text"
              rows="3">{{ isset($slug) ? old('text',$slug->text) : old('text') }}</textarea>
</div>

<div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="inputCheckbox"
           name="release" value="1"

           @if (isset($slug))
           @if($errors->count() && old('release') == 1)
           checked
           @elseif($errors->count() && !old('release'))
        @else
        {{ $slug->release == 1 ? 'checked' : ''}}
        @endif
    @else
        {{ old('release') ? 'checked' : ''}}
        @endif >
    <label class="form-check-label" for="inputCheckbox">Опубликовать статью</label>


</div>

