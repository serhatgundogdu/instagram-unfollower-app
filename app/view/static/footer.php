			</div>
		</div>
        <!-- /.container-fluid -->

	</div>
 <!-- Footer -->
 <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; <a href="https://serhatgndg.xyz">Serhat Gundogdu</a> </span>
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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Gerçekten bunu yapmak istiyor musun?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">İptal</button>
          <a class="btn btn-primary" href="<?=site_url('logout')?>">Çıkış Yap</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=public_url('vendor/jquery/jquery.min.js')?>"></script>
  <script src="<?=public_url('vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=public_url('vendor/jquery-easing/jquery.easing.min.js')?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=public_url('js/sb-admin-2.min.js')?>"></script>

  <script src="<?=public_url('vendor/datatables/jquery.dataTables.min.js')?>"></script>
  <script src="<?=public_url('vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>

</body>

</html>
<script>const api_url ="<?=site_url('api')?>";</script>
<script>const SITE_URL = "<?=site_url('')?>";</script>
<script src="<?=public_url('js/nprogress.js')?>"></script>
<script src="<?=public_url('js/request.js')?>"></script>	
</body>

	<!-- end::Body -->
</html>

