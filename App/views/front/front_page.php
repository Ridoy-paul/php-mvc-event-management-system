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
                    <h3 class="d-none d-lg-block"><b>Latest Events</b></h3>
                    <div class="filter-and-sort">
                        <div class="filter-and-sort">
                            <form method="GET" class="d-flex">
                                <select name="user_id" class="form-select me-2" onchange="this.form.submit()">
                                    <option value="">Filter by All User</option>
                                    <?php foreach ($users as $user) : ?>
                                        <option value="<?= $user->id; ?>" <?= isset($_GET['user_id']) && $_GET['user_id'] == $user->id ? 'selected' : ''; ?>>
                                            <?= htmlspecialchars($user->first_name . ' ' . $user->last_name); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>

                                <select name="sort" class="form-select me-2" onchange="this.form.submit()">
                                    <option value="desc" <?= isset($_GET['sort']) && $_GET['sort'] === 'desc' ? 'selected' : ''; ?>>Sort by ID (DESC)</option>
                                    <option value="asc" <?= isset($_GET['sort']) && $_GET['sort'] === 'asc' ? 'selected' : ''; ?>>Sort by ID (ASC)</option>
                                </select>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <?php if(count($events) > 0): ?>
                <?php foreach($events as $event) : ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow">
                            <div class="card-body">
                                <h5 class="card-title"><?=$event->event_title;?></h5>

                                <p class="card-text text-justify">
                                    <?= limitCharacters(strip_tags($event->event_description), 250); ?>
                                </p>

                                <p class="small text-muted mb-1">Posted by: <?= $event->first_name . ' ' . $event->last_name; ?></p>
                                <p class="small text-muted mb-1">Event Time: <?= date("D m, Y. h:s A", strtotime($event->event_date_time)) ?></p>
                                <p class="small text-danger">
                                    Registration Ends In: 
                                    <span class="countdown-timer" data-end-time="<?= $event->event_date_time; ?>"></span>
                                </p>

                                <a href="<?=Urls::eventDetails($event->code)?>" class="btn btn-primary btn-sm">View Details</a>
                                <button type="button" class="btn btn-success btn-sm" id="evRegBtn-<?=$event->code;?>" data-bs-toggle="modal" data-bs-target="#eventRegistrationModal" onclick="eventRegistration('<?=$event->code;?>', '<?=$event->event_title;?>')">Book a seat</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-md-12 text-center">
                    <h2 class="text-info fw-bold mt-5">No events found!</h2>
                </div>
            <?php endif; ?>
        </div>

        <nav>
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <li class="page-item <?= ($i == $currentPage) ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?= $i; ?>&sort=<?= $sort; ?>&user_id=<?= htmlspecialchars($userIdFilter); ?>">
                            <?= $i; ?>
                        </a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>

    </div>

    <?php include('components/event_registration_modal.php')?>
    
</div>
