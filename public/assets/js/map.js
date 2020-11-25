

$(document).ready
(function initMap()
    {
      
            let map = document.querySelector('#map')
            if (map === null) {
              return
            }
            let icon = L.icon({
              iconUrl: '/assets/images/marker-icon.png',
            })
            let center = [map.dataset.lat, map.dataset.lng]
            map = L.map('map').setView(center, 14)
            let token = 'pk.eyJ1IjoiYW5nZWxpcXVlLWdlbWFyaW4iLCJhIjoiY2todDlyZmx5MGxqeDJ4cGlmejBsc3dhdCJ9.yUKd-XZVf8wMZo5VQsj2XQ'
            L.tileLayer(`https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}`, {
              maxZoom: 18,
              minZoom: 12,
              id: 'mapbox/streets-v11',
              accessToken: 'pk.eyJ1IjoiYW5nZWxpcXVlLWdlbWFyaW4iLCJhIjoiY2todDlyZmx5MGxqeDJ4cGlmejBsc3dhdCJ9.yUKd-XZVf8wMZo5VQsj2XQ',
              attribution: '© <a href="https://www.mapbox.com/feedback/">Mapbox</a> © <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map)
            L.marker(center, {icon:icon}).addTo(map)
          }
)