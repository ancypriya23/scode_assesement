<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a New Post</title>
    <!-- Bootstrap CSS CDN -->
     <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa; /* Light background color */
        }
        .card {
            border-radius: 10px; /* Rounded corners for the card */
        }
        .btn-custom {
            background-color: #007bff; /* Custom button color */
            color: white; /* Button text color */
        }
        .btn-custom:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }
        .form-label {
            font-weight: bold; /* Bold labels for better visibility */
        }
        .card-header {
            border-top-left-radius: 10px; /* Rounded corners for card header */
            border-top-right-radius: 10px; /* Rounded corners for card header */
        }
    </style>
</head>
<body>
&nbsp;
<div class="container mt-5">
    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white text-center">
                <h4>Create a New Post</h4>
            </div>
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="title" class="form-label">Post Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter post title" required>
                </div>

                <div class="form-group mb-3">
                    <label for="content" class="form-label">Post Content</label>
                    <textarea name="content" class="form-control" placeholder="Write your post content" rows="4" required></textarea>
                </div>

                <div class="form-group mb-4">
                    <label for="image" class="form-label">Post Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*" required>
                </div>

                <button type="submit" class="btn btn-custom w-100">Submit Post</button>
            </div>
        </div>
    </form>
</div>

<!-- Bootstrap JS and Popper.js (for dropdowns, modals, etc.) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>
