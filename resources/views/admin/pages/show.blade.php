<!-- resources/views/admin/create_food.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    @include("admin.admincss")
</head>
<body >
    <div class="container-scroller">
        <div class="container">
            <h1>{{ $page->title }}</h1>
            <div class="content">
                {!! nl2br(e($page->content)) !!}
            </div>
            <div class="mt-4">
                <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-primary">Edit Page</a>
                <form action="{{ route('pages.destroy', $page->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Page</button>
                </form>
            </div>
        </div>



    </div>
    @include("admin.adminjs")
</body>
</html>
