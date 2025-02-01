<div class="modal fade" id="eventRegistrationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="eventRegistrationModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <form id="eventRegistrationForm" class="mb-6" action="#">
    <input type="hidden" name="event_code" id="regEventCode">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="eventRegistrationModalLabel">Event Registration</h1>
        <button type="button" class="btn-close" id="evRegModalCloseBtn" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-6">
            <p><b>Event Title: </b><span id="regEventTitle"></span></p>
        </div>
        <div class="mb-6">
            <label for="ev_reg_full_name" class="form-label">Full Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="ev_reg_full_name" name="full_name" placeholder="Enter your Full Name" data-field-name="Full Name" autofocus="" value="<?=USER_INFO['first_name'] ?? ''?> <?=USER_INFO['last_name'] ?? ''?>" required>
        </div>
        
        <div class="mb-6">
            <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="ev_reg_email" name="email" placeholder="Enter your email" data-field-name="Email" value="<?=USER_INFO['email'] ?? ''?>" required>
        </div>
        <div class="mb-6">
            <label for="phone" class="form-label">Phone<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="ev_reg_phone" name="phone" placeholder="Enter your phone number" data-field-name="phone" value="<?=USER_INFO['phone'] ?? ''?>" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary mx-2" data-bs-dismiss="modal">Close</button>
        <button type="button" id="submitEventRegistration" class="btn btn-success">Submit Registration</button>
      </div>
    </div>
    </form>
  </div>
</div>

<script>
    $(document).ready(function () {
        $("#submitEventRegistration").click(function (e) {
            e.preventDefault();

            var hasError = validateForm("eventRegistrationForm");
            
            if (!hasError) {
                $.ajax({
                    url: "<?=Urls::eventRegistrationStore()?>",
                    type: "POST",
                    data: new FormData($("#eventRegistrationForm")[0]),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function() {
                        $('#submitEventRegistration').prop('disabled', true).text('Processing......');
                    },
                    success: function (response) {
                        var response = JSON.parse(response);
                        // console.log(response);
                        if (response.status == "success") {
                            successToast(response.message);
                            $('#evRegBtn-' + response.event_code).prop('disabled', true).text('Booked');
                            $('#eventRegistrationModal').modal('hide');
                        } else {
                            errorToast(response.message);
                            $('#submitEventRegistration').prop('disabled', false).text('Submit Registration');
                        }
                    },
                    error: function (xhr) {
                        errorToast("Something went wrong. Please try again.");
                        $('#submitEventRegistration').prop('disabled', false).text('Submit Registration');
                    }
                });
            }
        });
    });
</script>