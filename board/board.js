 /********************************************************************
  * 
  * Filnamn: board.js
  * Författare: Sofia Khan Yamanee
  * 
  * Info: Filen innehåller funktioner för drag and drop samt 
  *       skickar XMLHttpRequest för ändring i databas
  * 
  ********************************************************************/

let from;
let to;
let task;

function allowDrop(event) {
  event.preventDefault();
}

function onDrag(event) {
  event.dataTransfer.setData("text", event.target.id);
  from = event.target.parentElement.id;
  task = event.target.id;
  console.log("Drar task: " + task)
  console.log("Från box: " + from)
}

function onDrop(event) {
  event.preventDefault();
  to = event.target.id;
  console.log(event);
  console.log('Till box: ' + to)
  let data = event.dataTransfer.getData("text");
  event.target.appendChild(document.getElementById(data));

  if (from !== to){

    const send = {
      task: task,
      from: from,
      to: to
    };

    const jsonString = JSON.stringify(send);
    const xhr = new XMLHttpRequest();
    console.log("skicka");

  
    xhr.open('POST', `update.php?task=${task}`);
    xhr.setRequestHeader("Content-type", "application/json");
    xhr.send(jsonString);


  //  *************   This will be called after the response is received   *************   //

    // xhr.onload = function() {
    //   if (xhr.status != 200) { // analyze HTTP status of the response
    //     alert(`Error ${xhr.status}: ${xhr.statusText}`); // e.g. 404: Not Found
    //   } else { // show the result
    //     alert(`Done, got ${xhr.response.length} bytes`); // response is the server
    //   }
    // };

    // xhr.onprogress = function(event) {
    //   if (event.lengthComputable) {
    //     alert(`Received ${event.loaded} of ${event.total} bytes`);
    //   } else {
    //     alert(`Received ${event.loaded} bytes`); // no Content-Length
    //   }

    // };

    // xhr.onerror = function() {
    //   alert("Request failed");
    // };
    
  }
  
}

function openForm(event) {
  // console.log("open id: " + event.target.parentNode.id);
  let id = event.target.parentNode.id;
  document.getElementById("myForm" + id).style.display = "block";

}

function closeForm(event) {
  let id = event.target.parentNode.parentNode.parentNode.id;
  // console.log("close: " + id);
  document.getElementById(id).style.display = "none";
}

