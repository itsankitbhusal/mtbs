function confirmDelete(id) {
  if (confirm("Are you sure you want to delete this?")) {
    location.href = `./delete.php?id=${id}`;
  }
}

const error = document.getElementById("error");
if (error) {
  setTimeout(() => {
    error.classList.add("d-none");
    error.classList.add("fade");
  }, 3000);
}
const success = document.getElementById("success");
if (success) {
  setTimeout(() => {
    success.classList.add("d-none");
    success.classList.add("fade");
  }, 3000);
}
