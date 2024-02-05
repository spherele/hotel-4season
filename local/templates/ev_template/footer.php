<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
  die(); ?>
<!-- Footer -->
<footer class="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <? $APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            array(
              "AREA_FILE_SHOW" => "file",
              "AREA_FILE_SUFFIX" => "inc",
              "EDIT_TEMPLATE" => "",
              "PATH" => "/sections/sect_footer_content_left.php"
            )
          ); ?>
        </div>
        <div class="col-md-3 offset-md-1">
          <div class="footer-column footer-explore clearfix">
            <ul class="footer-explore-list list-unstyled">
              <?php
              $APPLICATION->IncludeComponent(
                "bitrix:menu",
                "ev_bottom",
                array(
                  "ALLOW_MULTI_SELECT" => "N",
                  "CHILD_MENU_TYPE" => "left",
                  "DELAY" => "N",
                  "MAX_LEVEL" => "1",
                  "MENU_CACHE_GET_VARS" => array(""),
                  "MENU_CACHE_TIME" => "3600",
                  "MENU_CACHE_TYPE" => "N",
                  "MENU_CACHE_USE_GROUPS" => "Y",
                  "ROOT_MENU_TYPE" => "bottom",
                  "USE_EXT" => "N"
                )
              );
              ?>
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <? $APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            array(
              "AREA_FILE_SHOW" => "file",
              "AREA_FILE_SUFFIX" => "inc",
              "EDIT_TEMPLATE" => "",
              "PATH" => "/sections/sect_footer_content_right.php"
            )
          );
          ?>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- jQuery -->
<script src="<?= SITE_TEMPLATE_PATH ?>/js/jquery-3.6.3.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/jquery-migrate-3.0.0.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/modernizr-2.6.2.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/imagesloaded.pkgd.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/jquery.isotope.v3.0.2.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/pace.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/popper.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/bootstrap.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/scrollIt.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/jquery.waypoints.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/owl.carousel.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/jquery.stellar.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/jquery.magnific-popup.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/YouTubePopUp.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/select2.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/datepicker.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/smooth-scroll.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/custom.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/custom2.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/swiper-bundle.min.js"></script>
</body>
</html>
