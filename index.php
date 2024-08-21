<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyDakshina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">EasyDakshina</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <button class="btn btn-primary" id="addGuestBtn">Add Guest</button>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-primary" id="addQrBtn">Add QR</button>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-primary" id="showQrBtn">Show QR</button>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-primary" id="generateReportBtn">Generate Reports</button>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="guestsTable">
            <!-- Guests Data will be loaded here via Ajax -->
        </div>
    </div>

    <!-- Modal for Adding Guest -->
    <div class="modal fade" id="addGuestModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Guest</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addGuestForm">
                        <div class="mb-3">
                            <label for="guestName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="guestName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="guestEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="guestEmail" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="guestContact" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="guestContact" name="contact_number" required>
                        </div>
                        <div class="mb-3">
                            <label for="guestAddress" class="form-label">Address</label>
                            <input type="text" class="form-control" id="guestAddress" name="address" required>
                        </div>
                        <div class="mb-3">
                            <label for="guestAmount" class="form-label">Amount Paid</label>
                            <input type="number" class="form-control" id="guestAmount" name="amount_paid" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Guest</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Adding QR -->
    <div class="modal fade" id="addQrModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add QR Code</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addQrForm" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="qrCodeImage" class="form-label">QR Code Image</label>
                            <input type="file" class="form-control" id="qrCodeImage" name="qr_code_image" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add QR</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Showing QR Codes -->
    <div class="modal fade" id="showQrModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">QR Codes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div id="qrCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" id="qrCarouselInner">
                            <!-- QR Codes will be loaded here via Ajax -->
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#qrCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#qrCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Guest Modal -->
    <div class="modal fade" id="editGuestModal" tabindex="-1" aria-labelledby="editGuestModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editGuestForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editGuestModalLabel">Edit Guest</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="guestId">
                        <div class="mb-3">
                            <label for="editName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="editName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="editEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editEmail" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="editContactNumber" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="editContactNumber" name="contact_number" required>
                        </div>
                        <div class="mb-3">
                            <label for="editAddress" class="form-label">Address</label>
                            <input type="text" class="form-control" id="editAddress" name="address" required>
                        </div>
                        <div class="mb-3">
                            <label for="editAmountPaid" class="form-label">Amount Paid</label>
                            <input type="number" class="form-control" id="editAmountPaid" name="amount_paid" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal for Generating Reports -->
    <div class="modal fade" id="generateReportModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Generate Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="reportContent">
                    <!-- Report Content will be loaded here via Ajax -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>