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