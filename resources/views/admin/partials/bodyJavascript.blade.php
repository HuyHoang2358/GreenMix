<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
<script src="{{asset('backend/dist/js/app.js')}}"></script>

<script>
    function handleCountNumberCharacter(inputId, countId, maxLength){
        const input = document.getElementById(inputId);
        let str = input.value;
        const number = str.length;
        if (number > maxLength){
            str = str.substring(0, maxLength)
            input.value = str;
        }
        document.getElementById(countId).innerText = number;
    }
</script>
