<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
        <div class="col-md-4 col-sm-12">
                <div class="authentication-wrapper authentication-basic container-p-y">
                    <div class="authentication-inner">
                        <div class="card px-sm-6 px-0">
                            <div class="card-body p-2">
                                <h3><b>Total Events</b></h3>
                                <h1><b><?=$total_events?></b></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="authentication-wrapper authentication-basic container-p-y">
                    <div class="authentication-inner">
                        <div class="card px-sm-6 px-0">
                            <div class="card-body p-2">
                                <h3><b>Total Active Events</b></h3>
                                <h1><b><?=$total_active_events?></b></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="authentication-wrapper authentication-basic container-p-y">
                    <div class="authentication-inner">
                        <div class="card px-sm-6 px-0">
                            <div class="card-body p-2">
                                <h3><b>Total InActive Events</b></h3>
                                <h1><b><?=$total_events - $total_active_events?></b></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12 col-sm-12 mx-auto">
                <div class="authentication-wrapper authentication-basic container-p-y">
                    <div class="authentication-inner">
                        <div class="card px-sm-6 px-0">
                            <div class="card-body p-2">
                                <?php include(__DIR__ . '/../include/event_attendee_table.php'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
