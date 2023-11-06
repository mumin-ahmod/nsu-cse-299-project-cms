<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Requests</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">My Leave Requests</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Need From Date</th>
                    <th>Need To Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through leave requests (example data) -->
                <tr>
                    <td>Annual leave</td>
                    <td>2023-10-15</td>
                    <td>2023-10-20</td>
                    <td>Pending</td>
                    <td>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete">Delete</button>
                    </td>
                </tr>

                <tr>
                    <td>Half Day leave</td>
                    <td>2023-10-19</td>
                    <td>2023-10-19</td>
                    <td>Approved!</td>
                    <td>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete">Delete</button>
                    </td>
                </tr>
                <!-- Add more rows for additional leave requests -->
            </tbody>
        </table>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteLabel">Confirm Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this leave request?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
