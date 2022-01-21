<div class="row mb-2  pt-3 pb-3 hover-hero-card-effect" style="{{ $index ==1 ? 'margin-top:0.5rem':'' }};">

    <div class="col-12 col-lg-2 d-flex align-items-center justify-content-center">
        <a class="text-decoration-none text-dark" data-toggle="modal" href="#heroModal{{$hero->id}}">
            <img class="hero-card-avatar @if($index == 1)first @elseif($index == 2)second @else third @endif"
                src="{{ asset($hero->photo) }}" alt="Hero">
        </a>
    </div>
    <div class="mb-2 col-12 col-lg-5 d-flex flex-column text-center text-lg-left justify-items-center">
        <a class="text-decoration-none text-dark" data-toggle="modal" href="#heroModal{{$hero->id}}">
            <strong>
                {{ $hero->first_name }}@if($hero->middle_name )&nbsp{{ $hero->middle_name }}@endif
                &nbsp{{ $hero->last_name }}
            </strong>
        </a>
        <a class="text-decoration-none text-dark" data-toggle="modal" href="#heroModal{{$hero->id}}">
            <small>{{ $hero->profession }}</small>
        </a>
        <a class="text-decoration-none text-dark" data-toggle="modal" href="#heroModal{{$hero->id}}">
            <small>{{ $hero->identity }}</small>
        </a>
    </div>
    <div class="mb-2 col-12 col-lg-2 d-flex align-items-center justify-content-center justify-content-md-start">
        <div>
            <x-buttons.vote-button :id="$hero->id"></x-buttons.vote-button>
        </div>
    </div>

    <div
        class="mb-2 col-12 col-lg-3 d-flex text-center align-items-center justify-content-center justify-content-md-start">
        <i class="fas fa-poll mr-1"></i>
        <strong>
            <span id="vote-count-{{$hero->id}}">
                {{ $hero->votes }}
            </span>
        </strong>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="heroModal{{$hero->id}}" tabindex="-1" aria-labelledby="heroModalLabel" aria-hidden="true"
    style="top:15%;">
    <div class="modal-dialog" style="max-width: 612px !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="heroModalLabel">Hero Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mx-0 align-items-center">
                    <div class="col-12 col-lg-5 mt-2">
                        <a href="{{ route('hero.show', $hero->id) }}">
                            <img class="shadow hero-image" src="{{ asset($hero->photo) }}" alt="Hero image"></a>
                    </div>
                    <div class="col-12 col-lg-7 mt-2">

                        <h4>
                            <strong>
                                {{ $hero->first_name }}@if($hero->middle_name )&nbsp{{ $hero->middle_name }}@endif
                                &nbsp{{ $hero->last_name }}
                            </strong>
                        </h4>

                        <strong>Country</strong>
                        :
                        {{ $hero->country->name }}
                        <br>
                        <strong>Profession</strong>
                        :
                        {{ $hero->profession }}
                        <br>
                        <strong>Company/Category</strong>
                        :
                        {{ $hero->identity }}
                        <br>
                        <strong>Contribution</strong>
                        :
                        {{ str_limit($hero->contribution,100) }}

                        <br>
                        <a class="btn btn-outline-primary" href="{{ route('hero.show', $hero->slug) }}">See More...</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
