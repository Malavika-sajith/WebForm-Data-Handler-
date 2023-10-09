<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- Include SweetAlert2 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

  <!-- Custom styles -->
  <style>
    /* Center the form container vertically and horizontally */
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-image: url('https://img.freepik.com/free-vector/banner-background-with-low-poly_1048-10730.jpg'); /* Background image URL */
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }

    /* Style the form container with animation */
    .form-container {
      background-color: rgba(255, 255, 255, 0.7); /* Semi-transparent white background */
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      width: 300px; /* Adjust the width of the box as needed */
      animation: fadeIn 1s ease-in-out; /* Fade-in animation */
      border: 2px solid #FFA500; /* Orange border */
    }

    /* Style the form fields */
    form {
      text-align: center;
      font-family: 'Brush Script MT', cursive;
      font-variant: small-caps; /* Change font family */
    }

    /* Style the "Login Form" text */
    h1 {
      color: #FFA500; /* Orange color for "Login Form" text */
      font-family: 'Arial', sans-serif; /* Change font family */
      font-weight: bold; /* Make text bold */
      animation: bounce 1s ease infinite alternate; /* Bounce animation */
    }

    label, input {
      display: block;
      margin-bottom: 10px;
      width: 100%; /* Equal width for labels and input fields */
      font-weight: bold; /* Make fonts bold */
    }

    /* Style the form labels as black */
    label {
      color: #000; 
    }

    /* Style the submit button with animation */
    input[type="submit"] {
      background-color: #28A745; /* Green color */
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease; /* Smooth hover transition */
    }

    /* Change button color on hover to green */
    input[type="submit"]:hover {
      background-color: #007BFF; /* Blue color on hover */
    }

    /* Keyframes for animations */
    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }

    @keyframes bounce {
      from {
        transform: translateY(-10px);
      }
      to {
        transform: translateY(10px);
      }
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6 form-container">
        <h1 class="text-center">Login Form</h1>
        <form action="process_login.php" method="POST">
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          
          <div class="form-group">
            <label for="mobilenumber">Mobile Number:</label>
            <input type="text" class="form-control" id="mobilenumber" name="numb" required>
          </div>

          <div class="form-group">
            <label for="place">Place:</label>
            <input type="text" class="form-control" id="place" name="place" required>
          </div>

          <div class="form-group">
            <label for="occupation">Occupation:</label>
            <input type="text" class="form-control" id="occupation" name="occupation" required>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
          </div>
        </form>
        
        <!-- Container for displaying response -->
        <div id="response"></div>
      </div>
    </div>
  </div>

  <!-- Include Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Include SweetAlert2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <!-- Your custom jQuery script -->
  <script>
    $(document).ready(function() {
      // Intercept the form submission
      $("form").submit(function(event) {
        event.preventDefault();

        // Serialize the form data
        var formData = $(this).serialize();

        // Send an AJAX request to process_login.php
        $.ajax({
          type: "POST",
          url: "process_login.php", // Replace with your processing script URL
          data: formData,
          success: function() {
            // Display the success message using SweetAlert
            Swal.fire(
              'Success!',
              'Form submitted successfully!',
              'success'
            );

            // Hide the form
            $("#form-container").hide();
          },
          error: function(xhr, status, error) {
            console.log("Error: " + error);
          }
        });
      });
    });
  </script>
</body>
</html>
