const editBtn = document.getElementById("editBtn");
let isEditing = false;

editBtn.addEventListener("click", () => {
  isEditing = !isEditing;
  toggleEditMode(isEditing);
});

function toggleEditMode(editing) {
  const inputs = ["name", "email", "address"];
  inputs.forEach((field) => {
    const display = document.getElementById(`${field}Display`);
    const input = document.getElementById(`${field}Input`);
    if (editing) {
      display.classList.add("hidden");
      input.classList.remove("hidden");
    } else {
      display.textContent = input.value.replace(/\n/g, "\n");
      display.classList.remove("hidden");
      input.classList.add("hidden");
    }
  });

  editBtn.innerHTML = editing ? "Save <span class='edit-icon'>💾</span>" : "Edit <span class='edit-icon'>✏️</span>";
}

function joinClub(clubName) {
  const userClubs = document.getElementById('user-clubs');
  const existingClub = [...userClubs.children].some(li => li.textContent === clubName);
  if (!existingClub) {
    const li = document.createElement('li');
    li.textContent = clubName;
    userClubs.appendChild(li);
  } else {
    alert('You are already in this book club!');
  }
}

