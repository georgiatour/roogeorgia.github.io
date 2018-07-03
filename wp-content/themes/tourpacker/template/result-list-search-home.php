<?php
/*
*Template Name: Result List Search Home
*
*/
	get_header();
	$theme_option = get_option('theme_option');
?>
<!-- start Main Wrapper -->
<div class="main-wrapper">

	<!-- start end Page title -->
	<div class="page-title" <?php if(isset($theme_option['index_page_image_background']['url']) && $theme_option['index_page_image_background']['url'] != '' ){ ?>style="background-image:url('<?php echo esc_url($theme_option['index_page_image_background']['url']); ?>');"<?php }else{} ?>>
		
		<div class="container">
		
			<div class="row">
			
				<div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
				
					<h1 class="hero-title"><?php the_title(); ?></h1>
					<?php tourpacker_breadcrumbs(); ?>
					
				</div>
				
			</div>

		</div>
		
	</div>
	<!-- end Page title -->
	
	<div class="content-wrapper">
	
		<div class="container">
		
			<div class="row">
				
				<div class="col-sm-4 col-md-3">
					
					<aside class="sidebar with-filter">
		
						<div class="sidebar-search-wrapper bg-light-2">
						
							<div class="sidebar-search-header">
								<h4>Search Again</h4>
							</div>
							
							<div class="sidebar-search-content">

								<div class="form-group">
									
									<select name="tour_destination" id="destination_cus1" class="select2-multi form-control" data-placeholder="Choose a Destination" multiple>
										<option value="">Choose a Destination</option>
                						<option value="00">Any Destination</option>
										<?php 
							              $i = 0;
							              $args = array(
							                'post_type' => 'tour',
							                'posts_per_page'  => -1,
							              );
							              $the_query = new WP_Query( $args );
							              if ($the_query->have_posts()) :                                         
							              while ( $the_query->have_posts() ) : $the_query->the_post();
							              $tour_single_country = get_post_meta( get_the_ID(), '_cmb_tour_info_country',true);
							                if (!in_array($tour_single_country, $locations) && $tour_single_country != '') {
							                  $locations[$i] = $tour_single_country;
							              ?>
							                <option value="<?php echo get_post_meta( get_the_ID(), '_cmb_tour_info_country',true); ?>"><?php echo get_post_meta( get_the_ID(), '_cmb_tour_info_country',true); ?></option>
							              <?php } endwhile;wp_reset_postdata();
							              endif; ?>
									</select>
									<input type="hidden" name="destination_hidden" id="destination_hidden1"/>
						              <script>
						              jQuery(function($){
						                $(document).ready(function(){
						                  $("a.search-again").on("click",function(){
						                    document.getElementById("destination_hidden1").value = $('#destination_cus1').val();
						                  });
						                });
						                });

						            </script>

								</div>
							
								<div class="form-group">
												
									<select name="tour_month" id="month_cus_search1" class="select2-multi form-control" data-placeholder="Choose a Departure Month" multiple>
										<option value="">Choose a Departure Month</option>
										<option value="00">Any Departure Month</option>
										<option value="01">January</option>
										<option value="02">February</option>
										<option value="03">March</option>
										<option value="04">April</option>
										<option value="05">May</option>
										<option value="06">June</option>
										<option value="07">July</option>
										<option value="08">August</option>
										<option value="09">September</option>
										<option value="10">October</option>
										<option value="11">November</option>
										<option value="12">December</option>
									</select>
									<input type="hidden" name="month_hidden" id="month_hidden1"/>
						              <script>
						              jQuery(function($){
						                $(document).ready(function(){
						                  $("a.search-again").on("click",function(){
						                    document.getElementById("month_hidden1").value = $('#month_cus_search1').val();
						                  });
						                });});
						              </script>
									
								</div>
								
								<div class="form-group">

									<select name="tour_year" id="year_cus1" class="select2-multi form-control" data-placeholder="Choose a Departure Year" multiple>
										<option value="">Choose a Departure Year</option>
										<option value="00">Any Departure Year</option>
										<option value="2018">2018</option>
										<option value="2019">2019</option>
										<option value="2020">2020</option>
									</select>
						              <input type="hidden" name="year_hidden" id="year_hidden1"/>
						              <script>
						              jQuery(function($){
						                $(document).ready(function(){
						                  $("a.search-again").on("click",function(){
						                    document.getElementById("year_hidden1").value = $('#year_cus1').val();
						                  });
						                });});
						              </script>									
									
								</div>
							
								<a href="#" class="btn btn-primary btn-block search-again">Search</a>
								<script>
								jQuery(function($){
								    $(document).ready(function(){
								      var $content = $("body #filter-search-list");
								        $("a.search-again").on("click",function(){
								            var destination_hidden = $('#destination_hidden1').val();
								            var month_hidden = $('#month_hidden1').val();
								            var year_hidden = $('#year_hidden1').val();
								            $( "#filter-search-list" ).empty();
								            $.ajax({
								              type:"GET",
								              url: ajaxurl,
										        data: {
										            'action':'result_list_ajax',
										            'ajax_destination' : destination_hidden, 
										            'ajax_month' : month_hidden, 
										            'ajax_year' : year_hidden, 
										        },
								              dataType: "html",
								              beforeSend: function(){
								                $content.append('<div class="ajax-loading-wrapper"><div class="ajax-loading-inner"><div class="ajax-loading-item">?<img src="<?php echo get_template_directory_uri(); ?>/images/ajax-loading.gif" alt="Ajax Loading"></div></div></div>');
								                },                          
								              success: function(data){
								                $data = $(data);
								                $content.append($data);
								                $data.fadeIn( 7000,'linear', function(){                           
								                            loading = true;
								                        });                
								                $("#filter-search-list").html(data);
								            }});
								        });
								    });
								});
								</script>
							</div>
							
						</div>
						
						<div class="sidebar-header clearfix">
							<h4>Filter Results</h4>
							<a href="#" class="sidebar-reset-filter"><i class="fa fa-times"></i> reset filter</a>
						</div>
						
						<div class="sidebar-inner">
						
							<div class="sidebar-module">
								<h6 class="sidebar-title">Name Contain</h6>
								<div class="sidebar-module-inner">
									<div class="sidebar-mini-search">
										<div class="input-group">
											<input type="text" id="search-for1" class="form-control" placeholder="Search for...">
											<input type="hidden" name="search_for_hidden" id="search_for_hidden1"/>
								              <script>
								              jQuery(function($){
								                $(document).ready(function(){
								                  $("button.result-search-for").on("click",function(){
								                    document.getElementById("search_for_hidden1").value = $('#search-for1').val();
								                  });
								                });});
								              </script>	
											<span class="input-group-btn">
												<button class="btn btn-primary result-search-for" type="button"><i class="fa fa-search"></i></button>
												<script>
												jQuery(function($){
												    $(document).ready(function(){
												      var $content = $("body #filter-search-list");
												        $("button.result-search-for").on("click",function(){
												            var search_for = $('#search_for_hidden1').val();

												            $( "#filter-search-list" ).empty();
												            $.ajax({
												              type:"GET",
												              url: ajaxurl,
														        data: {
														            'action':'result_list_word_ajax',
														            'ajax_search_for' : search_for, 
														        },
												              dataType: "html",
												              beforeSend: function(){
												                $content.append('<div class="ajax-loading-wrapper"><div class="ajax-loading-inner"><div class="ajax-loading-item">?<img src="<?php echo get_template_directory_uri(); ?>/images/ajax-loading.gif" alt="Ajax Loading"></div></div></div>');
												                },                          
												              success: function(data){
												                $data = $(data);
												                $content.append($data);
												                $data.fadeIn( 7000,'linear', function(){                            
												                            loading = true;
												                        });                
												                $("#filter-search-list").html(data);
												            }});
												        });
												    });
												    });
												</script>
											</span>
										</div>
									</div>
								</div>
							</div>
							
							<div class="hidden sidebar-module">
								<h6 class="sidebar-title">Price Range</h6>
								<div class="sidebar-module-inner">
									<input id="price_range" />
									<input type="hidden" name="search_for_price" id="search_for_price1"/>
						              <script>
						              jQuery(function($){
						                $(document).ready(function(){
						                  $("button.result-search-for-filter").on("click",function(){
						                    document.getElementById("search_for_price1").value = $('#price_range').val();
						                  });
						                });
						                });
						              </script>
						            
								</div>
							</div>
							<?php 
				              $price_string = '';
				              $args = array(
				                'post_type' => 'tour',
				                'posts_per_page'  => -1,
				              );
				              $the_query = new WP_Query( $args );
				              if ($the_query->have_posts()) :                                         
				              while ( $the_query->have_posts() ) : $the_query->the_post();
				              $tour_related_number_price = get_post_meta( get_the_ID(), '_cmb_tour_single_number_price', true );
				              $price_string .= $tour_related_number_price.',';
				              endwhile;wp_reset_postdata();
				              endif;
				              $price_array = explode(',' , $price_string );
				              ?>
							<script type="text/javascript">
								// Price Range Slider
							jQuery(document).ready(function($) {
									"use strict";
									$("#price_range").ionRangeSlider({
										type: "double",
										grid: true,
										min: 0,
										max: <?php echo max($price_array); ?>,
										from: 200,
										to: 1800,
										prefix: "$"
									});
								});
							</script>
							
							<div class="clear"></div>
							
							<div class="sidebar-module">
								<h6 class="sidebar-title">Star Range</h6>
								<div class="sidebar-module-inner">
									<input id="star_range" />
									<input type="hidden" name="search_for_star" id="search_for_star1"/>
						              <script>
						              jQuery(function($){
						                $(document).ready(function(){
						                  $("button.result-search-for-filter").on("click",function(){
						                    document.getElementById("search_for_star1").value = $('#star_range').val();
						                  });
						                });
						                });
						              </script>
								</div>
							</div>
							<div class="clear"></div>
							<div class="form-group">
								<button class="btn btn-primary btn-block result-search-for-filter"><?php echo esc_html__('Search','tourpacker'); ?></button>
							</div>
							
							
							<script>
							jQuery(function($){
							    $(document).ready(function(){
							      var $content = $("body #filter-search-list");
							        $("button.result-search-for-filter").on("click",function(){
							            var search_for_price = $('#search_for_price1').val();
							            $( "#filter-search-list" ).empty();
							            $.ajax({
							              type:"GET",
							              url: ajaxurl,
									        data: {
									            'action':'result_list_filter_ajax',
									            'ajax_search_for_price' : search_for_price, 
									        },
							              dataType: "html",
							              beforeSend: function(){
							                $content.append('<div class="ajax-loading-wrapper"><div class="ajax-loading-inner"><div class="ajax-loading-item">?<img src="<?php echo get_template_directory_uri(); ?>/images/ajax-loading.gif" alt="Ajax Loading"></div></div></div>');
							                },                          
							              success: function(data){
							                $data = $(data);
							                $content.append($data);
							                $data.fadeIn( 7000,'linear', function(){                         
							                            loading = true;
							                        });                
							                $("#filter-search-list").html(data);
							            }});
							        });
							    });
							    });
							</script>
							<div class="clear"></div>
							
							<div class="sidebar-module">
							
								<h6 class="sidebar-title">Starting Point</h6>
								<div class="sidebar-module-inner">
								<?php 
					              $i=1;
					              $j=0;
					              $h=0;
					              $args = array(
					                'post_type' => 'tour',
					                'posts_per_page'  => -1,
					              );
					              $the_query = new WP_Query( $args );
					              if ($the_query->have_posts()) :                                         
					              while ( $the_query->have_posts() ) : $the_query->the_post();
					              $tour_single_start = get_post_meta( get_the_ID(), '_cmb_tour_info_start',true);
					              
							                if (!in_array($tour_single_start, $locations) && $tour_single_start != '' && $i <=3) {
							                  $locations[$j] = $tour_single_start;
					            ?>
									<div class="checkbox-block">
										<input id="starting_point-<?php echo esc_attr($i); ?>" name="starting_point" type="checkbox" class="checkbox"/>										
										<label class="starting_point-1" for="starting_point-<?php echo esc_attr($i); ?>"><?php echo get_post_meta(get_the_ID(),'_cmb_tour_info_start',true); ?> <span class="checkbox-count">(2)</span></label>
									</div>
									
									<script>
									jQuery(function($){
						                $(document).ready(function(){
						                	var count_js=0;
						                  $("#starting_point-<?php echo esc_attr($i); ?>").on("click",function(){
						                  	count_js++;
						                if(count_js%2==1){
						                    $("#starting_point-<?php echo esc_attr($i); ?>").attr('checked', true);
						                    document.getElementById("starting_point-<?php echo esc_attr($i); ?>").value = '<?php echo get_post_meta(get_the_ID(),'_cmb_tour_info_start',true); ?>';
						                    document.getElementById("search_for_start").value += $('#starting_point-<?php echo esc_attr($i); ?>').val()+' ,';
						                }else{
						                	$("#starting_point-<?php echo esc_attr($i); ?>").attr('checked', false);
						                	document.getElementById("starting_point-<?php echo esc_attr($i); ?>").value = '<?php echo get_post_meta(get_the_ID(),'_cmb_tour_info_start',true); ?>';
						                	b = $('#starting_point-<?php echo esc_attr($i); ?>').val();
						                	a = $("#search_for_start").val().replace(b+' ,',"");
						                	$("#search_for_start").val(a);						                	
						                }
						                
						                  });
						                var $content = $("body #filter-search-list");
									        $("#starting_point-<?php echo esc_attr($i); ?>").on("click",function(){
									            var search_for_start = $('#search_for_start').val();
									            $( "#filter-search-list" ).empty();
									            $.ajax({
									              type:"GET",
									              url: ajaxurl,
											        data: {
											            'action':'result_list_checkbox_ajax',
											            'ajax_search_for_start' : search_for_start, 
											        },
									              dataType: "html",
									              beforeSend: function(){
									                $content.append('<div class="ajax-loading-wrapper"><div class="ajax-loading-inner"><div class="ajax-loading-item">?<img src="<?php echo get_template_directory_uri(); ?>/images/ajax-loading.gif" alt="Ajax Loading"></div></div></div>');
									                },                          
									              success: function(data){
									                $data = $(data);
									                $content.append($data);
									                $data.fadeIn( 7000,'linear', function(){                         
									                            loading = true;
									                        });                
									                $("#filter-search-list").html(data);
									            }});
									        });
						                });
						                });
						              </script>
								<?php $i++; } endwhile;wp_reset_postdata();
					              endif;
					            ?>
					            <input type="hidden" name="search_for_start" id="search_for_start"/>
									
									<div class="more-less-wrapper">
										
										<div id="property_type_more_less" class="collapse"> 
											<div class="more-less-inner">
											<?php 
								              $count=1;
								              $k=0;
								              $h=0;
								              $i=0;
								              $location = array(); 
								              $args = array(
								                'post_type' => 'tour',
								                'posts_per_page'  => -1,
								              );
								              $the_query = new WP_Query( $args );
								              if ($the_query->have_posts()) :                                         
								              while ( $the_query->have_posts() ) : $the_query->the_post();
								              $tour_single_starts = get_post_meta( get_the_ID(), '_cmb_tour_info_start',true);
										                if (!in_array($tour_single_starts, $location) && $tour_single_starts != '') {
										                  $location[$k] = $tour_single_starts;
										                  if($count >= 4){
								            ?>
												<div class="checkbox-block">
													<input id="starting_point-<?php echo esc_attr($count); ?>" name="starting_point" type="checkbox" class="checkbox"/>
													<label class="" for="starting_point-<?php echo esc_attr($count); ?>"><?php echo get_post_meta(get_the_ID(),'_cmb_tour_info_start',true); ?> <span class="checkbox-count">(1)</span></label>
												</div>
												<input type="hidden" name="search_for_start" id="search_for_start<?php echo esc_attr($count); ?>"/>
												<script>
												jQuery(function($){
									                $(document).ready(function(){
									                	var count_js=0;
									                  $("#starting_point-<?php echo esc_attr($count); ?>").on("click",function(){
									                  	count_js++;
									                if(count_js%2==1){
									                    $("#starting_point-<?php echo esc_attr($count); ?>").attr('checked', true);
									                    document.getElementById("starting_point-<?php echo esc_attr($count); ?>").value = '<?php echo get_post_meta(get_the_ID(),'_cmb_tour_info_start',true); ?>';
									                    document.getElementById("search_for_start").value += $('#starting_point-<?php echo esc_attr($count); ?>').val()+' ,';
									                }else{
									                	$("#starting_point-<?php echo esc_attr($count); ?>").attr('checked', false);
									                	document.getElementById("starting_point-<?php echo esc_attr($count); ?>").value = '<?php echo get_post_meta(get_the_ID(),'_cmb_tour_info_start',true); ?>';
									                	b = $('#starting_point-<?php echo esc_attr($count); ?>').val();
									                	a = $("#search_for_start").val().replace(b+' ,',"");
									                	$("#search_for_start").val(a);						                	
									                }
									                
									                  });
									                var $content = $("body #filter-search-list");
												        $("#starting_point-<?php echo esc_attr($count); ?>").on("click",function(){
												            var search_for_start = $('#search_for_start').val();
												            $( "#filter-search-list" ).empty();
												            $.ajax({
												              type:"GET",
												              url: ajaxurl,
														        data: {
														            'action':'result_list_checkbox_ajax',
														            'ajax_search_for_start' : search_for_start, 
														        },
												              dataType: "html",
												              beforeSend: function(){
												                $content.append('<div class="ajax-loading-wrapper"><div class="ajax-loading-inner"><div class="ajax-loading-item">?<img src="<?php echo get_template_directory_uri(); ?>/images/ajax-loading.gif" alt="Ajax Loading"></div></div></div>');
												                },                          
												              success: function(data){
												                $data = $(data);
												                $content.append($data);
												                $data.fadeIn( 7000,'linear', function(){                         
												                            loading = true;
												                        });                
												                $("#filter-search-list").html(data);
												            }});
												        });
									                });
									                });
									              </script>
											<?php } $count++;$k++;}else{}
											 endwhile;wp_reset_postdata();
								              endif;
								            ?>
												
											</div>
										</div>
										<button class="btn btn-more-less collapsed" data-toggle="collapse" data-target="#property_type_more_less">Show more</button>
										
										
									</div>
									
								</div>
							
							</div>
							
							<div class="clear"></div>
							
							<div class="sidebar-module">
							
								<h6 class="sidebar-title">Ending Point</h6>
								<div class="sidebar-module-inner">
								<?php 
					              $i=1;
					              $j=0;
					              $args = array(
					                'post_type' => 'tour',
					                'posts_per_page'  => -1,
					              );
					              $the_query = new WP_Query( $args );
					              if ($the_query->have_posts()) :                                         
					              while ( $the_query->have_posts() ) : $the_query->the_post();
					              $tour_single_end = get_post_meta( get_the_ID(), '_cmb_tour_info_end',true);
							                if (!in_array($tour_single_end, $locations) && $tour_single_end != '' && $i <=3) {
							                  $locations[$j] = $tour_single_end;
					            ?>
									<div class="checkbox-block">
										<input id="ending_point-<?php echo esc_attr($i);?>" name="ending_point" type="checkbox" class="checkbox"/>
										<label class="" for="ending_point-<?php echo esc_attr($i);?>"><?php echo esc_attr($tour_single_end); ?> <span class="checkbox-count">(1)</span></label>
									</div>
									<script>
									jQuery(function($){
						                $(document).ready(function(){
						                	var count_end=0;
						                  $("#ending_point-<?php echo esc_attr($i);?>").on("click",function(){
						                  	count_end++;
						                if(count_end%2==1){
						                    $("#ending_point-<?php echo esc_attr($i);?>").attr('checked', true);
						                    document.getElementById("ending_point-<?php echo esc_attr($i); ?>").value = '<?php echo get_post_meta(get_the_ID(),'_cmb_tour_info_end',true); ?>';
						                    document.getElementById("search_for_end").value += $('#ending_point-<?php echo esc_attr($i);?>').val()+' ,';

						                }else{
						                	$("#ending_point-<?php echo esc_attr($i);?>").attr('checked', false);
						                	document.getElementById("ending_point-<?php echo esc_attr($i); ?>").value = '<?php echo get_post_meta(get_the_ID(),'_cmb_tour_info_end',true); ?>';
						                	b_end = $('#ending_point-<?php echo esc_attr($i);?>').val();
						                	a_end = $("#search_for_end").val().replace(b_end+' ,',"");
						                	$("#search_for_end").val(a_end);						                	
						                }
						                
						                  });
						                var $content = $("body #filter-search-list");
									        $("#ending_point-<?php echo esc_attr($i);?>").on("click",function(){
									            var search_for_end = $('#search_for_end').val();
									            $( "#filter-search-list" ).empty();
									            $.ajax({
									              type:"GET",
									              url: ajaxurl,
									              data: {
											            'action':'result_list_checkbox_ajax',
											            'ajax_search_for_end' : search_for_end, 
											        },
									              dataType: "html",
									              beforeSend: function(){
									                $content.append('<div class="ajax-loading-wrapper"><div class="ajax-loading-inner"><div class="ajax-loading-item">?<img src="<?php echo get_template_directory_uri(); ?>/images/ajax-loading.gif" alt="Ajax Loading"></div></div></div>');
									                },                          
									              success: function(data){
									                $data = $(data);
									                $content.append($data);
									                $data.fadeIn( 7000,'linear', function(){                         
									                            loading = true;
									                        });                
									                $("#filter-search-list").html(data);
									            }});
									        });
						                });
						                });
						              </script>
								<?php $i++; } endwhile;wp_reset_postdata();
					              endif;
					            ?>	
									<input type="hidden" name="search_for_end" id="search_for_end"/>
									<div class="more-less-wrapper">
										
										<div id="hotel_facilities_more_less" class="collapse"> 
											<div class="more-less-inner">
											<?php 
								              $count=1;
								              $k=0;
								              $location_end = array(); 
								              $args = array(
								                'post_type' => 'tour',
								                'posts_per_page'  => -1,
								              );
								              $the_query = new WP_Query( $args );
								              if ($the_query->have_posts()) :                                         
								              while ( $the_query->have_posts() ) : $the_query->the_post();
								              $tour_single_end = get_post_meta( get_the_ID(), '_cmb_tour_info_end',true);
										                if (!in_array($tour_single_end, $location_end) && $tour_single_end != '') {
										                  $location_end[$k] = $tour_single_end;
										                  if($count >= 4){
								            ?>
												<div class="checkbox-block">
													<input id="ending_point-<?php echo esc_attr($count);?>" name="ending_point" type="checkbox" class="checkbox"/>
													<label class="" for="ending_point-<?php echo esc_attr($count);?>"><?php echo esc_attr($tour_single_end); ?> <span class="checkbox-count">(1)</span></label>
												</div>
												<script>
												jQuery(function($){
									                $(document).ready(function(){
									                	var count_end=0;
									                  $("#ending_point-<?php echo esc_attr($count);?>").on("click",function(){
									                  	count_end++;
									                if(count_end%2==1){
									                    $("#ending_point-<?php echo esc_attr($count);?>").attr('checked', true);
									                    document.getElementById("ending_point-<?php echo esc_attr($count); ?>").value = '<?php echo get_post_meta(get_the_ID(),'_cmb_tour_info_end',true); ?>';
									                    document.getElementById("search_for_end").value += $('#ending_point-<?php echo esc_attr($count);?>').val()+' ,';

									                }else{
									                	$("#ending_point-<?php echo esc_attr($count);?>").attr('checked', false);
									                	document.getElementById("ending_point-<?php echo esc_attr($count); ?>").value = '<?php echo get_post_meta(get_the_ID(),'_cmb_tour_info_end',true); ?>';
									                	b_end = $('#ending_point-<?php echo esc_attr($count);?>').val();
									                	a_end = $("#search_for_end").val().replace(b_end+' ,',"");
									                	$("#search_for_end").val(a_end);						                	
									                }
									                
									                  });
									                var $content = $("body #filter-search-list");
												        $("#ending_point-<?php echo esc_attr($count);?>").on("click",function(){
												            var search_for_end = $('#search_for_end').val();
												            $( "#filter-search-list" ).empty();
												            $.ajax({
												              type:"GET",
												              url: ajaxurl,
														        data: {
														            'action':'result_list_checkbox_ajax',
														            'ajax_search_for_end' : search_for_end, 
														        },
												              dataType: "html",
												              beforeSend: function(){
												                $content.append('<div class="ajax-loading-wrapper"><div class="ajax-loading-inner"><div class="ajax-loading-item">?<img src="<?php echo get_template_directory_uri(); ?>/images/ajax-loading.gif" alt="Ajax Loading"></div></div></div>');
												                },                          
												              success: function(data){
												                $data = $(data);
												                $content.append($data);
												                $data.fadeIn( 7000,'linear', function(){                         
												                            loading = true;
												                        });                
												                $("#filter-search-list").html(data);
												            }});
												        });
									                });
									                });
									              </script>
											<?php } $count++;}else{}
											 endwhile;wp_reset_postdata();
								              endif;
								            ?>
												
											</div>
										</div>
										<button class="btn btn-more-less collapsed" data-toggle="collapse" data-target="#hotel_facilities_more_less">Show more</button>
										
									</div>
									
								</div>
							
								
							</div>
														
							
							<div class="sidebar-module">
							
								<h6 class="sidebar-title">Filter Text Inside Sidebar Inner</h6>
								<div class="sidebar-module-inner">
									<p>Park fat she nor does play deal our. Procured sex material his offering humanity laughing moderate can.</p>
								</div>
								
							</div>
							
							<div class="clear"></div>
							
						</div>
						
						<div class="sidebar-box">
							<h4 class="sidebar-title">Sidebar Text</h4>
							<p>Park fat she nor does play deal our. Procured sex material his offering humanity laughing moderate can. Unreserved had she nay dissimilar admiration interested.</p>
						</div>
					
					</aside>
									
				</div>
				
				<div class="col-sm-8 col-md-9">
					
					<div class="sorting-wrappper">
	
						<div class="sorting-header">
						<?php 
							$i=0;
			              	$tour_string_country = ''; 
			             	$args = array(
			                	'post_type' => 'tour',
			                	'posts_per_page'  => -1,
			              	);
			              	$the_query = new WP_Query( $args );
			              	if ($the_query->have_posts()) :                                         
				              	while ( $the_query->have_posts() ) : $the_query->the_post();
				              	$tour_country = get_post_meta( get_the_ID(), '_cmb_tour_info_country',true);
						        $tour_string_country .=  $tour_country.' , ';
						        $tour_trim_country = trim($tour_string_country, ' ,'); 
						        $i++;
						       	endwhile;
					       	endif;
			            ?>
							<h3 class="sorting-title uppercase"><?php echo esc_attr($i); ?> Countries: <?php echo esc_attr($tour_trim_country); ?></h3>
							<p class="sorting-lead"><?php echo esc_attr($i); ?> results found</p>
						</div>
						
						<div class="sorting-content">
						
							<div class="row">
							
								<div class="col-sm-12 col-md-8">
									<div class="sort-by-wrapper">
										<label class="sorting-label">Sort by: </label> 
										<div class="sorting-middle-holder">
											<ul class="sort-by">
												<li class="active up"><a href="#">Name <i class="fa fa-long-arrow-down"></i></a></li>
												<!-- <li><a href="#">Price</a></li></li> -->
												<li><a href="#">Location</a></li>
												<li><a href="#">Start Rating</a></li>
												<li><a href="#">User Rating</a></li>
											</ul>
										</div>
									</div>
								</div>
								
								<div class="col-sm-12 col-md-4">
									<div class="sort-by-wrapper mt pull-right pull-left-sm mt-10-sm">
										<label class="sorting-label">View as: </label> 
										<div class="sorting-middle-holder">
											<a href="<?php echo esc_attr($theme_option['result_search_list']) ?>" class="btn btn-sorting active"><i class="fa fa-th-list"></i></a>
											<a href="<?php echo esc_attr($theme_option['result_search_grid']) ?>" class="btn btn-sorting"><i class="fa fa-th-large"></i></a>
										</div>
									</div>
								</div>
								
							</div>
						
						</div>

					</div>
					
					<div class="package-list-item-wrapper on-page-result-page" id="filter-search-list">
					<?php 	
					$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;			
					$args = array (
						'post_type'      => 'tour',
						'post_status'    => 'publish',
						'paged'			 => $paged,
						'posts_per_page'	=> -1,
					);
					$wp_query = new WP_Query( $args );
					$i=0;
					if($wp_query->have_posts()):
						while ( $wp_query->have_posts()) : $wp_query->the_post();

					
						$params = array( 'width' => 297, 'height' => 198 );
        				$images_tour_search = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params ); 
        				$tour_single_info_duration = get_post_meta( get_the_ID(), '_cmb_tour_info_duration', true );
        				$tour_related_number_price = get_post_meta( get_the_ID(), '_cmb_tour_single_number_price', true );

						$tour_review_5 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_5',true);
					    $tour_review_4 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_4',true);
					    $tour_review_3 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_3',true);
					    $tour_review_2 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_2',true);
					    $tour_review_1 = get_post_meta( get_the_ID(), '_cmb_tour_review_rate_1',true);

					    $tour_country = get_post_meta( get_the_ID(), '_cmb_tour_info_country',true);
					    if(isset($_POST['destination_hidden3'])){
					    	$destination_hidden = $_POST['destination_hidden3'];
						}else{
							$destination_hidden = '00';
						}
					    $month_time = get_post_meta( get_the_ID(), '_cmb_tour_single_time',true);
					    $months_time = substr($month_time,0,2);
					    $year_time = substr($month_time,6,4);

					    $tour_medium = (($tour_review_5*5) + ($tour_review_4*4) + ($tour_review_3*3) + ($tour_review_2*2) + ($tour_review_1*1) )/($tour_review_5 + $tour_review_4 + $tour_review_3 + $tour_review_2 + $tour_review_1);
					    $tour_medium_round = round ( $tour_medium, 2 );
					    if(isset($_POST['month_hidden'])){
					    	$filter_month_search = $_POST['month_hidden'];
						}else{
							$filter_month_search = '00';
						}
						if(isset($_POST['year_hidden'])){
					    	$filter_year_search = $_POST['year_hidden'];
						}else{
							$filter_year_search = '00';
						}

					if( ( strpos( $filter_month_search , $months_time) !== false && strpos( $filter_year_search , $year_time) !== false ) || strpos( $filter_month_search , '00') !== false || strpos( $filter_year_search , '00') !== false
						|| (strpos( $filter_month_search , $months_time) !== false && $filter_year_search == '' ) 
						|| (strpos( $filter_year_search , $year_time) !== false && $filter_month_search == '' ) || strpos( $destination_hidden , $tour_country) !== false || strpos( $destination_hidden , '00') !== false
						){ 
					?>
						<div class="package-list-item clearfix">
							<div class="image">
								<img src="<?php echo esc_url($images_tour_search); ?>" alt="<?php the_title(); ?>" />
								<div class="absolute-in-image">
									<div class="duration"><span><?php echo esc_attr($tour_single_info_duration); ?></span></div>
								</div>
							</div>
							
							<div class="content">
								<h5><?php the_title(); ?> <button class="btn"><i class="fa fa-heart-o"></i></button></h5>
								<div class="row gap-10">
									<div class="col-sm-12 col-md-9">
										
										<p class="line18"><?php echo get_post_meta( get_the_ID(), '_cmb_tour_single_subtitle', true ); ?></p>
										
										<ul class="list-info">
											<li><span class="icon"><i class="fa fa-map-marker"></i></span> <span class="font600"><?php echo esc_html__( 'Countries:', 'tourpacker' ); ?> </span> <?php echo get_post_meta(get_the_ID(),'_cmb_tour_info_country',true); ?></li>
											<li><span class="icon"><i class="fa fa-flag"></i></span> <span class="font600"><?php echo esc_html__( 'Starting Point:', 'tourpacker' ); ?></span> <?php echo get_post_meta(get_the_ID(),'_cmb_tour_info_start',true); ?></li>
											<li><span class="icon"><i class="fa fa-flag"></i></span> <span class="font600"><?php echo esc_html__( 'Ending Point:', 'tourpacker' ); ?></span> <?php echo get_post_meta(get_the_ID(),'_cmb_tour_info_end',true); ?></li>
										</ul>
										
									</div>
									<div class="col-sm-12 col-md-3 text-right text-left-sm">
										
										<div class="rating-wrapper">
											<div class="raty-wrapper">
												<div class="star-rating-12px" data-rating-score="<?php echo round ( $tour_medium, 2 ); ?>"></div> <span> / <?php echo esc_attr($tour_review_5 + $tour_review_4 + $tour_review_3 + $tour_review_2 + $tour_review_1); ?> <?php echo esc_html__( 'review', 'tourpacker' ); ?></span>
											</div>
										</div>
										
										<div class="hidden price"><?php echo esc_attr($theme_option['payment_setting_currency']); ?> <?php echo esc_attr($tour_related_number_price);?></div>
										
										<a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm"><?php echo esc_html__( 'view', 'tourpacker' ); ?></a>
										
									</div>
								</div>
							</div>
							
						</div>
					<?php 
					 $i++;}
					
					endwhile;endif;
					if($i==0){
					?>
					<div class="alert alert-danger"><?php echo esc_html__('No Result.Please Check Query That You Want Search', 'tourpacker'); ?></div>
					<?php	
					} ?>	
						
					</div>

					<div class="pager-wrappper clearfix">
	
						<div class="pager-innner">
						
							<div class="flex-row flex-align-middle">
									
								<div class="flex-column flex-sm-12">
									
								</div>
								
								<div class="flex-column flex-sm-12">
									<nav class="pager-right">
										<ul class="pagination">
											<?php //tourpacker_pagination(); ?>
										</ul>
									</nav>
								</div>
							
							</div>
							
						</div>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		
	</div>
	

</div>
<!-- end Main Wrapper -->
<?php 
	// Get footer layout
	get_footer();
?>