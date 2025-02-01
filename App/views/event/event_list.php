<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row justify-content-center">
            <div class="col-md-12 col-sm-12 mx-auto">
                <div class="d-flex justify-content-between mb-2">
                    <h4 class="mb-0">Event List</h4>
                    <a href="<?=Urls::eventCreate()?>" class="btn btn-info">Create Event</a>
                </div>

                <table class="table table-bordered">
                    <thead class="bg-dark text-light">
                        <tr>
                            <th>Code</th>
                            <th width="30%">Title</th>

                            <?php if ($userInfo->role == 'admin'): ?>
                                <th>User & Event Date-Time</th>
                            <?php else: ?>
                                <th>Date & Time</th>
                            <?php endif; ?>

                            <th>Capacity</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($eventList as $event): ?>
                        <tr>
                            <td><?= htmlspecialchars($event->code) ?></td>
                            <td><?= htmlspecialchars($event->event_title) ?></td>

                            <?php if($userInfo->role == 'admin'): ?>
                                <td>
                                    <?= htmlspecialchars($event->first_name . ' ' . $event->last_name) ?><br>
                                    <?= date('d M Y, h:i A', strtotime($event->event_date_time)) ?>
                                </td>
                            <?php else: ?>
                                <td><?= date('d M Y, h:i A', strtotime($event->event_date_time)) ?></td>
                            <?php endif; ?>

                            <td><?= htmlspecialchars($event->max_capacity) ?></td>
                            <td><?= $event->is_active ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>' ?></td>
                            <td>
                                <a href="<?=Urls::eventEdit($event->code)?>" class="btn btn-sm btn-primary">Edit</a>
                                <button type="button" onclick="onDeleteEvent('<?=$event->code?>')" class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <?php 
                            $queryParams = $_GET;
                            
                            if ($page > 1): 
                                $queryParams['page'] = $page - 1;
                            ?>
                                <li class="page-item">
                                    <a class="page-link" href="?<?= http_build_query($queryParams) ?>">Previous</a>
                                </li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $totalPages; $i++): 
                                $queryParams['page'] = $i;
                            ?>
                                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                    <a class="page-link" href="?<?= http_build_query($queryParams) ?>"><?= $i ?></a>
                                </li>
                            <?php endfor; ?>

                            <?php if ($page < $totalPages): 
                                $queryParams['page'] = $page + 1;
                            ?>
                            <li class="page-item">
                                <a class="page-link" href="?<?= http_build_query($queryParams) ?>">Next</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<style>
    th {
        color: #ffffff !important;
    }
    .page-link {
        border-radius: 5px !important;
    }
</style>

<script src="<?=URL?>public/assets/js/sweetalert.min.js"></script>
<script>
    function onDeleteEvent(code) {
        swal({
                title: "Are you want to delete?",
                text: "Once deleted, you will not be able to restore!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = "<?=Urls::eventDelete()?>/" + code;
                }
            });
    }
</script>
