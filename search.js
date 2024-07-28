function search() {
    let destination = document.getElementById('destination').value;
    let travelDate = document.getElementById('travel-date').value;

    let isAvailable = paquetes.some(paquete => 
        paquete.destino.toLowerCase() === destination.toLowerCase() && 
        paquete.fecha === travelDate
    );

    let modalText = document.getElementById('modal-text');
    if (isAvailable) {
        modalText.textContent = `El viaje a ${destination} el ${travelDate} está disponible.`;
    } else {
        modalText.textContent = `El viaje a ${destination} el ${travelDate} no está disponible.`;
    }

    openModal();
}

function openModal() {
    let modal = document.getElementById('modal');
    modal.style.display = 'block';
}

function closeModal() {
    let modal = document.getElementById('modal');
    modal.style.display = 'none';
}

// Cerrar el modal cuando se hace clic fuera de él
window.onclick = function(event) {
    let modal = document.getElementById('modal');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}