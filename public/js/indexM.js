// Tutorial by http://youtube.com/CodeExplained
// api key : 82005d27a116c2880c8f0fcb866998a0

// SELECT ELEMENTS
const iconElement = document.querySelector(".weather-icon");
const tempElement = document.querySelector(".temperature-value p");
const descElement = document.querySelector(".temperature-description p");
const locationElement = document.querySelector(".location p");
const notificationElement = document.querySelector(".notification");
const messageContent= document.querySelector(".message-content");

// App data
const weather = {};

weather.temperature = {
    unit : "celsius"
}

// APP CONSTS AND VARS
const KELVIN = 273;
// API KEY
const key = "ca2b879abc90e10c38afc9f1211d67c8";

// CHECK IF BROWSER SUPPORTS GEOLOCATION
if('geolocation' in navigator){
    navigator.geolocation.getCurrentPosition(setPosition, showError);
}else{
    notificationElement.style.display = "block";
    notificationElement.innerHTML = "<p>Browser doesn't Support Geolocation</p>";
}

// SET USER'S POSITION
function setPosition(position){
    let latitude = position.coords.latitude;
    let longitude = position.coords.longitude;
    
    getWeather(latitude, longitude);
}

// SHOW ERROR WHEN THERE IS AN ISSUE WITH GEOLOCATION SERVICE
function showError(error){
    notificationElement.style.display = "block";
    notificationElement.innerHTML = `<p> ${error.message} </p>`;
}

// GET WEATHER FROM API PROVIDER
function getWeather(latitude, longitude){
    let api = `http://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&appid=${key}&lang=fr`;
    
    fetch(api)
        .then(function(response){
            let data = response.json();
            return data;
        })
        .then(function(data){
            weather.temperature.value = Math.floor(data.main.temp - KELVIN);
            weather.description = data.weather[0].description;
            weather.iconId = data.weather[0].icon;
            weather.city = data.name;
            weather.country = data.sys.country;
        })
        .then(function(){
            displayWeather();
        });
        temp=weather.temperature.value;
}

// DISPLAY WEATHER TO UI
function displayWeather(){
    iconElement.innerHTML = `<img src="icons/${weather.iconId}.png"/>`;
    tempElement.innerHTML = `${weather.temperature.value}°<span>C</span>`;
    descElement.innerHTML = weather.description;
    locationElement.innerHTML = `${weather.city}, ${weather.country}`;
    var msg= document.createElement('p');
    if(weather.temperature.value<0 || weather.temperature.value<15)
    {
        msg.innerHTML= "<p> <strong>Couvez-vous: </strong> Enfilez donc vos gants, bonnet, écharpe et paires de chaussettes. Superposez des couches sans trop les serrer pour que l’air emprisonné entre eux agisse comme un isolant (principe du double-vitrage) plutôt qu’un seul vêtement épais. Privilégiez les habits amples qui conservent un épais coussin d’air chaud contre votre corps et choisissez des textiles naturels comme le coton et la laine.<br><strong> hydratez-vous</strong>Du thé chaud et des tisanes, de l’eau tiède (pas trop froide), du café, du lait chaud avec du miel, du chocolat chaud… Toutes les boissons chaudes sont bonnes à prendre pour assurer à votre organisme la chaleur dont il a besoin. Attention, le froid parfois engourdit et n’imprime pas la sensation de soif sur l’organisme. Il est indispensable de bien boire: comme en été, buvez bien votre litre d’eau journalier.";
    }
    else if(weather.temperature.value>=15  )
    {
        msg.innerHTML="<p><strong> hydratez-vous:</strong>Cela a l’air tout bête dit comme cela, mais c’est pourtant important de bien et beaucoup vous hydrater en période de forte chaleur. N’oubliez pas que vous buvez pour deux ! Enceinte, passez à une consommation de 1 bouteille d’eau en temps normal à 2 ou 3 quand le thermomètre grimpe.<br> <strong> rafraichissez-vous: </strong>La chaleur chez la future maman peut provoquer des phénomènes désagréables : transpiration excessive, sommeil agité, voire petits malaises… Toutes les astuces sont bonnes pour vous offrir un coup de frais.C’est encore le meilleur moyen de vous rafraîchir. Un petit tour à la piscine, ça vous dit ? Sans oublier que la natation ou l’aquagym sont des sports excellents pendant la grossesse pour soulager les maux de dos, se maintenir en forme</p>"
    }
   
    messageContent.appendChild(msg);
}

// C to F conversion
function celsiusToFahrenheit(temperature){
    return (temperature * 9/5) + 32;
}

// WHEN THE USER CLICKS ON THE TEMPERATURE ELEMENET
tempElement.addEventListener("click", function(){
   
    if(weather.temperature.value === undefined) return;
    
    if(weather.temperature.unit == "celsius"){
        let fahrenheit = celsiusToFahrenheit(weather.temperature.value);
        fahrenheit = Math.floor(fahrenheit);
        
        tempElement.innerHTML = `${fahrenheit}°<span>F</span>`;
        weather.temperature.unit = "fahrenheit";
    }else{
        tempElement.innerHTML = `${weather.temperature.value}°<span>C</span>`;
        weather.temperature.unit = "celsius"
    }
});

// window.addEventListener('load', Messaging);
// function Messaging()
// {
//     var msg= document.createElement('p');
//     msg.innerText= temp;
//     messageContent.appendChild(msg);
// }