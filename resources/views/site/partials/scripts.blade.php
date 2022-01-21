
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ mix('js/app.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script src="{{ asset('js/validation/hero.js') }}"></script>


<script>
    mybutton = document.getElementById("gotoTopBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        let el = document.getElementById('nav_logo');
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            el.classList.remove('nav_logo_100');
            el.classList.add('nav_logo_50');
            mybutton.style.display = "block";
        } else {
            el.classList.remove('nav_logo_50');
            el.classList.add('nav_logo_100');
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function gotoTopFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
</script>

<script>
    function votes(heroId) {
        document.querySelector('#vote-count-' + heroId).textContent++;
    }

    function voteOnHero(event) {
        let heroId = event.target.dataset.heroId;
        axios.put('/hero/vote/' + heroId)
            .then(res => {
                if (res.data) {
                    votes(heroId);
                } else {
                    Toast.fire({
                        icon: 'warning',
                        title: 'You can vote only once to any one hero.'
                    })
                }
            });
    }

    Echo.channel('votes')
        .listen('.heroVote', function (event) {
            votes(event.heroID);
        })
</script>

@stack('scripts')
