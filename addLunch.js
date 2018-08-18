function showAddLunchPopup(){
    console.log("showing popup");
    document.getElementById("lunchPopup").style.visibility = "visible";
    var shadow = document.getElementById("shadow")
    shadow.classList.add("shadowon");
};

$('#select')
  .dropdown()
;

