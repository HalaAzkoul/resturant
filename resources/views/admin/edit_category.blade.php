<!DOCTYPE html>
<html>
<head>
    <title>Edit Food Item</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    @include("admin.admincss")
</head>
<body>
    <div class="container-scroller">


        <div class="container mt-5">
            <h2>Edit Food Item</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter category name" value="{{ old('name') }}" required>
                </div>
               
                <button type="submit" class="btn btn-primary">Update Category</button>
                <a href="{{ route('category.index') }}" class="btn btn-primary">Category List</a>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @include("admin.adminjs")
</body>
</html>
