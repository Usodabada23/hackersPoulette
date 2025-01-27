const firstname = document.getElementById("firstname");
const lastname = document.getElementById("lastname");
const email = document.getElementById("email");
const form = document.getElementById("form");
const spanFname = document.getElementById("fnameSpan");
const spanLname = document.getElementById("lnameSpan");
const regexNames = /^[A-Za-z]+$/;

form.addEventListener("input", (e) => {
  const inputFname = firstname.value.trim();
  const inputLname = lastname.value.trim();
  if (!regexNames.test(inputFname) && inputFname.length>0) {
    spanFname.innerHTML = "Letter (A-Z)";
    spanFname.style.color = "red";
  }else{
    spanFname.innerHTML = "";
  }

  if(!regexNames.test(inputLname) && inputLname.length>0){
    spanLname.innerHTML = "Letter (A-Z)";
    spanLname.style.color = "red";
  }else{
    spanLname.innerHTML = "";
  }
});


