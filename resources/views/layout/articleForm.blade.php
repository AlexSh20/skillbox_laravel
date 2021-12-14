<div class="form-group">
    <label for="inputTitle">Символьный код</label>
    <input type="text" class="form-control" id="inputTitle" name="slug"
           placeholder="Добавьте символьный код" value="{{ old('slug',$article->slug ?? '') }}"
        {{ isset($article) ? 'readonly' : '' }}
    >

</div>

<div class="form-group">
    <label for="inputName">Название</label>
    <input type="text" class="form-control" id="inputName" name="name"
           placeholder="Добавьте название статьи" value="{{ old('name', $article->name ?? '') }}">

</div>

<div class="form-group">
    <label for="inputDescription">Описание</label>
    <textarea class="form-control" id="inputDescription" name="description" rows="3"
              placeholder="Краткое описание">{{ old('description', $article->description ?? '') }}</textarea>
</div>

<div class="form-group">
    <label for="inputBody">Текст</label>
    <textarea class="form-control" id="inputBody" name="text"
              rows="3">{{ old('text', $article->text ?? '') }}</textarea>
</div>


<div class="form-group">
    <label for="inputTags">Тэги к статье</label>
    <input type="text" class="form-control" id="inputTags" name="tags"
           placeholder="Добавьте тэги к статье" value="{{ old('tags', isset($article) ? $article->tags->pluck('name')->implode(',') : '') }}">
</div>

<div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="inputCheckbox"
           name="release" value="1"

           @if (isset($article))
           @if($errors->count() && old('release') == 1)
           checked
    @elseif($errors->count() && !old('release'))
        @else
        {{ $article->release == 1 ? 'checked' : ''}}
        @endif
    @else
        {{ old('release') ? 'checked' : ''}}
        @endif >
    <label class="form-check-label" for="inputCheckbox">Опубликовать статью</label>


</div>

