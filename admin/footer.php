  </div>
  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="http://technostudy.co.in">School Managment System</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- Bootstrap -->
<script src="<?php echo $site_url;?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo $site_url;?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="<?php echo $site_url;?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $site_url;?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo $site_url;?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo $site_url;?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo $site_url;?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo $site_url;?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo $site_url;?>plugins/select2/js/select2.full.min.js"></script>

<script src="<?php echo $site_url;?>plugins/calendar/zabuto_calendar.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo $site_url;?>dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo $site_url;?>dist/js/demo.js"></script>

<script>
  (function(){
    var path = window.location.href;
    // console.log(path);
    $(".nav-link").each(function () {

      var href = $(this).attr('href');
      // console.log(href);
      if (path === decodeURIComponent(href)) 
      {
        $(this).addClass('active');
        var parent = $(this).closest('.has-treeview');
        parent.addClass('menu-open');
        $(parent).find('.nav-link').first().addClass('active');
        // console.log(parent);
      };
    });
  }());
</script>

<!-- Subject -->
<script>
jQuery(document).ready(function(){

  jQuery('#class_id').change(function(){
    // alert(jQuery(this).val());

    jQuery.ajax({
      url:'ajax.php',
      type : 'POST',
      data  : {'class_id':jQuery(this).val()},
      dataType : 'json',
      success: function(response){
        jQuery('#section_id').html(response.section_options); 
      }
    });
  });

  jQuery('.select-2-multi-select').select2({
      theme: 'bootstrap4'
    })
})
</script>
</body>
</html>