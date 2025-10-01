@foreach ($elections as $election)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $election->title }}</h5>
            <p class="card-text">{{ $election->description }}</p>
            @if ($election->candidates->isNotEmpty())
                <div class="d-flex flex-wrap">
                    @foreach ($election->candidates as $candidate)
                        <!-- Candidate Card -->
                        <div class="card m-2" style="width: 18rem;" data-bs-toggle="modal" data-bs-target="#voteModal-{{ $candidate->id }}">
                            <div class="card-body text-center">
                                <h6 class="card-title">{{ $candidate->name }}</h6>
                                <p class="card-text"><small>{{ $candidate->party }}</small></p>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#voteModal-{{ $candidate->id }}">Vote</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-danger">No candidates available for this election.</p>
            @endif
        </div>
    </div>
@endforeach


<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#testModal">
    Open Test Modal
</button>

<div class="modal fade" id="testModal" tabindex="-1" aria-labelledby="testModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="testModalLabel">Test Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                This is a test modal!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>