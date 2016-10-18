<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
 
 if(!user_is_anonymous()) {
?>
  	  <div class="video-title">
        <?php print render($title) ?>
      </div>
      <div class="video-content">
        <div class="left-wrap">
    		  <?php 
          print render($content['field_video']);
          print render($content['body']); ?>
    	</div>
        <div class="right-wrap">
          <div class="chapters-wrap clearfix">
            <div class="chapters-header">Chapters</div>
			<div class="chapters">
				<?php 
			   if (!empty($content['field_chapters'])) {
				$test = (array)$content['field_chapters']['#items'];
				  foreach ($content['field_chapters']['#items'] as $entity_uri_key => $entity_uri_value) {
					$a_field_collection_item = entity_load('field_collection_item', $entity_uri_value);
					foreach($a_field_collection_item as $key => $value) {
						$parsed_current = date_parse($value->field_chapter_time['und'][0]['value']);
						$seconds_current = $parsed_current['hour'] * 3600 + $parsed_current['minute'] * 60 + $parsed_current['second'];
						$next = next($content['field_chapters']['#items']);
						$a_field_collection_item_next = entity_load('field_collection_item', $next);
						$parsed_next = date_parse($a_field_collection_item_next[$next['value']]->field_chapter_time['und'][0]['value']);
						$seconds_next = $parsed_next['hour'] * 3600 + $parsed_next['minute'] * 60 + $parsed_next['second'];
						$chapter_duration = $seconds_next - $seconds_current;
						if($chapter_duration < 0) {
							$chapter_end = date_parse(render($content['field_chapter_end']));
							$seconds_end = (int) $chapter_end['hour'] * 3600 + $chapter_end['minute'] * 60 + $chapter_end['second'];
							$chapter_duration = $seconds_end - $seconds_current;
						}
						$chapter_hour = gmdate("H", $chapter_duration);
						if($chapter_hour == '00') {
							$chapter_length = gmdate("i:s", $chapter_duration);
						} else {
							$chapter_length = gmdate("H:i:s", $chapter_duration);
						}						
			?>
				<div class="chapter clearfix">
					<div class="chapter-num"><?php print $value->field_chapter_number['und'][0]['value']; ?>.</div>
					<div class="chapter-name"><?php print $value->field_chapter_description['und'][0]['value']; ?></div>	
					<div class="chapter-timestamp"><?php print $chapter_length; ?></div>
				</div>
				<?php
					}
				  }
				}
			?>
            </div>
          </div>
          <div class="doctor-desc-wrap clearfix">
            <div>
              <?php
              print render($content['field_doctor_image']); ?>
            </div>
            <div class="doctor-desc-right">
              <?php 
              print render($content['field_doctor_name']);
              print render($content['field_doctor_description']); ?>
            </div>
          </div>
      		<?php print render($content['field_video_thumbnail']); ?>
        </div>
      </div>  
<?php 
}
?>