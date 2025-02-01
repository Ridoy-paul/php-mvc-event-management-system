<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

<style>
    .ck-editor__editable {
        min-height: 250px;
    }
</style>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <form id="eventForm" class="mb-6" action="<?= Urls::eventSave() ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="code" value="<?=$data['code'] ?? '';?>">
        <div class="row">
            <div class="col-md-8">
                <div class="authentication-wrapper authentication-basic rounded">
                    <div class="authentication-inner">
                        <div class="card px-sm-6 px-0">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12 mt-3">
                                        <div class="mb-6">
                                            <label for="event_title" class="form-label">Event Title<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="event_title" name="event_title" data-field-name="Event Title" placeholder="Enter Event Title" value="<?=$data['event_title'] ?? '';?>" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-6">
                                    <label for="email" class="form-label">Event Descriptions<span class="text-danger">*</span></label>
                                    <div id="editor"><?=$data['event_description'] ?? '';?></div>
                                    <input type="hidden" name="event_description" value="<?=$data['event_description'] ?? '';?>" id="event_description">
                                </div>

                                <div class="mb-6">
                                    <button class="btn btn-success d-grid w-100" id="submitForm" type="button">Save Event</button>
                                </div>
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
                                <div class="mb-6">
                                    <label for="event_date_time" class="form-label">Event Date<span class="text-danger">*</span></label>
                                    <input type="datetime-local" class="form-control" id="event_date_time" name="event_date_time" data-field-name="Event Date Time" value="<?=$data['event_date_time'] ?? '';?>" required>
                                </div>

                                <div class="mb-6">
                                    <label for="max_capacity" class="form-label">Maximum Capacity<span class="text-danger">*</span></label>
                                    <input type="number" min="1" class="form-control" id="max_capacity" name="max_capacity" placeholder="Ex. 50" data-field-name="Maximum Capacity" value="<?=$data['max_capacity'] ?? '';?>" required>
                                </div>

                                <div class="mb-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" <?php echo ($data['is_active'] ?? 1) == 1 ? 'checked' : '';?> type="radio" name="is_active" id="active" value="1">
                                        <label class="form-check-label" for="active">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_active" <?php echo ($data['is_active'] ?? '') == 0 ? 'checked' : '';?> id="inactive" value="0">
                                        <label class="form-check-label" for="inactive">Inactive</label>
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label for="guest_registration_status" class="form-label">Guest Registration Status<span class="text-danger">*</span></label>
                                    <select name="guest_registration_status" class="form-select" aria-label="guest_registration_status">
                                        <option <?php echo ($data['is_active'] ?? 1) == 1 ? 'selected' : '';?> value="1">Yes</option>
                                        <option <?php echo ($data['is_active'] ?? '') == 0 ? 'selected' : '';?> value="0">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

<script>
    $(document).ready(function () {

        $("#submitForm").click(function (e) {
            e.preventDefault();

            $("#event_description").val($(".ck-editor__editable").html());

            var hasError = validateForm("eventForm");
            
            if (!hasError) {
                $.ajax({
                    url: "<?=Urls::eventSave() ?>",
                    type: "POST",
                    data: new FormData($("#eventForm")[0]),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function() {
                        $('#submitForm').prop('disabled', true).text('Processing......');
                    },
                    success: function (response) {
                        var response = JSON.parse(response);
                        // console.log(response);
                        if (response.status == "success") {
                            successToast('Event Saved.');
                            window.location.href = response.redirect;
                        } else {
                            errorToast(response.message);
                            $('#submitForm').prop('disabled', false).text('Save Event');
                        }
                    },
                    error: function (xhr) {
                        errorToast("Something went wrong. Please try again.");
                        $('#submitForm').prop('disabled', false).text('Save Event');
                        //console.error(xhr.responseText);
                    }
                });
            }
        });
    });

    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error( error );
        });
</script>


