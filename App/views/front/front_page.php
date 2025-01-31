<?php
    function limitCharacters($text, $charLimit) {
        return mb_strlen($text) > $charLimit ? mb_substr($text, 0, $charLimit) . "..." : $text;
    }
?>

<style>
    .card-title {
        min-height: 80px;
    }
</style>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h3><b>Latest Events</b></h3>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <?php foreach ($events as $event) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($event->event_title); ?></h5>

                            <p class="card-text text-justify">
                                <?= limitCharacters(strip_tags($event->event_description), 250); ?>
                            </p>

                            <p class="small text-muted mb-1">Posted by: <?= htmlspecialchars($event->first_name . ' ' . $event->last_name); ?></p>
                            <p class="small text-muted mb-1">Event Time: <?= date("D m, Y. h:s A", strtotime($event->event_date_time)) ?></p>
                            <p class="small text-danger">
                                Registration Ends In: 
                                <span class="countdown-timer" data-end-time="<?= $event->event_date_time; ?>"></span>
                            </p>

                            <a href="event_details.php?event_id=<?= $event->id; ?>" class="btn btn-primary btn-sm">View Details</a>
                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#eventRegistrationModal" onclick="eventRegistration('<?=$event->code;?>', '<?=$event->event_title;?>')">Book a seat</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <nav>
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <li class="page-item <?= ($i == $currentPage) ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>

    <?php include('components/event_registration_modal.php')?>
    
</div>
