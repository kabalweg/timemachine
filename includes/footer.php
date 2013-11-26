      

      </div> <!-- END OF container -->
      <div id="sidebar">
        <ul>
          <?php if(isset($_SESSION['is_admin'])): ?>
              <li><a href="/?p=user">Users</a></li>
          <?php endif; ?>

          <li><a href="/?p=clockin">Clock In</a></li>
          <li><a href="/?p=clockout">Clock Out</a></li>
          <li><a href="/?p=report">Reports</a></li>
          <li><a href="/?p=about">About</a></li>
        </ul>
      </div>
      <div class="clear"></div>
    </div>

    <div id="footer">
      <div>Copyright &copy; <?php echo date('Y'); ?></div>
    </div>

  </body>
</html>