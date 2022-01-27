<div class="form-group">
    <label for="inputName">Заголовок новости</label>
    <input type="text" class="form-control" id="inputName" name="name"
           placeholder="Добавьте название статьи" value="{{ old('name', $news->name ?? '') }}">
</div>

<div class="form-group">
    <label for="inputBody">Текст</label>
    <textarea class="form-control" id="inputBody" name="text"
              rows="3">{{ old('text', $news->text ?? '') }}</textarea>
</div>

<div class="form-group">
    <label for="inputTags">Тэги к новости</label>
    <input type="text" class="form-control" id="inputTags" name="tags"
           placeholder="Добавьте тэги к статье" value="{{ old('tags', isset($news) ? $news->tags->pluck('name')->implode(',') : '') }}">
</div>

<div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="inputCheckbox"
           name="published" value="1"

           @if (isset($news))
           @if($errors->count() && old('published') == 1)
           checked
    @elseif($errors->count() && !old('published'))
        @else
        {{ $news->published == 1 ? 'checked' : ''}}
        @endif
    @else
        {{ old('published') ? 'checked' : ''}}
        @endif >
    <label class="form-check-label" for="inputCheckbox">Опубликовать новость</label>


</div>
