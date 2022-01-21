@auth
    <button
        class="btn btn-outline-primary btn-sm grow-vote my_btn"
        id="vote-btn-{{$id}}"
        onclick="voteOnHero(event);"
        data-hero-id="{{ $id }}"
    >
        Vote
    </button>
@else
    <button
        class="btn btn-outline-primary btn-sm grow-vote my_btn"
        data-toggle="modal"
        data-target="#loginModal"
    >
        Vote
    </button>
@endauth
