<?php

/* Template Name: Sample Pods Page */

get_header(); ?>

<div id="content" class="narrowcolumn" role="main">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="post" id="post-<?php the_ID(); ?>">
      <h2><?php the_title(); ?></h2>
      <div class="entry">

        <?php the_content(); ?>

        <h2>Affiliates</h2>

        <!-- Affiliations code -->

        <?php
        $affiliations = pods('affiliates');
        $params = array(
          'search' => false,
          'pagination' => false,
          'limit' => -1

        );
        $affiliations->find($params);
        $total_affiliations = $affiliations->total();
        ?>

        <div class="affiliations-bar">
          <ul class="affiliations-list">
            <?php
            // if there are no affiliates, do not run this code
            if( $total_affiliations > 0 ) :

              //looping through each slide     
              while ( $affiliations->fetch() ) :

                // set our variables
                $affiliations_name = $affiliations->field('name');
                $affiliations_logo = $affiliations->field('logo.guid');
                $affiliations_url = $affiliations->field('url');

                ?>

                <li class="affiliate">
                  <a href="<?php echo $affiliations_url; ?>" target="_blank"><img src="<?php echo $affiliations_logo ?>" alt="<?php echo $affiliations_name; ?>" ></a>
                </li>


              <?php endwhile; ?>

            </ul>

          <?php endif; ?>


        </div>

        <!-- /Affiliations code -->



      </div>
    </div>
  <?php endwhile; endif; ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
