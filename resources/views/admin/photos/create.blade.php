<!-- resources/views/admin/create_food.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Add New Photo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    @include("admin.admincss")
</head>
<body >
    <div class="container-scroller">
        <div class="container mt-5">
            <h1>Upload Photo</h1>
            <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" class="form-control" id="photo">
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
                <a href="{{ route('photos.index') }}" class="btn btn-primary">Go Back</a>
            </form>
        </div>



    </div>
    @include("admin.adminjs")
</body>
</html>
