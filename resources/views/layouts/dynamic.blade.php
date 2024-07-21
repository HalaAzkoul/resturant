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

    <main>
        @include("admin.nav")
        <div class="container-scroller">

        </div>
    </main>

    @include("admin.adminjs")
</body>
</html>
