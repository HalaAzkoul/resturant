<!DOCTYPE html>
<html lang="en">
    <head>

            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>User List</title>
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
                .user-list {
                    margin-top: 2em;
                }
                .user-list h2 {
                    margin-bottom: 1em;
                }
                    list-style: none;
                    padding: 0;
                }
                .user-list li {
                    background-color: #0e0d0d;
                    border: 1px solid #0e0d0d;
                    margin-bottom: 0.5em;
                    padding: 1em;
                }
            </style>

        @include("admin.admincss")
      </head>
      <body>
        <div class="container-scroller">




         @include("admin.nav");
        <!-- container-scroller -->

        <main>
            <div class="container">
                <div class="user-list">
                    <h2>Users</h2>
                    <ul>
                        @foreach ($users as $user)
                            <li>{{ $user->name }} - {{ $user->email }} <form action="{{ route("deleteusers", $user->id)  }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form> </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </main>
         </div>



        @include("admin.adminjs")

      </body>
</html>




