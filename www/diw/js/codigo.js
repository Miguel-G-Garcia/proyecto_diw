"use strict";

var oEstancias = new Estancias();

linkEvents();

function linkEvents() {

	// hacer que tooltip funcione
	const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
	const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

	//opciones del menu
	document.querySelector("#mnuFormClient").addEventListener("click", openSection);
	const landPage = document.querySelector("#mnuLandPage");
	landPage.addEventListener("click", openSection);
	document.querySelector("#mnuFormReservation").addEventListener("click", openSection);
	document.querySelector("#mnuListCLients").addEventListener("click", openSection);
	document.querySelector("#mnuListReservations").addEventListener("click", openSection);
	//document.querySelector("#mnuFindClient").addEventListener("click", openSection);
	//document.querySelector("#mnuFindReservations").addEventListener("click", openSection);


	//Botones de formularios
	frmNewClient.btnAddClient.addEventListener("click", addClient);
	frmEditClient.btnEditClient.addEventListener("click", EditClient);
	//frmFindClient.btnFindClient.addEventListener("click", FindClient);
	frmNewReservation.btnMakeReservation.addEventListener("click", MakeReservation);
	frmEditReservation.btnEditReservation.addEventListener("click", EditReservation);
	//frmFindReservation.btnFindReservation.addEventListener("click", FindReservation);
}
function openSection(oEvent) {
	let optionMenu = oEvent.target.id;

	hideAll();

	switch (optionMenu) {
		case "mnuFormClient":
			frmNewClient.style.display = "block";
			break;
		case "mnuFormReservation":
			frmNewReservation.style.display = "block";
			break;
		case "mnuLandPage":
			landPage.style.display = "block";
			break;
		case "mnuListCLients":
			processListClient();
			break;
		case "mnuListReservations":
			processListReservations();
			break;

	}

}

function hideAll() {
	frmNewClient.style.display = "none";
	frmNewReservation.style.display = "none";
	frmEditClient.style.display = "none";
	frmEditReservation.style.display = "none";
	landPage.style.display = "none";
	document.querySelector("#dataList").style.display = "none";
}

async function processListReservations() {
	hideAll();
	document.querySelector("#dataList").style.display = "block";
	document.querySelector("#dataList").innerHTML = await oEstancias.listReservationsData();
	document.querySelectorAll('.btnDeleteReserv').forEach(function (addEvent) {
		addEvent.addEventListener('click', removeReserv);
	});
	document.querySelectorAll('.btnEditReserv').forEach(function (addEvent) {
		addEvent.addEventListener('click', processReservationEditForm);
	});


}

async function processListClient() {
	hideAll();
	document.querySelector("#dataList").style.display = "block";
	document.querySelector("#dataList").innerHTML = await oEstancias.listClientsData();
	document.querySelectorAll('.btnDeleteClient').forEach(function (addEvent) {
		addEvent.addEventListener('click', removeClient);
	});
	document.querySelectorAll('.btnEditClient').forEach(function (addEvent) {
		addEvent.addEventListener('click', processClientEditForm);
	});

}
async function addClient() {
	let client_name = frmNewClient.txtClientName.value.trim();
	let address = frmNewClient.txtAddress.value.trim();
	let phone_number = frmNewClient.txtPhone.value.trim();
	let gmail = frmNewClient.txtGmail.value.trim() + "@gmail.com";

	let respuesta = await oEstancias.addClient(new Client(null, client_name, address, phone_number, gmail));

	Toast(respuesta.mensaje);

	if (!respuesta.error) {
		frmNewClient.reset();
	}
}
async function MakeReservation() {
	let client_id = parseInt(frmNewReservation.txtClientId.value.trim());
	let checkIn = frmNewReservation.txtCheckIn.value.trim();
	let checkOut = frmNewReservation.txtCheckOut.value.trim();
	let roomNmb = parseInt(frmNewReservation.txtRoomNmb.value.trim());

	if (checkOut < checkIn || checkOut === checkIn) {
		Toast("La fecha de entrada tiene que ser antes que la fecha de salida");
	} else {

		let respuesta = await oEstancias.makeReservation(new Reservation(null, client_id, checkIn, checkOut, roomNmb));

		Toast(respuesta.mensaje);

		if (!respuesta.error) {
			frmNewReservation.reset();
		}
	}
}


async function processClientEditForm(oEvent) {
	let button = null;

	if (oEvent.target.nodeName == "I" || oEvent.target.nodeName == "button") {
		if (oEvent.target.nodeName == "I") {
			button = oEvent.target.parentElement; 
		} else {
			button = oEvent.target;
		}

		hideAll();

		frmEditClient.style.display = "block";

		let client = JSON.parse(button.dataset.client);

		frmEditClient.txtClientId.value = client.client_id;
		frmEditClient.txtClientName.value = client.client_name;
		frmEditClient.txtAddress.value = client.address;
		frmEditClient.txtPhone.value = client.phone_number;
		frmEditClient.txtGmail.value = client.gmail;

	}
}

async function processReservationEditForm(oEvent) {
	let button = null;

	
	if (oEvent.target.nodeName == "I" || oEvent.target.nodeName == "button") {
		if (oEvent.target.nodeName == "I") {
			button = oEvent.target.parentElement;
		} else {
			button = oEvent.target;
		}

		hideAll();

		frmEditReservation.style.display = "block";

		let reservation = JSON.parse(button.dataset.reservation);

		frmEditReservation.txtReservationId.value = reservation.reservation_id;
		frmEditReservation.txtClientId.value = reservation.client_id;
		frmEditReservation.txtCheckIn.value = reservation.check_in_date;
		frmEditReservation.txtCheckOut.value = reservation.check_out_date;
		frmEditReservation.txtRoomNmb.value = reservation.room_number;

	}
}

async function removeClient(oEvent) {
	let button = null;

	if (oEvent.target.nodeName == "I" || oEvent.target.nodeName == "button") {
		if (oEvent.target.nodeName == "I") {
			button = oEvent.target.parentElement;
		} else {
			button = oEvent.target;
		}

		let idClient = button.dataset.idclient;
		let response = await oEstancias.removeClient(idClient);

		Toast(response.mensaje);

		if (!response.error) {
			processListClient();
		}
	}
}

async function removeReserv(oEvent) {
	let button = null;

	if (oEvent.target.nodeName == "I" || oEvent.target.nodeName == "button") {
		if (oEvent.target.nodeName == "I") {
			button = oEvent.target.parentElement;
		} else {
			button = oEvent.target;
		}
		let idReserv = button.dataset.idreserv;

		let response = await oEstancias.removeReserv(idReserv);

		Toast(response.mensaje);

		if (!response.error) {
			processListReservations();
		}
	}

}

async function EditClient() {
	let client_id = parseInt(frmEditClient.txtClientId.value.trim());
	let client_name = frmEditClient.txtClientName.value.trim();
	let address = frmEditClient.txtAddress.value.trim();
	let phone_number = parseInt(frmEditClient.txtPhone.value.trim());
	let gmail = frmEditClient.txtGmail.value.trim();

	let respuesta = await oEstancias.editClient(new Client(client_id, client_name, address, phone_number, gmail));

	Toast(respuesta.mensaje);

	if (!respuesta.error) {
		frmEditReservation.reset();
		processListClient();
		document.querySelector("#dataList").style.display = "block";
	}

}

async function EditReservation() {
	let reservation_id = parseInt(frmEditReservation.txtReservationId.value.trim());
	let client_id = parseInt(frmEditReservation.txtClientId.value.trim());
	let check_in_date = frmEditReservation.txtCheckIn.value.trim();
	let check_out_date = frmEditReservation.txtCheckOut.value.trim();
	let room_number = frmEditReservation.txtRoomNmb.value.trim();

	if (check_out_date < check_in_date || check_out_date === check_in_date) {
		Toast("La fecha de entrada tiene que ser antes que la fecha de salida");
	} else {

		let respuesta = await oEstancias.editReservation(new Reservation(reservation_id, client_id, check_in_date, check_out_date, room_number));

		Toast(respuesta.mensaje);

		if (!respuesta.error) {
			frmEditReservation.reset();
			processListReservations();
			document.querySelector("#dataList").style.display = "block";
		}
	}
}


async function FindReservation(){
	let reservation_id = parseInt(frmFindReservation.txtReservationId.value.trim());

	let respuesta = await oEstancias.findReservation(reservation_id);

	Toast(respuesta.mensaje);

		if (!respuesta.error) {
			
			frmFindReservation.reset();

			hideAll();

			frmEditReservation.style.display = "block";

			
		}

}


function Toast(message) {
	const toastLiveExample = document.getElementById('liveToast');
	document.querySelector("#Notification").innerHTML = message;
	const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample).show()
}