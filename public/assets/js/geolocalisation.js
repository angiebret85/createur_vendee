


let inputAddress = document.querySelector('#createur_adresse')
if(inputAddress !== null){
    let place = places({
        container: inputAddress,
        appId: 'plUGDTHZM3CD',
        apiKey: 'b163589ead66a9c0912e42c71c602d4c',
    })
    place.on('change', e =>{
        document.querySelector('#createur_ville').value = e.suggestion.city
        document.querySelector('#createur_codepostal').value = e.suggestion.postcode
        document.querySelector('#createur_lat').value = e.suggestion.latlng.lat
        document.querySelector('#createur_lng').value = e.suggestion.latlng.lng
    })
}

let searchAddress = document.querySelector('#search_address')
if(searchAddress !== null){
    let place = places({
        container: searchAddress,
        appId: 'plUGDTHZM3CD',
        apiKey: 'b163589ead66a9c0912e42c71c602d4c',
    })
    place.on('change', e =>{
        document.querySelector('#lat').value = e.suggestion.latlng.lat
        document.querySelector('#lng').value = e.suggestion.latlng.lng
    })
}