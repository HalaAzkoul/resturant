<!-- resources/views/admin/create_food.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Add New Food Item</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    @include("admin.admincss")
</head>
<body >
    <div class="container-scroller">


        <div class="container mt-5">
            <h2>Add New Food Item</h2>
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
            <form action="{{ route('food.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" value="{{ old('title') }}" required>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control" id="price" placeholder="Enter price" value="{{ old('price') }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" id="description" rows="4" placeholder="Enter description" required>{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control-file" id="image" required>

                    
                    
                </div>
                <button type="submit" class="btn btn-primary">Add Food</button>
                <a href="{{ route('food.index') }}" class="btn btn-primary">Food Menu</a>
            </form>
        </div>
    </div>
    @include("admin.adminjs")
</body>
</html>
