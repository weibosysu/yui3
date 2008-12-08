<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>YUI Library Examples: MenuNav Node Plugin</title>

<?php
	if ($ydn) {
?>
		<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/combo?<?php echo $yuiCurrentVersion; ?>/build/cssreset/reset-min.css&<?php echo $yuiCurrentVersion; ?>/build/cssfonts/fonts-min.css&<?php echo $yuiCurrentVersion; ?>/build/cssgrids/grids-min.css&<?php echo $yuiCurrentVersion; ?>/build/cssbase/base-min.css">
<?php
	}
	else {
?>
		<link rel="stylesheet" type="text/css" href="<?php echo $buildDirectory; ?>cssreset/reset-min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $buildDirectory; ?>cssfonts/fonts-min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $buildDirectory; ?>cssgrids/grids-min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $buildDirectory; ?>cssbase/base-min.css">
<?php
	}
?>
		<link rel="stylesheet" type="text/css" href="<?php echo $assetsDirectory; ?>node-menunav-examples-base.css">

        <style type="text/css">

			/*
				Overide the values for border and padding specified for the content box of each 
				submenu in the Sam skin CSS.  The top and bottom borders are set to 0, since both 
				borders will be drawn by the background image used to create the rounded corners.  
				The top and bottom padding will be created by setting the height of each <div> 
				inside the <div class="yui-menu-corner">.
			*/

			#productsandservices .yui-menu .yui-menu-content {

				border-top: 0;
				border-bottom: 0;
				padding: 0;

			}

			.yui-menu-corner {

				margin-right: 4px;	/*	Reserve space for the top-right and bottom-right corners. */

				/* The background image (sprite) for the top-left and bottom-left corners. */
				background: url(<?php echo $assetsDirectory; ?>round.png) no-repeat;

			}
			
			.yui-menu-corner div {

				height: 4px;

				margin: 0 -4px 0 4px;	/*	Use a negative right margin to move the <div> into 
											the right margin of the parent element 
											(<div class="yui-menu-corner">) to draw the top-right 
											and bottom-right corners.

											Apply a left margin to reveal the background image 
											applied to the parent element for the top-left and 
											bottom-left corners. */
				
				/* The background image (sprite) for the top-right and bottom-right corners. */
				background: url(<?php echo $assetsDirectory; ?>round.png) no-repeat;

				_position: relative;	/*	Necessary to get negative margins working in IE 6 
											(Standards Mode and Quirks Mode and IE 7 (Quirks 
											Mode only). */

				_font-size: 0;	/*	Necessary to collapse the height of the <div> in IE 6 
									(Standards Mode and Quirks Mode and IE 7 (Quirks Mode only) so 
									that it renders at 4px tall.  */

			}

			/*
				Set the "background-position" property for the bottom-left, top-right, and 
				bottom-right corner elements to reveal the corresponding corner image.
			*/

			.yui-menu-corner-bl {

				background-position: left bottom;
							
			}

			.yui-menu-corner .yui-menu-corner-tr {

				background-position: top right;

			}

			.yui-menu-corner .yui-menu-corner-br {

				background-position: right bottom;

			}

        </style>

		<!-- YUI Seed -->
		<script type="text/javascript" src="<?php echo $buildDirectory; ?>yui/yui.js"></script>

		<script type="text/javascript">

			//	Call the "use" method, passing in "node-menunav".  This will load the 
			//	script and CSS for the MenuNav Node Plugin and all of the required 
			//	dependencies.

			YUI(<?php echo $yuiConfig ?>).use(<?php echo $requiredModules; ?>, function(Y) {

				//	Use the "contentready" event to initialize the menu when the subtree of 
				//	element representing the root menu (<div id="productsandservices">) is ready to 
				//	be scripted.

				Y.on("contentready", function () {
				
					this.plug(Y.plugin.NodeMenuNav);

					//	The scope of the callback will be a Node instance representing 
					//	the root menu (<div id="productsandservices">).  Therefore, since "this"
					//	represents a Node instance, use the "queryAll" method to retrieve the 
					//	Node instances representing each submenu.

					this.queryAll(".yui-menu").each(function (node) {

						//	Add decorator elements used to create the rounded corners to the 
						//	bounding box of each submenu.
					
						// Insert the first decorator before the submenu's content box
						node.insertBefore(Y.Node.create('<div class="yui-menu-corner yui-menu-corner-tl"><div class="yui-menu-corner-tr"></div></div>'), node.get("children").item(0));

						// Insert the second decorator after the submenu's content box
						node.appendChild(Y.Node.create('<div class="yui-menu-corner yui-menu-corner-bl"><div class="yui-menu-corner-br"></div></div>'));
					
					});

				}, "#productsandservices");

			});
		
		</script>

    </head>
    <body class="yui-skin-sam">

		<div class="yui-d0">					

			<h1>Header</h1>

			<div class="yui-t1">

				<div class="yui-main">
					<div class="yui-b">

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

						<form>

							<div>
								<label for="field-1">Field One</label>
								<input type="text" id="field-1" name="field-1">
							</div>

							<div>
								<label for="field-2">Field Two</label>
								<input type="text" id="field-2" name="field-2">
							</div>							

							<div>
								<label for="field-3">Field Three</label>
								<select id="field-3" name="field-3">
									<option value="1">Field Three - Option One</option>
									<option value="2">Field Three - Option Two</option>
									<option value="3">Field Three - Option Two</option>								
								</select>
							</div>

						</form>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

					</div>
				</div>
				<div class="yui-b">

					   <div id="productsandservices" class="yui-menu">
							<div class="yui-menu-content">
								<ul>
									<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://www.yahoo.com/">Home</a></li>
									<li>
										<a class="yui-menu-label" href="#connect">Connect</a>
										<div id="connect" class="yui-menu">
											<div class="yui-menu-content">
												<ul>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://developer.yahoo.com/">Developer Network</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://www.flickr.com">Flickr</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://www.jumpcut.com">Jumpcut</a></li>
													<li>
														<a class="yui-menu-label" href="#pim">PIM</a>
														<div id="pim" class="yui-menu">
															<div class="yui-menu-content">	

																<ul>
																	<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://mail.yahoo.com">Mail</a></li>
																	<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://www.zimbra.com">Zimbra</a></li>
																</ul>

																<ul>
																	<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://addressbook.yahoo.com">Address Book</a></li>
																	<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://calendar.yahoo.com">Calendar</a></li>
																	<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://notepad.yahoo.com">Notepad</a></li>
																</ul>
																
																<ul>
																	<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://messenger.yahoo.com">Messenger</a></li>
																</ul>
																
															</div>	
														</div>                    
													</li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://profiles.yahoo.com">Profiles</a> </li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://mobile.yahoo.com">Mobile</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://mybloglog.yahoo.com/">MyBlogLog</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://myweb2.search.yahoo.com/">MyWeb</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://pride.yahoo.com/">Pride</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://upcoming.yahoo.com/">Upcoming</a></li>
												</ul>	
											</div>
										</div>      
									</li>

									<li>
										<a class="yui-menu-label" href="#find-info">Find Info</a>
										<div id="find-info" class="yui-menu">
											<div class="yui-menu-content">
												<ul>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://answers.yahoo.com">Answers</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://babelfish.yahoo.com/">Babel Fish Translations</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://info.yahoo.com/">Company Info</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://search.yahoo.com/cc">Creative Commons Search</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://dir.yahoo.com/">Directory</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://hotjobs.yahoo.com/">Jobs</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://local.yahoo.com">Local</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://maps.yahoo.com/">Maps</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://realestate.yahoo.com">Real Estate</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://education.yahoo.com/reference/">Reference</a></li>
												</ul>
											</div>
										</div>      
									</li>

									<li>
										<a class="yui-menu-label" href="#lifestyles">Lifestyles</a>
										<div id="lifestyles" class="yui-menu">
											<div class="yui-menu-content">
												<ul>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://autos.yahoo.com">Autos</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://food.yahoo.com">Food</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://green.yahoo.com">Green</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://health.yahoo.com">Health</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://pets.yahoo.com/">Pets</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://pride.yahoo.com">Pride</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://shine.yahoo.com">Shine</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://tech.yahoo.com">Tech</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://travel.yahoo.com/">Travel</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://forgood.yahoo.com/index.html">Yahoo! for Good</a></li>
												</ul>	
											</div>
										</div>      
									</li>

									<li>
										<a class="yui-menu-label" href="#new-finance">News &#38; Finance</a>
										<div id="new-finance" class="yui-menu">
											<div class="yui-menu-content">
												<ul>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://buzz.yahoo.com/">Buzz</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://finance.yahoo.com">Finance</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://news.yahoo.com">News</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://next.yahoo.com">Next</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://publisher.yahoo.com">Publisher Network</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://sports.yahoo.com/">Sports</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://weather.yahoo.com/">Weather</a></li>
												</ul>	
											</div>
										</div>      
									</li>

									<li>
										<a class="yui-menu-label" href="#your-yahoo">Your Yahoo!</a>
										<div id="your-yahoo" class="yui-menu">
											<div class="yui-menu-content">
												<ul>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://edit.yahoo.com/config/eval_profile?.done">Account Information</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://alerts.yahoo.com/">Alerts</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://smallbusiness.yahoo.com/domains">Domains</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://www.flickr.com">Flickr</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://my.yahoo.com/">My Yahoo!</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://pipes.yahoo.com/">Pipes</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://toolbar.yahoo.com/">Toolbar</a></li>
												</ul>	
												<ul>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://bookmarks.yahoo.com/">Bookmarks</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://del.icio.us/">del.icio.us</a></li>
													<li class="yui-menuitem"><a class="yui-menuitem-content" href="http://myweb2.search.yahoo.com/">MyWeb</a></li>
												</ul>
											</div>
										</div>      
									</li>

								</ul>            
							</div>
						</div>

				</div>
			
			</div>

			<div id="footer">
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas sit amet metus. Nunc quam elit, posuere nec, auctor in, rhoncus quis, dui. Aliquam erat volutpat. Ut dignissim, massa sit amet dignissim cursus, quam lacus feugiat.</p>
			</div>
        
		</div>        
        
    </body>
</html>