<template>
    <div class="card mb-3">
        <div class="card-header">{{ name }} ({{ zip }})</div>
        <div class="card-body">
            <div class="row mt-2">
                <div class="col">
                    <p><span class="">{{ f }} &#176; F</span><span class="pl-2 pr-2 text-black-50">|</span><span class="">{{ c }} &#176; C</span></p>
                    <p>{{ humidity }}% Humidity</p>
                </div>
                <div class="col text-right"><i v-bind:class="icon" style="font-size: 64px;" class="text-info fas"></i></div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

    props: ['name', 'zip'],

    data: function () {
        return {
            apiRequest: new XMLHttpRequest(),
            icon: '',
            c: 0,
            f: 0,
            humidity: 0
        }
    },

    mounted() {
        this.getWeather(this.zip);
    },


    methods: {

        getWeather(zipcode) {

            let appId = '58e92c763df5499a2c9ae20da806e2dc';

            // Format a url
            let url = 'https://api.openweathermap.org/data/2.5/weather?zip=<zipcode>,us&appid=<appid>';
            url = url.replace("<zipcode>", zipcode);
            url = url.replace("<appid>", appId);

            // Fetch from the url
            this.apiRequest.onload = this.onSuccess;
            this.apiRequest.onerror = this.onError;
            this.apiRequest.open('get', url, true);
            this.apiRequest.send();
        },

        onSuccess() {
            let response = JSON.parse(this.apiRequest.responseText);
            this.icon = this.decideImage(response.weather[0].icon);
            this.c = Math.round(this.KtoC(response.main.temp));
            this.f = Math.round(this.KtoF(response.main.temp));
            this.humidity = response.main.humidity;
        },

        onError() {
            console.log("Error!");
        },

        KtoC(tempK) {
            return tempK - 273.15;
        },

        KtoF(tempK) {
            return (tempK * 9/5) - 459.67;
        },

        decideImage(icon) {

            let image = "fa-cloud-meatball";

            switch (icon) {
                case '01d':
                    // Clear Sky
                    image = "fa-sun";
                    break;
                case '02d':
                    // Few Clouds
                    image = "fa-cloud-sun";
                    break;
                case '03d':
                    // Scattered Clouds
                    image = "fa-cloud";
                    break;
                case '04d':
                    // Scattered Clouds
                    image = "fa-cloud";
                    break;
                case '09d':
                    // Shower rain
                    image = "fa-cloud-showers-heavy";
                    break;
                case '10d':
                    // Rain
                    image = "fa-cloud-rain";
                    break;
                case '11d':
                    // Thunderstorm
                    image = "fa-bolt";
                    break;
                case '13d':
                    // Snow
                    image = "fa-snowflake";
                    break;
                case '50d':
                    // Mist
                    image = "fa-water";
                    break;
                
            }

            return image;

        }

    }
}
</script>
