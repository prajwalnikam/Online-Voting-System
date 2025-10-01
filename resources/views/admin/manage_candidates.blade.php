<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Candidates</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h3>Manage Candidates for "{{ $election->title }}"</h3>
    <form method="POST" action="/admin/elections/{{ $election->id }}/candidates/store">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Candidate Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="party" class="form-label">Party</label>
            <input type="text" class="form-control" id="party" name="party" required>
        </div>
        <button type="submit" class="btn btn-success">Add Candidate</button>
    </form>
    <hr>
    <h4>Existing Candidates</h4>
    <ul class="list-group">
        @foreach ($election->candidates as $candidate)
            <li class="list-group-item">{{ $candidate->name }} ({{ $candidate->party }})</li>
        @endforeach
    </ul>
</div>
</body>
</html>
