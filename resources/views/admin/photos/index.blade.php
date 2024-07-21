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
            <h1>Manage Photos</h1>
            <a href="{{ route('photos.create') }}" class="btn btn-primary">Upload New Photo</a>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Photo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($photos as $photo)
                        <tr>
                            <td>{{ $photo->id }}</td>
                            <td><img src="{{ asset($photo->path) }}" width="100" /></td>
                            <td>
                                <a href="{{ route('photos.edit', $photo->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('photos.destroy', $photo->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
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




