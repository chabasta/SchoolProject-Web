function modal(button, action) {   //funtion open or close module
  let modal_id = button.getAttribute("data-modal");
  let modal = document.getElementById(modal_id);
  let overlay = document.getElementById("modal-overlay");
  
  if (action === "show") { 
    overlay.style.display = "block";
    modal.style.display = "block";
  } else {
    overlay.style.display = "none";
    modal.style.display = "none";
  }
}

function buttons_events(open, close){  //add events to open and close buttons

  for (var i = 0; i < open.length; i++) {

    open[i].addEventListener("click", function () {
      modal(this, "show");

    });
  }

  for (var i = 0; i < close.length; i++) {
    close[i].addEventListener("click", function () {
      modal(this, "close");
    });
  }

}