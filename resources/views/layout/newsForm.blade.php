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

