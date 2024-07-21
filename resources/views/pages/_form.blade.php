<form action="{{ $action }}" method="POST">
    @csrf
    @if ($method !== 'POST')
        @method($method)
    @endif

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $page->title ?? '') }}" required>
    </div>

    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" id="content" class="form-control" rows="10" required>{{ old('content', $page->content ?? '') }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>
