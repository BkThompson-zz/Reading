<?php
// $Id: page.tpl.php,v 1.11.2.1 2009/04/30 00:13:31 goba Exp $

/**
 * @file page.tpl.php
 *
 * Theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $css: An array of CSS files for the current page.
 * - $directory: The directory the theme is located in, e.g. themes/garland or
 *   themes/garland/minelli.
 * - $is_front: TRUE if the current page is the front page. Used to toggle the mission statement.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Page metadata:
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $head_title: A modified version of the page title, for use in the TITLE tag.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $body_classes: A set of CSS classes for the BODY tag. This contains flags
 *   indicating the current layout (multiple columns, single column), the current
 *   path, whether the user is logged in, and so on.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $mission: The text of the site mission, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $search_box: HTML to display the search box, empty if search has been disabled.
 * - $primary_links (array): An array containing primary navigation links for the
 *   site, if they have been configured.
 * - $secondary_links (array): An array containing secondary navigation links for
 *   the site, if they have been configured.
 *
 * Page content (in order of occurrance in the default page.tpl.php):
 * - $left: The HTML for the left sidebar.
 *
 * - $breadcrumb: The breadcrumb trail for the current page.
 * - $title: The page title, for use in the actual HTML content.
 * - $help: Dynamic help text, mostly for admin pages.
 * - $messages: HTML for status and error messages. Should be displayed prominently.
 * - $tabs: Tabs linking to any sub-pages beneath the current page (e.g., the view
 *   and edit tabs when displaying a node).
 *
 * - $content: The main content of the current Drupal page.
 *
 * - $right: The HTML for the right sidebar.
 *
 * Footer/closing data:
 * - $feed_icons: A string of all feed icons for the current page.
 * - $footer_message: The footer message as defined in the admin settings.
 * - $footer : The footer region.
 * - $closure: Final closing markup from any modules that have altered the page.
 *   This variable should always be output last, after all other dynamic content.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 *
 * Updates:
 * 03/25/2014 - Updated BW Tag links to direct to correct URLS (JD)
 * 03/13/2014 - Added Breadcrumb code after Chrome (MD)
 *            - added legal verbiage from Business Wire afte head (JD)
 * 03/11/2014 - added HTML5SHIV.JS call (Requires JS/HTML5SHIV.JS now in Quash)
 * 03/08/2014 - added BW Tags for NewsHQ and InvestorHQ (MD)
 * 03/04/2014 - added IE9 identity crisis fix after Krispy Kreme issues
 * 03/03/2014 - added comments for client javascript inclusions based on bootstrap requirements
 *            - added optional ie9.css call
 * 
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">

<head>
  
  <!-- // IE9 IDENTITY CRISIS FIX -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  

  <!-- // Viewport scaling -->
  <!-- // commmented out, not all options may be required for every client style. 
       // Use client's code 
      <meta name="viewport" content="user-scalable=yes, width=device-width, height=device-height, initial-scale=1.0" />
      <style>
        /* this set up is for zoomable contents starting at the device width */
        -ms-@viewport {
            width: device-width; /* ###px */
            initial-scale: 1;
            /* options
            height: device-height;
            zoom: 1;
            min-zoom: 1;
            max-zoom: 3; */
            user-zoom: zoom; /* fixed */
        }
        @viewport {
            width: device-width; /* ###px */
            initial-scale: 1;
            /* options
            height: device-height | ###px;
            orientation: auto | portrait | landscape;
            zoom: #;
            min-zoom: #;
            max-zoom: #; */
            user-zoom: zoom; /* fixed */
        }
      </style>
end Viewport scaling -->

  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  
  <?php 
      $theme_path = $base_path . $directory . "/"; 
  ?>

  
  <!-- google webfont font replacement -->
  <link rel='stylesheet' id='google_font_490ee25e-css'  href='//fonts.googleapis.com/css?family=Open+Sans:300&subset=latin%2Clatin-ext' type='text/css' media='all' />
  <link rel='stylesheet' id='google_font_7b2b4c23-css'  href='//fonts.googleapis.com/css?family=Open+Sans&subset=latin%2Clatin-ext' type='text/css' media='all' />
  <link rel="stylesheet" type="text/css" href="<?php print $theme_path; ?>client_files/css/font-awesome.min.css" media="screen" /> 
<link rel="stylesheet" type="text/css" href="<?php print $theme_path; ?>client_files/css/g1-gmaps.css"/>
<link rel="stylesheet" type="text/css" href="<?php print $theme_path; ?>client_files/css/main.css"/>
<link rel="stylesheet" type="text/css" href="<?php print $theme_path; ?>client_files/css/settings.css"/>
<link rel="stylesheet" type="text/css" href="<?php print $theme_path; ?>client_files/css/g1-screen.css" />
<link rel="stylesheet" type="text/css" href="<?php print $theme_path; ?>client_files/css/g1-dynamic-style.css" />
<link rel="stylesheet" type="text/css" href="<?php print $theme_path; ?>client_files/css/galleria.classic.css" />

  
  <?php print $external_styles; ?>
  <?php print $styles; ?>
  
  <?php print $scripts; ?>

  <?php print $external_scripts; ?>
 

  <?php
  if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on')) {
    print $https_only_external_scripts;
  }
  else {
    print $http_only_external_scripts;
  }
  ?>

  <?php print $conditional_overrides; ?>

  <?php print $sharing_head; ?>
  

  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyled Content in IE */ ?> </script>


<!-- Script that removes numbers from rotating content pager -->
  <script>

    $(document).ready(function() {

      $(".rotating-content-pager a").each(function() {

        if($(this).text() == "1", "2")
            $(this).text("");

      });
    });

  </script>

</head>
<body class="<?php print $body_classes; ?>">
  
  <div id="page"> <!-- was #bw-wrap -->
    <!-- User Navigation -->
    <?php if ($user_nav) : ?>
       <div id="bw-fixed-user-nav"><div><?php print $user_nav; ?></div></div>
    <?php endif; ?>
    <!-- /Begin opening site chrome -->

    <!-- BEGIN #g1-header -->
    <div id="g1-top" class="test321">
      <div id="g1-header-waypoint">
        <div id="g1-header" class="g1-header" role="banner">
          <div class="g1-layout-inner">
              
              <div id="g1-primary-bar">
                  <div id="g1-id">
                    <h1 class="site-title">
                      <a href="http://dev.readingrdi.com/corporate">
                        <img id="g1-logo" src="<?php print $theme_path; ?>client_files/images/logo.png" alt="Reading International" data-g1-src-desktop="http://dev.readingrdi.com/corporate/wp-content/uploads/2015/05/logo.png" data-g1-src-desktop-hdpi="http://dev.readingrdi.com/corporate/wp-content/uploads/2015/05/logo.png" />
                        <noscript>
                          <img src="<?php print $theme_path; ?>client_files/images/logo.png" alt="Reading International" />
                        </noscript><img id="g1-mobile-logo" src="<?php print $theme_path; ?>client_files/images/logo.png" alt="Reading International" data-g1-src-mobile="http://dev.readingrdi.com/corporate/wp-content/uploads/2015/05/logo.png" data-g1-src-mobile-hdpi="http://dev.readingrdi.com/corporate/wp-content/uploads/2015/05/logo.png" /></a>
                    </h1>
                  </div><!-- #id -->
                  
                    <!-- BEGIN #g1-primary-nav -->
                    <div class="left-header">
                      <nav id="g1-secondary-nav">
                        <a id="g1-secondary-nav-switch" href="#"></a>
                          <ul id="g1-secondary-nav-menu" class="">
                            <li id="menu-item-5447" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5447"><a href="http://52.1.229.232/bw_corporate/?page_id=2227">About Us</a></li>
                            <li id="menu-item-5448" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5448"><a href="http://52.1.229.232/bw_corporate/?page_id=2425">Investor Relations</a></li>
                            <li id="menu-item-5450" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5450"><a href="http://52.1.229.232/bw_corporate/?page_id=202">Press Releases</a></li>
                            <li id="menu-item-5635" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5635"><a href="http://52.1.229.232/bw_corporate/?page_id=5555">Contact Us</a></li>
                          </ul>                
                      </nav>

                      <div class="top-search">
                        <form method="get" id="searchform" action="http://dev.readingrdi.com/corporate/">
                          <div>
                            <input type="text" size="put_a_size_here" name="s" id="s" value="" placeholder="Search this site" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
                            <input type="submit" id="searchsubmit" value="Search" class="btn" />
                          </div>
                        </form>
                      </div>

                      <nav id="g1-primary-nav" class="g1-nav--unstyled g1-nav--collapsed">
                        <a id="g1-primary-nav-switch" href="#">Menu</a>
                        <ul id="g1-primary-nav-menu" class="">
                          <li id="menu-item-5430" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-5430 g1-menu-item-level-0 g1-type-drops"><a href="http://52.1.229.232/bw_corporate/"><div class="g1-nav-item__title">Home</div></a></li>
                          <li id="menu-item-5431" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5431 g1-menu-item-level-0 g1-type-drops"><a href="http://52.1.229.232/bw_corporate/?page_id=3541"><div class="g1-nav-item__title">Cinema Operations</div></a></li>
                          <li id="menu-item-5434" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5434 g1-menu-item-level-0 g1-type-drops"><a href="http://52.1.229.232/bw_corporate/?page_id=814"><div class="g1-nav-item__title">Real Estate Holdings</div></a></li>
                          <li id="menu-item-5433" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5433 g1-menu-item-level-0 g1-type-drops"><a href="http://52.1.229.232/bw_corporate/?page_id=3543"><div class="g1-nav-item__title">Live Theatre Operations</div></a></li>
                          <li id="menu-item-5432" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5432 g1-menu-item-level-0 g1-type-drops"><a href="http://52.1.229.232/bw_corporate/?page_id=3542"><div class="g1-nav-item__title">Reading Properties</div></a></li>
                        </ul>                       
                      </nav>
                    </div>
                  <!-- END #g1-primary-nav -->
              </div><!-- END #g1-primary-bar -->  
          </div>

          <div class="g1-background"></div>
        </div> <!-- END #g1-header -->
      </div> <!-- END #g1-header-waypoint -->
    </div> <!-- END #g1-top --> 

    <!-- /End opening site chrome -->


    <!-- BEGIN .g1-layout-inner -->
    <div class="g1-layout-inner">

      <!-- BW: breadcrumb --> 
      <?php if ($breadcrumb): ?> 
        <?php print $breadcrumb; ?> 
      <?php endif; ?>
      <!-- BW: End breadcrumb -->
      <div class="general-wrapper-about-section-one">

        <?php if ($title && !isset($node)): ?>
          <h1 class="about-title"><?php print $title; ?></h1>
        <?php elseif ($title && isset($node)): ?>
          <h1 class="about-title">Investors</h1>  
        <?php endif; ?>

        <div class="nav-about-us">

          <?php 
            $primary_links_full_tree = menu_tree_page_data('primary-links');
            if (isset($primary_links_full_tree)) { 
              print readingrdi_theme_custom_primary_links($primary_links_full_tree); 
            } else {
              print theme('links', $primary_links, array('class' =>'nav', 'id' => 'bw-primary-links'));
            } 
          ?>
        </div>

      </div>

      <?php if ($header): ?>
        <div id="bw-content-header" class="clear-block">
          <?php print $header; ?>
        </div>
      <?php endif; ?>

      <?php if (isset($secondary_links)) { ?>
        <?php print theme('links', $secondary_links, array('class' =>'links', 'id' => 'bw-secondary-links')) ?>
      <?php } ?>


      <div id="bw-content" class="clear-block">
        
        <?php if ($left): ?> 
          <div id="bw-sidebar-left" class="bw-sidebar"> 
            <div class="bw-inner"> 
              <?php print $left; ?> 
            </div> 
          </div> <!-- /#bw-sidebar-left-->
        <?php endif; ?>
        
        <div id="bw-content-content">

          <?php if ($title && isset($node)): ?>
            <h1 class="content-title">
              <?php print $title; ?>
            </h1>
          <?php endif; ?>

            <!-- Do no strip this code -->          
            <?php if ($tabs): ?>
              <div id="bw-tabs">
                <?php print $tabs; ?>
              </div>
            <?php endif; ?>
            <?php print $messages; ?>
            <?php print $help; ?>

          
          <?php print $content ;?>
          
          <?php print $workflow_links; ?>
          <!--  END: Do no strip this code -->      

        </div>

        <?php if ($right): ?> 
          <div id="bw-sidebar-right" class="bw-sidebar"> 
            <div class="bw-inner"> 
              <?php print $right; ?> 
            </div> 
          </div> <!-- /#bw-sidebar-right -->
        <?php endif; ?>

      </div><!-- /#bw-content -->

    </div> <!-- END .g1-layout-inner -->

    <!-- /Begin closing site chrome -->
    <div class="footer-wrap2">  
      <div class="hfeed footer-menu">
        <div class="menus-footer">

          <div class="menu-footer menu-footer1">
            <div class="menu-footer-title"><a href="javascript:void(0);">About US</a></div>
              <ul> 
                <li><a href="http://52.1.229.232/bw_corporate/?page_id=2227">Overview</a></li>
                <li><a href="http://52.1.229.232/bw_corporate/?page_id=5512">Our Story</a></li>
                <!--<li><a href="http://dev.readingrdi.com/corporate/?page_id=4">Employment</a></li>-->
                <li><a href="http://52.1.229.232/bw_corporate/?page_id=5539">Our Businesses</a></li>
                <!--li><a href="http://dev.readingrdi.com/corporate/?page_id=540">Sitemap</a></li-->
              </ul>
    
            <div class="menu-footer-title"><a href="javascript:void(0);">Our Businesses</a></div>
              <ul>
                <li><a href="http://52.1.229.232/bw_corporate/?page_id=64">Our Cinemas</a></li>
                <li><a href="http://52.1.229.232/bw_corporate/?page_id=91">Our Real Estate</a></li>
                <li><a href="http://52.1.229.232/bw_corporate/?page_id=81">Our Live Theatres</a></li>
                <li><a href="http://52.1.229.232/bw_corporate/?page_id=99">Our Restaurants</a></li>
              </ul>
          </div>
  
            <div class="menu-footer menu-footer2">
              <div class="menu-footer-title"><a href="javascript:void(0);">Investor Relations</a></div>
                <ul>
                  <li><a href="http://52.1.229.232/bw_corporate/?page_id=814">Board of Directors</a></li>
                  <li><a href="http://52.1.229.232/bw_corporate/?page_id=1099">Executive Management</a></li>
                  <li><a href="http://52.1.229.232/bw_corporate/?page_id=1129">Committees</a></li>
                  <li><a href="http://52.1.229.232/bw_corporate/?page_id=809">Policies & Guidelines</a></li>
                  <li><a href="http://52.1.229.232/bw_corporate/?page_id=253">Corporate News</a></li>
                  <li><a href="http://52.1.229.232/bw_corporate/?page_id=202">Financial News</a></li>
                  <li><a href="http://52.1.229.232/bw_corporate/?page_id=478">Real Estate News</a></li>
                  <li><a href="http://52.1.229.232/bw_corporate/?post_type=tribe_events&eventDisplay=upcoming">Events</a></li>
                  <li><a href="http://52.1.229.232/bw_corporate/?page_id=253">Promotions</a></li>
                  <li><a href="http://52.1.229.232/bw_corporate/?page_id=202">SEC Filings</a></li>
                  <li><a href="http://52.1.229.232/bw_corporate/?page_id=478">Stock Information</a></li>
                  <li><a href="http://52.1.229.232/bw_corporate/?page_id=785">Email Alerts</a></li>
                  <li><a href="">Event Calendar</a></li>
                </ul>
            </div>

            <div class="menu-footer  menu-footer3">
              <div class="menu-footer-title"><a href="javascript:void(0);">Our Brands</a></div>
                <ul>
                  <li><a target="_blank" href="http://readingcinemas.com.au/">Reading Cinemas-AU</a></li>
                  <li><a target="_blank" href="http://readingcinemas.co.nz/">Reading Cinemas-NZ</a></li>
                  <li><a target="_blank" href="http://www.readingcinemasus.com/">Reading Cinemas-US</a></li>
                  <li><a target="_blank" href="http://www.angelikafilmcenter.com/">Angelika Film Centers</a></li>
                  <li><a target="_blank" href="http://www.consolidatedtheatres.com/cinema/content/home.asp">Consolidated Theatres</a></li>
                  <li><a target="_blank" href="http://www.theparistheatre.com/">The Paris Theatre</a></li>
                  <li><a target="_blank" href="http://www.beekmantheatre.com/">Beekman Theatre</a></li>
                  <li><a target="_blank" href="http://www.villageeastcinema.com/">Village East Cinema</a></li>
                  <li><a target="_blank" href="http://www.libertytheatresusa.com/">Liberty Theatres</a></li>
                  <li><a target="_blank" href="http://www.steernbeer.co.nz/">Steer &amp; Beer</a></li>
                </ul>
            </div>

              <div class="menu-footer  menu-footer4">
                <div class="menu-footer-title"><a href="javascript:void(0);">Cinemas &amp; Showtimes</a></div>
                  <ul>
                    <li><a target="_blank" href="http://readingcinemas.com.au/">Australia</a></li>
                    <li><a target="_blank" href="http://readingcinemas.co.nz">New Zealand</a></li>
                    <li><a target="_blank" href="http://readingcinemasus.com/">USA</a></li>
                  </ul>

                <div class="menu-footer-title"><a href="javascript:void(0);">Real Estate</a></div>
                  <ul>
                    <li><a href="http://52.1.229.232/bw_corporate/?page_id=534?country_filter=AU">Australia</a></li>
                    <li><a href="http://52.1.229.232/bw_corporate/?page_id=534?country_filter=NZ">New Zealand</a></li>
                    <li><a href="http://52.1.229.232/bw_corporate/?page_id=534?country_filter=US">USA</a></li>
                  </ul>
                </div>

              <div class="menu-footer  menu-footer5">
                <div class="menu-footer-title"><a href="javascript:void(0);">Promotions</a></div>
                  <ul>
                    <li><a  target="_blank" href="http://www.cinemaextras.com">EXTRAS Loyalty Card</a></li>
                    <li><a  target="_blank" href="https://readingcinemas.com.au/member_register">Reel Club Australia</a></li>
                    <li><a  target="_blank" href="https://readingcinemas.co.nz/member_register">Reel Club New Zealand </a></li>
                    <li><a  target="_blank" href="http://www.steernbeer.co.nz/?page_id=20">Steer &amp; Beer Specials</a></li>
                  </ul>

                <div class="menu-footer-title"><a href="javascript:void(0);">Contact Us</a></div>
                  <ul>
                    <li><a href="http://52.1.229.232/bw_corporate/?page_id=433">General Inquiries</a></li>
                    <li><a href="http://52.1.229.232/bw_corporate/?page_id=425">Investors Inquiries</a></li>
                    <li><a href="http://52.1.229.232/bw_corporate/?page_id=1364">Real Estate Inquiries</a></li>
                    <li><a href="http://52.1.229.232/bw_corporate/?page_id=1361">Website Feedback</a></li>
                  </ul>
                </div>
        </div> <!--  END menus-footer --> 

        <div class="rights">&copy; Copyright <span id="bwcopyyear"></span><script type="text/javascript">copydate = new Date().getFullYear(); document.getElementById('bwcopyyear').innerHTML = copydate;</script> Reading International, Inc. - All Rights Reserved</div>
      </div> <!--  END hfeed footer-menu --> 

         <div id="bw_tag_wrap" style="width: 960px; margin: 0px auto; text-align: right; clear:both">
          <div id="bw_tag"><a href="http://www.businesswire.com/portal/site/home/ir-sites/" target="_blank">Business Wire InvestorHQ<sup>SM</sup></a></div>
        </div>
    </div> <!--  END footer-wrap2 -->

  </div> <!-- END #page -->
      
  <!-- /End closing site chrome -->

<?php 
  // remove url params from solr search box, on press-releases pages, if they are the default value
  $body_classes_array = (!empty($body_classes) && is_string($body_classes)) ? explode(' ', $body_classes) : ((!empty($body_classes) && is_array($body_classes)) ? $body_classes : array());
  if (!empty($body_classes_array) && in_array('not-front', $body_classes_array) && in_array('page-press-releases', $body_classes_array)) {
  echo '<script>
    // solr search box is on the page
    if ($(".bw-advanced-search-form-non-empty input#edit-keywords").length) {
      // valid url and search box values
      var BW_SOLR = BW_SOLR || {};
      BW_SOLR.search_value = $(".bw-advanced-search-form-non-empty input#edit-keywords").attr("value");
      if (BW_SOLR.search_value && window.location.href) {
        // url dencode url to match search box value
        BW_SOLR.search_url = decodeURIComponent(window.location.href);
        // url ends with search box value
        if (BW_SOLR.search_url.indexOf(BW_SOLR.search_value, BW_SOLR.search_url.length - BW_SOLR.search_value.length) !== -1) {
          // clear search box default value
          $(".bw-advanced-search-form-non-empty input#edit-keywords").attr("value","");
        }
      }
    }
  </script>';
}
?>

  <?php print $sharing_body ?>

  <?php print $closure; ?>
</body>
</html>
