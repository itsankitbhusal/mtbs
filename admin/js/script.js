function confirmDelete(id) {
  if (confirm("Are you sure you want to delete this?")) {
    location.href = `./delete.php?id=${id}`;
  }
}
setTimeout(() => {
  const error = document.getElementById("error");
  error.classList.add("d-none");
  error.classList.add("fade");
}, 3000);

setTimeout(() => {
  const success = document.getElementById("success");
  success.classList.add("d-none");
  success.classList.add("fade");
}, 3000);
