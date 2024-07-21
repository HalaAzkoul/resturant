<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Dashboard</title>
    @include("admin.admincss")
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 1em 0;
        }
        main {
            flex: 1;
            padding: 2em;
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1em 0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container-scroller">




     @include("admin.nav");
    <!-- container-scroller -->

    <main>
        <div class="container">
            <h1>Pages</h1>
            <a href="{{ route('pages.create') }}" class="btn btn-primary">Create New Page</a>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pages as $page)
                        <tr>
                            <td>{{ $page->id }}</td>
                            <td>{{ $page->title }}</td>
                            <td>
                                <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('pages.destroy', $page->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                </form>
                                <a href="{{ route('pages.show', $page->id) }}" class="btn btn-info btn-sm">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>



     </div>



    @include("admin.adminjs")

  </body>
</html>




