<div class="card hover-shadow-effect h-100">
    <div class="row mx-0 h-100">
        <div class="col-12 col-lg-4 d-flex flex-column justify-content-center align-items-center border-right hover-flag-effect pt-3 pb-3">
            <a href="{{ route('country.show', $country->slug) }}" class="text-center text-dark text-decoration-none">
                <img class="country-card-flag mb-2" src="{{ asset('images/flags/Flag of ' . $country->name . '.gif') }}"
                     alt="{{ $country->name }}">
                <strong>{{ $country->name }}</strong>
            </a>
            <div class="d-flex justify-content-center align-items-center">
                <button class="btn btn-primary btn-sm my_btn mt-2 mr-2" data-toggle="modal" data-target="#sponsorModal{{$country->id}}">
                    Sponsors
                </button>

                <button class="btn btn-primary btn-sm my_btn mt-2" data-toggle="modal" data-target="#producerModal{{$country->id}}">
                    Producers
                </button>
            </div>
        </div>

        <div class="col-12 col-lg-8">
            @foreach($country->topHeroes as $hero)
                <x-cards.hero-card :hero="$hero" :index="$loop->iteration"/>
                @if(!$loop->last)
                    <div class="dropdown-divider"></div>
                @endif
            @endforeach
        </div>
    </div>
</div>

<div class="modal fade" id="sponsorModal{{$country->id}}" tabindex="-1" aria-labelledby="sponsorModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="heroModalLabel">Sponsor's</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if(count($country->sponsors) > 0)
                    <h3>Sponsors</h3>
                    <ul>
                    @foreach($country->sponsors as $sponsor)
                        <li>{{ $sponsor->name }}</li>
                    @endforeach
                </ul>
                @else
                    <h5>No any sponsors at the moment</h5>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="producerModal{{$country->id}}" tabindex="-1" aria-labelledby="producerModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="heroModalLabel">Producer's</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if(count($country->producers) > 0)
                    <h3>Producers</h3>
                    <ul>
                    @foreach($country->producers as $producer)
                        <li>{{ $producer->name }}</li>
                    @endforeach
                </ul>
                @else
                    <h5>No any sponsors at the moment</h5>
                @endif
            </div>
        </div>
    </div>
</div>
