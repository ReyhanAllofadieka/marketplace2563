
<footer class="bg-light text-center py-3 mt-5">
    <div class="">copyright &copy;2024.Amikom</div>
   </footer>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src= "https://cdn.datatables.net/2.0.2/js/dataTables.js"></script></script>
  <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
  <script>new DataTable('#tabelku')</script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <?php if ($this->session->flashdata('pesan_sukses')): ?>
  <script>swal("sukses!", "<?php echo $this->session->flashdata('pesan_suskes'); ?>", "success");</script>
  <?php endif; ?>

  <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
  <script>CKEDITOR.replace("editorku")</script>

</body>
 
</html>