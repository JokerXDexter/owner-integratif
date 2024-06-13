<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dorm Details
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-semibold mb-2">{{ $dorm->name }}</h1>
                    <div class="mb-4">
                        <img src="{{ asset($dorm->images) }}" alt="{{ $dorm->name }}"
                            class="w-full h-64 object-cover rounded-lg">
                    </div>
                    <div class="flex items-center mb-4">
                        <span
                            class="bg-blue-500 text-white px-2 py-1 rounded-full text-sm mr-2">{{ $dorm->type }}</span>
                    </div>
                    <p class="text-gray-800 dark:text-gray-300">{{ $dorm->description }}</p>
                </div>
                <div class="mt-4">
                    <div class="mb-4">
                        <h2 class="text-xl font-semibold mb-2">Your Location</h2>
                        <button onclick="getLocation()" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Get Location</button>
                        <div id="location-info" class="mt-2 text-gray-800 dark:text-gray-300">
                            <p id="latitude" class="mt-2"></p>
                            <p id="longitude" class="mt-2"></p>
                        </div>
                        <button onclick="openGoogleMaps()" class="bg-blue-500 text-white px-4 py-2 rounded-lg mt-2">Open in Google Maps</button>
                        <br>
                        <img id="map-image" alt="Map Image" class="mt-4 w-full h-64 object-cover rounded-lg">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        #location-info p {
            background-color: #f1f5f9;
            padding: 10px;
            border-radius: 5px;
            display: inline-block;
            margin: 5px 0;
        }
    </style>

    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function showPosition(position) {
            document.getElementById("latitude").innerHTML = "Latitude: " + position.coords.latitude;
            document.getElementById("longitude").innerHTML = "Longitude: " + position.coords.longitude;
            showMapImage(position.coords.latitude, position.coords.longitude);
        }

        function openGoogleMaps() {
            var latitude = document.getElementById("latitude").innerHTML.split(": ")[1];
            var longitude = document.getElementById("longitude").innerHTML.split(": ")[1];
            window.open("https://www.google.com/maps/search/?api=1&query=" + latitude + "," + longitude);
        }

        function showMapImage(latitude, longitude) {
            var mapImage = document.getElementById("map-image");
            var apiKey = "AIzaSyBZEUifxCdvAiOQO2cs2neEI66am9aF6MQ"; // Replace with your Google API key

            // Construct the URL for the static map image
            var imageUrl = "https://maps.googleapis.com/maps/api/staticmap?center=" + latitude + "," + longitude +
                           "&zoom=13&size=400x300&maptype=roadmap&markers=color:red%7Clabel:A%7C" + latitude + "," + longitude +
                           "&key=" + apiKey;

            // Set the source of the image to the constructed URL
            mapImage.src = imageUrl;
        }
    </script>
</x-app-layout>
