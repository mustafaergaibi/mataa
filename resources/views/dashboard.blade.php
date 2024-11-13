<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

</head>

<body>


    <div class="container mt-5">
        <!-- Flex Container for Header and Logout Button -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>All Posts</h1>

            <!-- Logout Button -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>

        <table class="table table-striped table-bordered table-hover table-sm my-4">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Published</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                        <td>{{ $post->published ? 'Yes' : 'No' }}</td>
                        <td>{{ $post->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>



        <div class="d-flex justify-content-center">
            {{ $posts->links('pagination::bootstrap-5') }}
        </div>
    </div>
</body>

</html>
