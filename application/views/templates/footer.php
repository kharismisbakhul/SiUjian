<!-- Footer -->
<footer class="sticky-footer bg-white" style="margin-top: 6.5rem;">
    <div class=" container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; AKD <?= date('Y')  ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/')  ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/')  ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/')  ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>
<script src="<?= base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/js/myscript.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/') ?>js/demo/datatables-demo.js"></script>

<!-- Sweet alert custom -->
<script src="<?= base_url('assets/') ?>js/sweet-alert.js"></script>

<!-- Select2 -->
<script src="<?= base_url('assets/') ?>js/script.js"></script>

<!-- Memanggil Autocomplete.js -->
<script src="jquery.autocomplete.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        // Selector input yang akan menampilkan autocomplete.
        $("#dosenSearch").autocomplete({
            serviceUrl: "source.php", // Kode php untuk prosesing data.
            dataType: "JSON", // Tipe data JSON.
            onSelect: function(suggestion) {
                $("#buah").val("" + suggestion.nama);
            }
        });
    })
</script>

</body>

</html>