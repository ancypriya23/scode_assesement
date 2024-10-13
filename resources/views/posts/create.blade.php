<form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="content">Post Content</label>
        <input type="text" name="content" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file" name="image" class="form-control" accept="image/*" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
