<?php 

function tlw_twitter_feed( $feed_config = NULL ) {

	/* Configuration validity checks are performed on initialisation
	   so you don't have to worry your (presumably) pretty little head */
	$the_feed = new DB_Twitter_Feed( $feed_config );
	
	//echo '<pre>';print_r($the_feed);echo '</pre>';

	if ( ! $the_feed->is_cached ) {
		// We only want to talk to Twitter when our cache is on empty
		$the_feed->retrieve_feed_data();

		// After attempting data retrieval, check for errors
		if ( $the_feed->has_errors() ) {
			$the_feed->output .= '<p>Your own error message here. Otherwise you can loop through the <code>$errors</code> (array) property to view the errors returned.</p>';

		// Then check for an empty timeline
		} elseif( $the_feed->is_empty() ) {
			$the_feed->output .= '<p>Your own &ldquo;timeline empty&rdquo; message here.</p>';

		// With the checks done we can get to HTML renderin'
		} else {

			/* Below is the default HTML layout. Tweak to taste
			*********************************************************/
			$the_feed->output .= '<div class="feed-wrap"><ul>'; // START The Tweet list

			foreach ( $the_feed->feed_data as $tweet ) {
				/* parse_tweet_data() takes the raw data, gets what's useful, formats it,
				   and returns it as a nice, neat array */
				$t = $the_feed->parse_tweet_data( $tweet );


				// START Rendering the Tweet's HTML (outer tweet wrapper)
				$the_feed->output .= '<li>';
				
					// START Twitter username/@screen name
				$the_feed->output .= '<a href="'.$the_feed->tw.$t['user_screen_name'].'" target="_blank" class="tweet_user" title="'.$t['user_description'].'">'.$t['user_display_name'].'</a>';
				// END Twitter username/@screen name

				// START The Tweet text
				$the_feed->output .= '<p>'.$t['text'].'<p>';
				// END The Tweet text

				// START Tweet date
				$the_feed->output .= '<small>'.$t['date'].'</small>';
				// END Tweet date

				$the_feed->output .= '</li>'; // END Rendering Tweet's HTML
			}

			$the_feed->output .= '</ul></div>'; // END The Tweet list

			$the_feed->cache_output( $the_feed->options['cache_hours'] );

		}

	}

	/* WP needs shortcode called content to be returned
	   rather than echoed, which is where the
	   $is_shortcode_called property comes in */
	if ( $the_feed->is_shortcode_called ) {
		return $the_feed->output;
	} else {
		echo $the_feed->output;
	}

}

 ?>