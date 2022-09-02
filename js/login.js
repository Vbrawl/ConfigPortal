function label_show(label) {
  label.classList.add("show");
}

function label_unshow(inp, label) {
  if(! inp.value) {
    label.classList.remove("show");
  }
}


var password_sent = false;
function send_password() {
  password = document.getElementsByClassName("password-field-input")[0].value;

  if(! password_sent && password) {
    password_sent = true;

    fetch("/php/login.php?action=authenticate", {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json;charset=utf-8'
      },
      body: JSON.stringify({"password": password})
    })
    .then((resp) => {
      resp.text().then((text) => {
        login_json = JSON.parse(text);
        password_sent = false;


        if(login_json["status"] == "Success") {
          window.location = window.location; // refresh
        }


      });
    });
  }
}
