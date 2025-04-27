<?php
 require_once('include/Session.php');
require_once('include/Functions.php');
require_once('include/Crud.php');
require_once("include/Controller.php");

$Controller = new Controller();

$churches = $Controller->getChurches();
// Trigger the modal if not logged in
if (!confirm_login()) {
    echo "
    <script>
        window.onload = function() {
            var loginModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
            loginModal.show();
        };
    </script>";
}

// var_dump($churches);
// die();
?>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Register / Login</h1>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <!-- Nav Tabs -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <!-- Make Login tab active by default -->
                        <a class="nav-link active" id="login-tab" data-bs-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="register-tab" data-bs-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                    </li>
                </ul>
                <div class="tab-content mt-3" id="myTabContent">
                    <!-- Login Form (this should be active by default) -->
                    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                        <form id="loginForm" class="row g-3 needs-validation" action="auth.php" novalidate method="post">
                        <input type="hidden" name="action" value="login">
                            <div class="col-md-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" id="email" required>
                                <div class="invalid-feedback">Please provide your email.</div>
                            </div>
                            
                            <div class="col-12">
                                <button class="btn" type="submit" style="background-color: #FE6035; color: white;">Login</button>
                            </div>
                        </form>
                    </div>

                    <!-- Register Form -->
                    <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                        <form id="registerForm" class="row g-3 needs-validation" action="auth.php" novalidate method="post">
                        <input type="hidden" name="action" value="register">
                            <div class="col-md-12">
                                <label for="validationCustom01" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="validationCustom01" required>
                                <div class="invalid-feedback">Please provide a title.</div>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom01" class="form-label">First name</label>
                                <input type="text" name="first_name" class="form-control" id="validationCustom01" required>
                                <div class="invalid-feedback">Please provide a name.</div>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom02" class="form-label">Last name</label>
                                <input type="text" name="last_name" class="form-control" id="validationCustom02" required>
                                <div class="invalid-feedback">Please provide a name.</div>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" id="validationCustom03" required>
                                <div class="invalid-feedback">Please provide a valid city.</div>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom03" class="form-label">Phone No.</label>
                                <input type="text" name="phone" class="form-control" id="validationCustom03" required>
                                <div class="invalid-feedback">Please provide a valid phone number.</div>
                                <div class="valid-feedback">Looks good!</div>
                            </div>

                            <div class="col-md-12">
                                <label for="validationCustom04" class="form-label">Church</label>
                                <select class="form-select" name="church_id" id="validationCustom04" required>
                                    <option selected disabled value="">Choose...</option>
                                    <?php foreach( $churches as $church) {?>
                                    <option value="<?=$church['id']?>"><?=$church['name']?></option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">Please select a valid Church.</div>
                                <div class="valid-feedback">Looks good!</div>

                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom05" class="form-label">Cell</label>
                                <input type="text" name="cell" class="form-control" id="validationCustom05" required>
                                <div class="invalid-feedback">Please provide a valid cell.</div>
                                <div class="valid-feedback">Looks good!</div>

                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                    <label class="form-check-label" for="invalidCheck">Agree to terms and conditions</label>
                                    <div class="invalid-feedback">You must agree before submitting.</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn" type="submit" style="background-color: #FE6035; color: white;">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    // Function to handle form submission
    function handleFormSubmission(formId, action) {
        document.getElementById(formId).addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent default form submission

            const formData = new FormData(this);
            formData.append('action', action);

            fetch('auth.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                // Check if the response is JSON
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json(); // Parse the JSON data
            })
            .then(data => {
                if (data.status === 'success') {
                    Swal.fire({
                        title: action === 'register' ? 'Registration Successful!' : 'Welcome!',
                        text: data.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        // Reload the page
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: data.message,
                        icon: 'error',
                        confirmButtonText: 'Try Again'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    title: 'Error!',
                    text: 'Something went wrong. Please try again later.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
        });
    }

    // Register Form Submission
    handleFormSubmission('registerForm', 'register');

    // Login Form Submission
    handleFormSubmission('loginForm', 'login');
</script>
