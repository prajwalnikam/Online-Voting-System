<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Elections</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h3>Available Elections</h3>
    @foreach ($elections as $election)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $election->title }}</h5>
                <p class="card-text">{{ $election->description }}</p>
                <div class="d-flex flex-wrap">
                    @foreach ($election->candidates as $candidate)
                        <div class="card m-2" style="width: 18rem; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#voteModal-{{ $candidate->id }}">
                            <div class="card-body text-center">
                                <h6 class="card-title">{{ $candidate->name }}</h6>
                                <p class="card-text"><small>{{ $candidate->party }}</small></p>
                            </div>
                        </div>
                        <div class="modal fade" id="voteModal-{{ $candidate->id }}" tabindex="-1" aria-labelledby="voteModalLabel-{{ $candidate->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="voteModalLabel-{{ $candidate->id }}">Confirm Your Vote</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Candidate Name:</strong> {{ $candidate->name }}</p>
                                        <p><strong>Party:</strong> {{ $candidate->party }}</p>
                                        <p><strong>About:</strong> {{ $candidate->description }}</p>
                                        <form method="POST" action="/voter/elections/{{ $election->id }}/vote">
                                            @csrf
                                            <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" id="confirmVote-{{ $candidate->id }}" required>
                                                <label class="form-check-label" for="confirmVote-{{ $candidate->id }}">
                                                    I confirm my vote for {{ $candidate->name }}
                                                </label>
                                            </div>
                                            <button type="submit" class="btn btn-success">Vote</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
    <script>
        $(document).ready(function() {
            $('.card.m-2').on('click', function() {
                var modalId = $(this).data('bs-target');
                $(modalId).modal('show');
            });
        });
    </script>
</div>
</body>
</html>