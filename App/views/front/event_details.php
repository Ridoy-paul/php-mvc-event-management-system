<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row mt-3">
            <div class="col-md-8 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title fw-bold"><?= htmlspecialchars($event_info->event_title); ?></h3>
                        <div class="card-text text-justify">
                            <?= $event_info->event_description ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body">
                        <p class="small text-muted mb-1">Posted by: <?= htmlspecialchars($event_info->first_name . ' ' . $event_info->last_name); ?></p>
                        <p class="small text-muted mb-1">Event Time: <?= date("D m, Y. h:s A", strtotime($event_info->event_date_time)) ?></p>
                        <p class="small text-danger">
                            Registration Ends In: 
                            <span class="countdown-timer" data-end-time="<?= $event_info->event_date_time; ?>"></span>
                        </p>

                        <button type="button" class="btn btn-success btn-sm" id="evRegBtn-<?=$event_info->code;?>" data-bs-toggle="modal" data-bs-target="#eventRegistrationModal" onclick="eventRegistration('<?=$event_info->code;?>', '<?=$event_info->event_title;?>')">Book a seat</button>
                    </div>
                </div>
            </div>
        </div> 
    </div>

    <?php include('components/event_registration_modal.php')?>
</div>