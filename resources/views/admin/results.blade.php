<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Election Results</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h3>Results for "{{ $election->title }}"</h3>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Candidate Name</th>
            <th>Party</th>
            <th>Votes</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($election->candidates as $candidate)
            <tr>
                <td>{{ $candidate->name }}</td>
                <td>{{ $candidate->party }}</td>
                <td>{{ $candidate->votes }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
