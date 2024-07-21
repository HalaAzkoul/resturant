<!DOCTYPE html>
<html lang="en">
    <head>

            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Categories</title>
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
                .user-list ul {
                    list-style: none;
                    padding: 0;
                }
                .user-list li {
                    background-color: #0e0d0d;
                    border: 1px solid #0e0d0d;
                    margin-bottom: 0.5em;
                    padding: 1em;
                }




                    .food-list {
                        margin-top: 20px;
                    }
                    .food-item {
                        display: flex;
                        align-items: center;
                        border-bottom: 1px solid #ddd;
                        padding: 10px 0;
                    }
                    .food-item img {
                        max-width: 150px;
                        margin-right: 20px;
                    }
                    .food-item-details {
                        flex: 1;
                    }
                    .food-item-title {
                        font-size: 1.25rem;
                        font-weight: bold;
                    }
                    .food-item-price {
                        font-size: 1rem;
                        color: #28a745;
                    }
                    .food-item-description {
                        margin-top: 10px;
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
                <div class="food-list">
                    <h2>Category List</h2>
                    <a href="{{ route('category.create') }}" class="btn btn-primary">Add New Category</a>
                    <ul class="list-unstyled">
                        @foreach ($categories as $category)
                            <li class="food-item">
                                <div class="food-item-details">
                                    <div class="food-item-title">{{ $category->name }}</div>
                                </div>
                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary edit-button">Edit</a>
                                <form action="{{ route('category.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </main>


       



         </div>



        @include("admin.adminjs")

      </body>
</html>
