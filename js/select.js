// javascript

const seats = document.querySelectorAll('.seat'); // tablica elementów z klasą seat
const saveButton = document.getElementById('save-button'); // element z id save-button
const maxSeats = 8;

// dla każdego elementu z klasą seat
seats.forEach(seat => {
  // dodaj zdarzenie na kliknięcie
  seat.addEventListener('click', () => {
    // co ma się dziać po kliknięciu
    if (!seat.classList.contains('taken')) {
      seat.classList.toggle('selected'); // przełączanie klasy selected
    }

    const selectedSeats = document.querySelectorAll('.seat.selected');
    saveButton.disabled = selectedSeats.length === 0 || selectedSeats.length > maxSeats;

    if (selectedSeats.length > maxSeats) {
        alert(`Nie można wybrać więcej niż ${maxSeats} miejsc!`);
        seat.classList.toggle('selected');
        saveButton.disabled = false;
    }
  })
})

// po kliknięciu
saveButton.addEventListener('click', () => {
  // tablica elementów z klasami seat i selected
  const selectedSeats = document.querySelectorAll('.seat.selected');

  if (selectedSeats.length > maxSeats) {
      saveButton.disabled = true;
      return;
  }

  // tablica z id miejsc
  const selectedSeatIds = [];

  // dodanie id miejsc
  selectedSeats.forEach(seat => {
    selectedSeatIds.push(seat.id);
  })

  // utworzenie elementu formularza
  const form = document.createElement('form');
  form.method = 'POST';
  form.action = 'scripts/save_seats.php';

  // utworzenie elementu input
  const input = document.createElement('input');
  input.type = 'hidden';
  input.name = 'selectedSeats';
  input.value = selectedSeatIds.join(',');

  form.appendChild(input); // dodanie inputa do formularza
  document.body.appendChild(form); // dodanie formularza do strony
  form.submit(); // przesłanie formularza
})