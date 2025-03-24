</div>
</div>
</div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.dataTables').dataTable({
            "aLengthMenu": [
                [25, 50, 75, -1],
                [25, 50, 75, "All"]
            ],
            "iDisplayLength": 25
        });
    });
</script>

<script type="text/javascript">
    function download_to_excel() {

        var tab_text = "<table><tr>";
        var textRange = '';
        var j = 0;
        var tab = document.getElementById('dataTable'); // id of table

        for (j = 0; j < tab.rows.length; j++) {
            tab_text += tab.rows[j].innerHTML + "</tr>";
        }

        tab_text += "</table>";

        var a = document.createElement('a');
        var data_type = 'data:application/vnd.ms-excel';
        a.href = data_type + ', ' + encodeURIComponent(tab_text);
        //setting the file name
        a.download = 'UserData.xls';
        //triggering the function
        a.click();
        //just in case, prevent default behaviour
        e.preventDefault();

    }
</script>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="./vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>
<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
<script src="js/demo/chart-bar-demo.js"></script>
</body>

</html>