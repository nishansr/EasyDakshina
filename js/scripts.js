$(document).ready(function () {
  loadGuests();

  $("#addGuestBtn").click(function () {
    $("#addGuestModal").modal("show");
  });

  $("#addGuestForm").submit(function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "ajax/add_guest.php",
      data: $(this).serialize(),
      success: function (response) {
        $("#addGuestModal").modal("hide");
        loadGuests();
      },
    });
  });

  $("#addQrBtn").click(function () {
    $("#addQrModal").modal("show");
  });

  $("#addQrForm").submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      type: "POST",
      url: "ajax/add_qr.php",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        $("#addQrModal").modal("hide");
      },
    });
  });

  $("#showQrBtn").click(function () {
    loadQRCodes();
    $("#showQrModal").modal("show");
  });

  $("#generateReportBtn").click(function () {
    $.ajax({
      url: "ajax/generate_report.php",
      success: function (data) {
        $("#reportContent").html(data);
        $("#generateReportModal").modal("show");
      },
    });
  });
});

function loadGuests() {
  $.ajax({
    url: "ajax/fetch_guests.php",
    success: function (data) {
      $("#guestsTable").html(data);
    },
  });
}

function loadQRCodes() {
  $.ajax({
    url: "ajax/fetch_qr_codes.php",
    success: function (data) {
      $("#qrCarouselInner").html(data);
    },
  });
}

$(document).ready(function () {
  // Edit Guest
  $(document).on("click", ".edit-guest", function () {
    var guestId = $(this).data("id");
    console.log("Editing guest with ID:", guestId);

    // Fetch the guest data
    $.ajax({
      url: "ajax/get_guest.php",
      type: "GET",
      data: { id: guestId },
      success: function (response) {
        console.log("Guest data response:", response);
        var guest = JSON.parse(response);
        $("#editGuestModal #guestId").val(guest.id);
        $("#editGuestModal #editName").val(guest.name);
        $("#editGuestModal #editEmail").val(guest.email);
        $("#editGuestModal #editContactNumber").val(guest.contact_number);
        $("#editGuestModal #editAddress").val(guest.address);
        $("#editGuestModal #editAmountPaid").val(guest.amount_paid);
        $("#editGuestModal").modal("show");
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error:", status, error);
      },
    });
  });

  // Update Guest
  $("#editGuestForm").on("submit", function (e) {
    e.preventDefault();
    console.log("Submitting updated guest data:", $(this).serialize());

    $.ajax({
      url: "ajax/update_guest.php",
      type: "POST",
      data: $(this).serialize(),
      success: function (response) {
        console.log("Update response:", response);
        $("#editGuestModal").modal("hide");
        alert("Guest updated successfully!");
        location.reload();
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error:", status, error);
      },
    });
  });
});

$(document).ready(function () {
  // Delete Guest
  $(document).on("click", ".delete-guest", function () {
    var guestId = $(this).data("id");
    if (confirm("Are you sure you want to delete this guest?")) {
      $.ajax({
        url: "ajax/delete_guest.php",
        type: "POST",
        data: { id: guestId },
        success: function (response) {
          alert("Guest deleted successfully!");
          location.reload();
        },
      });
    }
  });
});
