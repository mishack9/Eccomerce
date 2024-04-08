<script src = "./js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="js/scripts.js"></script>
     
      
        <script src = "./js/custom.js"></script>

        <!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
    <?php
    if(isset($_SESSION['message'])){
    ?>
    alertify.set('notifier','position', 'top-right');
 alertify.success('<?= $_SESSION['message'] ?>');
 <?php
 unset($_SESSION['message']);
    }
    ?>
</script>
    </body>
</html>
