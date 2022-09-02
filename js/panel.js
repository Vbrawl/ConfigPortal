const DYNAMIC_CONTAINER_ID = "dynamic";
var edit_mode = ''


function clear_dynamic_objects() {
  dyncon = document.getElementById(DYNAMIC_CONTAINER_ID);
  dyncon.innerHtml = "";
  dyncon.innerText = "";
}


function add_raw_edit(data) {
  clear_dynamic_objects();

  edit_mode = 'raw'

  dyncon = document.getElementById(DYNAMIC_CONTAINER_ID);

  text_area = document.createElement("textarea");
  text_area.classList.add("raw_textfield");
  text_area.value = data;
  dyncon.appendChild(text_area);
}


window.onload = () => add_raw_edit("Hello World!");
