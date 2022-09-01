function label_show(label) {
  console.log("Hello World!");
  label.classList.add("show");
}

function label_unshow(inp, label) {
  if(! inp.value) {
    label.classList.remove("show");
  }
}
