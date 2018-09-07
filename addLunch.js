function showAddLunchPopup(){
    console.log("showing popup");
    document.getElementById("lunchPopup").style.visibility = "visible";
    document.getElementById("shadow").classList.add("shadowon");
};

function hideAddLunchPopup(){
    document.getElementById("lunchPopup").style.visibility = "hidden";
    document.getElementById("shadow").classList.remove("shadowon");
}

$('#example2').calendar({
    type: 'date'
  });

function toggleParticipantNumBox(){
    if(document.getElementById("lunchLocations").value){

    }
}
