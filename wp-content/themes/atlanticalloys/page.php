<?php

/**
 * The default page template
 *
 * @author Nucleus
 * @since 1.0.0
 *
 * @package Nucleus
 */

namespace WL;

get_header();
	the_content();
?> <script> AOS.init(); </script> 
	<?php
	get_footer();
