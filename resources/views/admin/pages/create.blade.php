<!-- resources/views/admin/create_food.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Add New Dynamic Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    @include("admin.admincss")
</head>
<body >
    <div class="container-scroller">
        <div class="container mt-5">
            <h2>Add New Dynamic Page</h2>
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
            <form action="{{ route('pages.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" class="form-control" rows="10" required>{{ old('content') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>



    </div>
    @include("admin.adminjs")
</body>
</html>
