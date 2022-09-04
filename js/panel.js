const DYNAMIC_CONTAINER_ID = "dynamic";
var edit_mode = '';


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












window.onload = () => {
  if(document.readyState == "complete") {
    add_raw_edit();
  }
}
