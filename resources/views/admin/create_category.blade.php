<!-- resources/views/admin/create_food.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Add New Category</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    @include("admin.admincss")
</head>
<body >
    <div class="container-scroller">
        <div class="container mt-5">
            <h2>Add New Category</h2>
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
            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter category name" value="{{ old('name') }}" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Add Category</button>
                <a href="{{ route('category.index') }}" class="btn btn-primary">Category Menu</a>
            </form>
        </div>


      
    </div>
    @include("admin.adminjs")
</body>
</html>
