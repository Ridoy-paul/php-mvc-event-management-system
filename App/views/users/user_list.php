<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12 col-sm-12 mx-auto">
                <div class="authentication-wrapper authentication-basic container-p-y">
                    <div class="authentication-inner">
                        <div class="card px-sm-6 px-0">
                            <div class="card-body p-2">
                                <?php if(!empty($users)) : ?>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Status</th>
                                                <th>Total Events</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($users as $user) : ?>
                                                <tr>
                                                    <td><?= htmlspecialchars($user->id) ?></td>
                                                    <td><?= htmlspecialchars($user->first_name . ' ' . $user->last_name) ?></td>
                                                    <td><?= htmlspecialchars($user->email) ?></td>
                                                    <td><?= htmlspecialchars($user->phone) ?></td>
                                                    <td>
                                                        <?php if ($user->is_active) : ?>
                                                            <span class="badge bg-success">Active</span>
                                                        <?php else : ?>
                                                            <span class="badge bg-danger">Inactive</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?= htmlspecialchars($user->total_events) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                <?php else : ?>
                                    <p class="text-center text-muted">No users found.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
