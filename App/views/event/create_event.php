<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-8">
                <div class="authentication-wrapper authentication-basic rounded">
                    <div class="authentication-inner">
                        <div class="card px-sm-6 px-0">
                            <div class="card-body">
                                <div class="app-brand justify-content-left">
                                    <a href="#" class="app-brand-link gap-2 mb-3">
                                        <span class="app-brand-text demo text-heading fw-bold">Create New Event</span>
                                    </a>
                                </div>

                                <form id="registerForm" class="mb-6" action="<?= Urls::authRegisterStore() ?>" method="POST">
                                    <div class="row">
                                        <div class="col-md-12 mt-3">
                                            <div class="mb-6">
                                                <label for="event_title" class="form-label">Event Title<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="event_title" name="event_title" data-field-name="Event Title" placeholder="Enter Event Title" autofocus="" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-6">
                                        <label for="email" class="form-label">Event Descriptions<span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" data-field-name="Email" required>
                                    </div>

                                    

                                    <div class="mb-6">
                                        <button class="btn btn-primary d-grid w-100" id="submitForm" type="button">Register</button>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="authentication-wrapper authentication-basic rounded">
                    <div class="authentication-inner">
                        <div class="card px-sm-6 px-0">
                            <div class="card-body">
                                <div class="mb-4">
                                    <label for="email" class="form-label">Event Date<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" data-field-name="Email" required>
                                </div>

                                <div class="mb-4">
                                    <label for="max_capacity" class="form-label">Maximum Capacity<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="max_capacity" name="max_capacity" placeholder="Ex. 50" data-field-name="Maximum Capacity" required>
                                </div>

                                <div class="mb-4">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="is_active" id="active" value="1">
                                        <label class="form-check-label" for="active">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_active" id="inactive" value="0">
                                        <label class="form-check-label" for="inactive">Inactive</label>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="guest_registration_status" class="form-label">Guest Registration Status<span class="text-danger">*</span></label>
                                    <select name="guest_registration_status" class="form-select" aria-label="guest_registration_status">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="thumbnail" class="form-label">Thumbnail</label>
                                    <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $("#submitForm").click(function (e) {
            e.preventDefault();

            var hasError = validateForm("registerForm");
            
            if (!hasError) {
                $.ajax({
                    url: "<?= Urls::authRegisterStore() ?>",
                    type: "POST",
                    data: $("#registerForm").serialize(),
                    dataType: "json",
                    beforeSend: function() {
                        $('#submitForm').prop('disabled', true).text('Processing......');
                    },
                    success: function (response) {
                        if (response.status === "success") {
                            successToast('Registration successful!');
                            window.location.href = response.redirect;
                        } else {
                            errorToast(response.message);
                            $('#submitForm').prop('disabled', false).text('Register');
                        }
                    },
                    error: function (xhr) {
                        errorToast("Something went wrong. Please try again.");
                        $('#submitForm').prop('disabled', false).text('Register');
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });

</script>


