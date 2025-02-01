
<link rel="stylesheet" href="<?=URL?>public/assets/css/dataTables.bootstrap5.min.css">
<script src="<?=URL?>public/assets/js/datatable/jquery.dataTables.min.js"></script>
<script src="<?=URL?>public/assets/js/datatable/dataTables.bootstrap5.min.js"></script>

<style>
    .dataTables_wrapper .dataTables_filter input {
        margin-left: 0.5em;
        border-radius: 5px;
    }
</style>

<div class="mt-4">
    <h4 class="card-title mb-3 fw-bold">Attendee Registration List</h4>
    <table id="event-attendee-list-table" class="table table-striped table-bordered" style="width:100%">
        <thead class="table-dark">
            <tr>
                <th>Reg. Date</th>
                <th>Event Code</th>
                <th width="30%">Event Title</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function () {
        $('#event-attendee-list-table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "<?=Urls::attendeeListReport()?>",
            "columns": [
                { "data": "registration_date" },
                { "data": "event_code" },
                { "data": "event_title" },
                { "data": "full_name" },
                { "data": "email" },
                { "data": "phone_number" }
            ],
            "pageLength": 10,
            "scrollY": "400px",
            "ordering": true,
        });
    });
</script>