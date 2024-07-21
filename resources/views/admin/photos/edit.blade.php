<!-- resources/views/admin/create_food.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Photo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    @include("admin.admincss")
</head>
<body >
    <div class="container-scroller">
        <div class="container mt-5">
            <h1>Edit Photo</h1>
    <form action="{{ route('photos.update', $photo->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="photo">Current Photo</label>
            <div>
                <img src="{{ asset($photo->path) }}" width="100" alt="Current Photo">
            </div>
        </div>
        <div class="form-group">
            <label for="photo">New Photo</label>
            <input type="file" name="photo" class="form-control" id="photo">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('photos.index') }}" class="btn btn-primary">Go Back</a>
            </form>
        </div>



    </div>
    @include("admin.adminjs")
</body>
</html>
