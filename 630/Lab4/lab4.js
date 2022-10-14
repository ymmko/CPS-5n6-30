// Lab 4 Part 2
// Group: 13


// Initialize and add the map
function initMap() {
    // The locations of the markers
    var slc = { lat: 43.6574748, lng: -79.3811831 };
    var popeyes = { lat: 43.6608822, lng: -79.3827368 };
    var subway = { lat: 43.656447, lng: -79.3787139 };

    // Variables used to determine whether certain markers should appear or not
    var showSlc = true;
    var showPopeyes = false;
    var showSubway = false;
    
    // Intializes map
    var map = new google.maps.Map(document.getElementById("map"), {
        zoom: 16,
        center: slc,
    });

    // Marker 1: Student Learning Centre
    var marker = new google.maps.Marker({
        position: slc,
        map: map,
    });

    var infoWindow = new google.maps.InfoWindow({
        content: "<h3> Student Learning Centre </h3>Study Space<br></br>Open: Monday-Friday 8am - 11pm<br></br>Saturday-Sunday 12pm - 8pm"});
        marker.addListener("click", function(){
            infoWindow.open(map, marker);
    });

    // Marker 2: Popeyes
    var marker2 = new google.maps.Marker({
        position: popeyes,
        map: null,
    });
    
    var infoWindow2 = new google.maps.InfoWindow({
        content: "<h3> Popeyes Louisiana Kitchen</h3>Fried Chicken Shop<br></br>Open: Everyday 10am - 3am"});
        marker2.addListener("click", function(){
            infoWindow2.open(map, marker2);
    });

    // Marker 3: Subway
    var marker3 = new google.maps.Marker({
        position: subway,
        map: null,
    });
    
    var infoWindow3 = new google.maps.InfoWindow({
        content: "<h3> Subway </h3>Sandwich Shop<br></br>Open: Everyday 10am - 8pm"});
        marker3.addListener("click", function(){
            infoWindow3.open(map, marker3);
    });

    // Event handlers for buttons
    document
        .getElementById("slc")
        .addEventListener("click", toggleSlc);
    document
        .getElementById("popeyes")
        .addEventListener("click", togglePopeyes);
    document
        .getElementById("subway")
        .addEventListener("click", toggleSubway);

    function toggleSlc(){
        if (showSlc == true){
            marker.setMap(null)
            showSlc = false;
        }
        else{
            marker.setMap(map)
            showSlc = true;
        }
    }

    function togglePopeyes(){
        if (showPopeyes == true){
            marker2.setMap(null)
            showPopeyes = false;
        }
        else{
            marker2.setMap(map)
            showPopeyes = true;
        }
    }

    function toggleSubway(){
        if (showSubway == true){
            marker3.setMap(null)
            showSubway = false;
        }
        else{
            marker3.setMap(map)
            showSubway = true;
        }
    }
}