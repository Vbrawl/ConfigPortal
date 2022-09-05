const DYNAMIC_CONTAINER_ID = "dynamic";
var edit_mode = '';
var UpdateInterval = 0;


async function logout() {
  await fetch("/php/login.php?action=sessionend");
  window.location = window.location; // refresh
}



async function get_data() {
  i = document.getElementById("config-selector").selectedIndex;
  resp = await fetch("/php/panel.php?action=read_config&file="+i);
  text = await resp.text();
  return text;
}

async function send_data(config_data) {
  await fetch("/php/panel.php?action=write_config", {
    method: 'POST',
    body: config_data
  });

  alert("Config Saved!");
}



function clear_dynamic_objects() {
  edit_mode = '';

  dyncon = document.getElementById(DYNAMIC_CONTAINER_ID);
  dyncon.innerHtml = "";
  dyncon.innerText = "";
}


async function add_raw_edit() {
  config_data = await get_data();

  await clear_dynamic_objects();

  edit_mode = 'raw'

  dyncon = document.getElementById(DYNAMIC_CONTAINER_ID);

  text_area = document.createElement("textarea");
  text_area.classList.add("raw_textfield");
  text_area.value = config_data;
  dyncon.appendChild(text_area);
}





function send_changes() {
  config_data = '';

  if(edit_mode == 'raw') {
    dyncon = document.getElementById(DYNAMIC_CONTAINER_ID);
    config_data = dyncon.getElementsByTagName("textarea")[0].value;
  }



  send_data(config_data);
}





async function changeStatus(obj, i) {
  if(obj.classList.contains("stopped")) { // start
    await fetch("/php/panel.php?action=start_program&file=" + i);
  }
  else { // stop
    await fetch("/php/panel.php?action=stop_program&file=" + i);
  }
}


async function updateStatus() {
  programs = document.getElementsByClassName("program");

  for(i = 0; i < programs.length; i++) {
    f = programs[i].getElementsByClassName("program-status")[0];

    resp = await fetch("/php/panel.php?action=get_program_status&file=" + f.innerText);
    text = await resp.text();

    if(!f.classList.contains(text) && (text == "started" || text == "stopped")) {
      if(f.classList.contains("stopped")) {
        f.classList.remove("stopped");
      } else {
        f.classList.remove("started");
      }
      f.classList.add(text);
    }
  }
}






window.onload = () => {
  if(document.readyState == "complete") {
    add_raw_edit();
    UpdateInterval = setInterval(updateStatus, 1000);
  }
}
