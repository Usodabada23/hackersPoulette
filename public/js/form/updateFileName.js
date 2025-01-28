function updateFileName() {
  const fileInput = document.getElementById("file");
  const fileNameSpan = document.getElementById("span-filename");

  if (fileInput.files.length > 0) {
    fileNameSpan.textContent = fileInput.files[0].name;
  } else {
    fileNameSpan.textContent = "(JPG, PNG, GIF) size max 2MB";
  }
}
