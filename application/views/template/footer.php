</main>

<!--   Core JS Files   -->
<script src="<?= base_url('assets') ?>/datatabel/jquery.js"></script>
<script src="<?= base_url('assets') ?>/assets/js/core/popper.min.js"></script>
<script src="<?= base_url('assets') ?>/assets/js/core/bootstrap.min.js"></script>
<script src="<?= base_url('assets') ?>/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="<?= base_url('assets') ?>/assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="<?= base_url('assets') ?>/assets/js/plugins/chartjs.min.js"></script>
<script src="<?= base_url('assets') ?>/datatabel/datatabel.min.js"></script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?= base_url('assets') ?>/assets/js/material-dashboard.min.js?v=3.1.0"></script>
<script>
    new DataTable('#myTable', {
        buttons: [
            'csv', 'excel', 'print'
        ],
    });
</script>
</body>

</html>