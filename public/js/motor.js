document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".motor-location").forEach(function (element) {
        element.addEventListener("click", function () {
            let selectedLocation = this.textContent;

            let encodedLocation = encodeURIComponent(selectedLocation);
            let googleMapsUrl = `https://www.google.com/maps?q=${encodedLocation}&output=embed`;

            document.getElementById("google-map").src = googleMapsUrl;

            
            let locationContainer = document.getElementById("location-container");
            locationContainer.classList.remove("d-none");

           
            setTimeout(() => {
                locationContainer.scrollIntoView({ behavior: "smooth" });
            }, 300);
        });
    });

    
    document.getElementById("close-map").addEventListener("click", function () {
        document.getElementById("location-container").classList.add("d-none");
    });
});