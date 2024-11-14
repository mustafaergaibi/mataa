<form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control" required>{{ $post->description }}</textarea>
    </div>
    <div class="mb-3">
        <label for="published" class="form-label">Published</label>
        <input type="checkbox" name="published" id="published" {{ $post->published ? 'checked' : '' }}>
    </div>
    <button type="submit" class="btn btn-primary">Update Post</button>
</form>
