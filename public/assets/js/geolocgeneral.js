
$(document).ready
    (function initMap()
    {
          
        let maps = document.querySelectorAll('#map')
        var villes= []

        for(i=0;i< maps.length;i++){
            var node =maps.item(i);
            var lat = node.getAttribute('data-lat')
            var lng = node.getAttribute('data-lng')
            var titre = node.getAttribute('data-name')
            villes.push([parseFloat(lat),parseFloat(lng), titre])
        }

        if (maps === null) {
            return
        }

        let icon = L.icon({
            iconUrl: '/assets/images/marker-icon.png',
        })
                
        maps = L.map('map').setView([46.670,-1.426], 2)
                
        let token = 'pk.eyJ1IjoiYW5nZWxpcXVlLWdlbWFyaW4iLCJhIjoiY2todDlyZmx5MGxqeDJ4cGlmejBsc3dhdCJ9.yUKd-XZVf8wMZo5VQsj2XQ'
        L.tileLayer(`https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}`, {
            maxZoom: 18,
            minZoom: 10,
            id: 'mapbox/streets-v11',
            accessToken: token,
            attribution: '© <a href="https://www.mapbox.com/feedback/">Mapbox</a> © <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(maps)

        for (var i=0; i < villes.length; i++){
            var lat = villes[i][0]
            var lng = villes[i][1]
            var titre = villes[i][2]
            L.marker([lat,lng], {icon:icon}).addTo(maps).bindPopup(titre)
        }    
    }
)