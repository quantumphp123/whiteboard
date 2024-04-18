function allowDrop(e) {
  e.preventDefault();
}

function drag(e) {
  e.dataTransfer.setData("text", e.target.id);
}

function drop(e) {
  e.preventDefault();
  var data = e.dataTransfer.getData("text");
  e.target.appendChild(document.getElementById(data));
  position = e.target.id;
  element = data;
  // alert("POSITION : " +position+ "  ELEMENT : " +element)
  $.ajax({
    url: getUrl(),
    type: "POST",
    dataType: 'json',
    data: { position, element},
    headers: { 
      'X-CSRF-Token': getCsrfToken()
    },
    success: function(response) {
      // alert("SUCCESS: " +JSON.stringify(response))
      console.log("SUCCESS: " +response)
    },
    error: function(error) {      
      // alert("ERROR: " +JSON.stringify(error))
      console.log("ERROR: " +error)
    }
  })
}

const EquiryFrom = () => {
  window.location.href = "";
  console.log("hello");
  Equiry();
};

const Equiry = () => {
  console.log("hello1");
  setTimeout(() => {
    document.getElementById("customize").click();
  }, 3000);
};
