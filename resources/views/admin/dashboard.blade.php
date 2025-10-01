<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h3>Admin Dashboard</h3>
    <a href="/admin/elections/create" class="btn btn-success mb-3">Create Election</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($elections as $election)
            <tr>
                <td>{{ $election->id }}</td>
                <td>{{ $election->title }}</td>
                <td>{{ $election->description }}</td>
                <td>
                    <a href="/admin/elections/{{ $election->id }}/candidates" class="btn btn-info">Manage Candidates</a>
                    <a href="/admin/elections/{{ $election->id }}/results" class="btn btn-primary">View Results</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
