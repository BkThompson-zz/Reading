<?php 

function phptemplate_breadcrumb($breadcrumb) {

$separator = '&nbsp; > &nbsp;';

  /*** Define your custom breadcrumb prefix here ***/
  $corporate_breadcrumb = array(l('Home','http://www.readingrdi.com/')  ,l('Investor Relations','http://readingrdi.investorhq.businesswire.com/')) ;
  

  //Remove "Home" and "Press" and replace it with our breadcrumb prefix
array_shift($breadcrumb);
//array_shift($breadcrumb);
  $corporate_breadcrumb_length = sizeof($corporate_breadcrumb);
  //Prepend the custom breadcrumb prefix to the current page breadcrumb
  for ($counter = $corporate_breadcrumb_length - 1; $counter >=0; $counter--) {
    array_unshift($breadcrumb, $corporate_breadcrumb[$counter]);
  }
  
  if (!empty($breadcrumb)) {
    if (!drupal_is_front_page()) {

      $is_search_page = array();
      if (isset($breadcrumb[$corporate_breadcrumb_length])) {
        preg_match('/\/search">Search/', $breadcrumb[$corporate_breadcrumb_length], $is_search_page);
      }

      // Cut off excess breadcrumb for search pages
      //We don't need the title of search page to be included in breadcrumb.
      if ($is_search_page) {
        $breadcrumb[$corporate_breadcrumb_length] = '<span>Search</span>';
        $breadcrumb = array_slice($breadcrumb, 0, $corporate_breadcrumb_length + 2);
      }
      else { 
        // If page has title, add it to the breadcrumb
        $title = drupal_get_title();
        if (!empty($title)) {
          $breadcrumb[] = $title;
        }
      }
    }
  
  
  // Below is the breadcrumb list code
  
  if (!empty($breadcrumb)) {
    $lastitem = sizeof($breadcrumb);
    $title = drupal_get_title();
    $crumbs = '<div id="breadcrumb"><div>';
    $a = 1;
  
    foreach($breadcrumb as $value) {
  
    if ($a == 1) {
      $crumbs .= $value;
 
      $a++;
    } else {
  
      if ($a!=$lastitem){
        $crumbs .= $separator . $value;
       
        $a++;
      }
      else {
           $crumbs .= $separator . $value; 
      }
    }
  }
  
    $crumbs .= '</div></div>';
  }
  return $crumbs;

// End of breadcrumb list code
  /*

  


    */
  
  
  }
}


// A THIRD OPTION
// we can also create a custom function(s) to handle the $primary_links or other array to be called from the page.tpl.php
// this can be very useful when the client has different markup for mobile and desktop menus
// to get the full menu array, define the following variable in your page.tpl.php and call it in the custom function
// $primary_links_full_tree = menu_tree_page_data('primary-links');
// if (isset($primary_links_full_tree)) { print readingrdi_theme_custom_primary_links($primary_links_full_tree); }
// (note: it could also be passed the normal $primary_links array )
 
function readingrdi_theme_custom_primary_links($tree) {
  $output = '<div class="nav-about-us"><ul class="nav">';
  $items = array();
    if ($tree) {
        foreach ($tree as $item) {
         
            // Test to see if the item is enabled
            if ($item['link']['hidden'] == 0 ) {
             
                // test to see if item has a submenu, $item['below']
                if ($item['below']) {

                  $output .= '<li><a href="javascript:void(0);">'.t($item['link']['title']).'</a>';
                  
                  // print the submenu if it is there
                  if ($item['below']) {
                    // lets say each submenu needed an ID using its parent item title without spaces or special characters
                    // we could create it like so...
                 
                    // and the output with a dropdown +/- icon
                    $output .= '<ul class="submenu">';
                    $output .= '<li class="submenu-title"><a href="javascript:void(0);"><i class="fa fa-cog fa-fw"></i>&nbsp;'.t($item['link']['title']).'</a></li>';
                    
                    // this foreach $items prints the array of submenu items as plain links
                    foreach ($item['below'] as $subitem) {
                      // <li><a href="?page_id=814"><i class="fa fa-angle-right"></i>&nbsp;Board of Directors</a></li>
                      $output .= '<li>';
                      $output .=  l('<i class="fa fa-angle-right"></i>&nbsp;'.t($subitem['link']['title']), $subitem['link']['href'], array( 'attributes' => array('class'=> ''), 'html' => true, 'query' => $subitem['link']['options']['query'] ) );
                      $output .= '</li>';
                    } // 2. foreach
                 
                    // close sub item list wrapper
                    $output .= "</ul>";
                  } // if below
                    // close the wrapping li
                    $output .= "</li>";            
  
                } else {
                  // print the parent item link using the l() function, notice the l() function can take queries using html=>true, $query=>link->options->query
                  $output .= '<li>'.l(t($item['link']['title']), $item['link']['href'], array( 'attributes' => array('class'=> ''), 'html' => true, 'query' => $item['link']['options']['query'] )).'</li>';
             
                } // if else item below

            } // if item
        } // 1. foreeach
    } // if tree
    // close the mobile item wrapper
    $output .= "</ul></div>";
     
    // return our menu with markup
    return $output;
}