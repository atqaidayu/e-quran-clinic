<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Login</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for adjusting background image size -->
    <style>
        .image-container {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .image-container img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <!-- Image Container -->
            <div class="col-lg-6 d-none d-lg-block">
                <div class="image-container" style="width: 100%; height: auto;">
                    <img src="images/equranclinicbg.png" alt="eQuranClinic Image" class="img-fluid" style="width: 100%; height: auto;">
                </div>
            </div>
            <!-- Form Container -->
            <div class="col-lg-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back, Admin!</h1>
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    <form id="loginForm" class="user" >
                                        @csrf <!-- Add CSRF token -->
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                        </div>
                                        @error('email') <!-- Check if there are errors for the email field -->
                                            <div class="alert alert-danger">{{ $message }}</div> <!-- Display the error message -->
                                        @enderror
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        </div>
                                        <!-- You might want to add a Remember Me checkbox here if desired -->
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Wait for the DOM to be loaded
        document.addEventListener('DOMContentLoaded', function () {
            // Get the login form
            const loginForm = document.getElementById('loginForm');
            // Add submit event listener to the login form
            loginForm.addEventListener('submit', function (event) {
                // Prevent the default form submission
                event.preventDefault();
                // Get the email and password input values
                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;
                // Call the login function with email and password
                login(email, password);
            });
        });
        function login(email, password) {
            const data = {
                email: email,
                password: password
            };
            fetch('{{ route('login') }}', {
                method: 'POST', // Use the POST method
                headers: {
                    'Content-Type': 'application/json', // Set the content type to JSON
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include the CSRF token
                },
                body: JSON.stringify(data) // Convert the data object to a JSON string
            })
            .then(response => response.json())
            .then(response => {
                // Handle the response from the server
                console.log('Response:', response);
                if (response.admin && response.admin.hasOwnProperty('id')) {
                    console.log("Admin ID:", response.admin.id);
                    // Redirect to the dashboard page
                    window.location.href = "{{ route('dashboard') }}";
                } else {
                    document.querySelector('.alert.alert-danger.alert-dismissible.fade.show[role="alert2"]').style.display = 'block';
                }
            })
            .catch(error => {
                console.error('Error fetching data:', error);
                document.querySelector('.alert.alert-danger.alert-dismissible.fade.show[role="alert2"]').style.display = 'block';
            });
        }
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
