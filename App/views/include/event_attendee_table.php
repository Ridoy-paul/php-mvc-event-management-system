<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

<div class="shadow rounded border">
    <table id="my-example">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#my-example').dataTable({
            "bProcessing": true,
            "sAjaxSource": "<?=Urls::attendeeListReport()?>",
            "aoColumns": [
                {
                    mData: 'id'
                },
                {
                    mData: 'name'
                },
                {
                    mData: 'email'
                }
            ]
        });
    });
</script>