<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Hide the slides by default */
    .mySlides, .mySlides2 {
        display: none;
    }

    .dot-2-activate{
        background-color: #238351;
    }

    .active {
        background-color: #717171;
    }

    .accordion-active{
        background-color: #27A965;
        border: #27A965;
        color: white;
    }

    /* Fading animation */
    .fade {
        animation-name: fade;
        animation-duration: 1.5s;
    }

    @keyframes fade {
        from {
            opacity: .4
        }

        to {
            opacity: 1
        }
    }

</style>