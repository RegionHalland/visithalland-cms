<?php
global $KcSeoWPSchema;
$settings    = get_option( $KcSeoWPSchema->options['settings'] );
$schemaModel = new KcSeoSchemaModel;
?>
<div class="wrap">
	<div id="upf-icon-edit-pages" class="icon32 icon32-posts-page"><br/></div>
	<h2><?php _e( 'WP SEO Structured Data Schema', KCSEO_WP_SCHEMA_SLUG ); ?></h2>
	<form id="kcseo-option-settings">

		<h3><?php _e( 'General settings for WP SEO Structured Data Schema by <a href="http://kcseopro.com/">KCSEOPro.com</a>',
				KCSEO_WP_SCHEMA_SLUG ); ?></h3>
		<div class="setting-holder">
			<table width="40%" cellpadding="10" class="form-table">
				<tr class="default">
					<th>Website Url <span class="required">*</span></th>
					<td align="left" scope="row">
						<div class="with-tooltip">
							<input type="text" class="regular-text" name="web_url"
							       value="<?php echo( ! empty( $settings['web_url'] ) ? esc_attr( $settings['web_url'] ) : get_home_url() ); ?>"/>
							<div class="schema-tooltip-holder">
								<span class="schema-tooltip"></span>
								<div class="hidden">
									<p><b>Tip:</b> For more detailed information on how to configure this plugin, please
										visit:
										<a href="http://kcseopro.com/wordpress-seo-structured-data-schema-plugin/">http://kcseopro.com/wordpress-seo-structured-data-schema-plugin/</a>
									</p>
								</div>
							</div>
						</div>
					</td>
				</tr>
				<tr class="default">
					<th>Type</th>
					<td align="left" scope="row">
						<select id="site_type" name="site_type" class="select2">
							<option value="">Select one type</option>
							<?php
							$siteType = ! empty( $settings['site_type'] ) ? $settings['site_type'] : null;
							foreach ( $schemaModel->site_type() as $site ) {
								$slt = ( $site == $siteType ? "selected" : null );
								echo "<option value='$site' $slt>$site</option>";
							}
							?>
						</select>
					</td>
				</tr>
				<tr class="default">
					<th>Organization or Business name</th>
					<td align="left" scope="row">
						<input type="text" class="regular-text" name="type_name"
						       value="<?php echo( ! empty( $settings['type_name'] ) ? $settings['type_name'] : null ); ?>"/>
					</td>
				</tr>
				<tr class="default all-type-data">
					<th>Site Image <span class="required">*</span></th>
					<td align="left" scope="row">
						<div class="kSeo-image">
							<div class="kSeo-image-wrapper">
								<?php
								$siteImageId = ! empty( $settings['site_image'] ) ? absint( $settings['site_image'] ) : 0;
								$siteImage   = $ingInfo = null;
								if ( $siteImageId ) {
									$siteImage = wp_get_attachment_image( $siteImageId, "thumbnail" );
									$imgData   = $KcSeoWPSchema->imageInfo( $siteImageId );
									$ingInfo .= "<span><strong>URL: </strong>{$imgData['url']}</span>";
									$ingInfo .= "<span><strong>Width: </strong>{$imgData['width']}px</span>";
									$ingInfo .= "<span><strong>Height: </strong>{$imgData['height']}px</span>";
								}
								?>
								<span class="kSeoImgAdd"><span class="dashicons dashicons-plus-alt"></span></span>
								<span class="kSeoImgRemove <?php echo( $siteImageId ? null : "kSeo-hidden" ); ?>"><span
										class="dashicons dashicons-trash"></span></span>
								<div class="kSeo-image-preview"><?php echo $siteImage; ?></div>
								<input type="hidden" name="site_image" value="<?php echo $siteImageId; ?>"/>
							</div>
							<div class='image-info'><?php echo $ingInfo; ?></div>
						</div>
					</td>
				</tr>
				<tr class="default all-type-data">
					<th>Price Range <span class="required">*</span></th>
					<td align="left" scope="row">
						<input type="text" class="regular-text" name="site_price_range"
						       value="<?php echo( ! empty( $settings['site_price_range'] ) ? $settings['site_price_range'] : null ); ?>"/>
						<div class="description">The price range of the business, for example $$$.</div>
					</td>
				</tr>
				<tr class="default all-type-data">
					<th>Site Telephone <span class="required">*</span></th>
					<td align="left" scope="row">
						<input type="text" class="regular-text" name="site_telephone"
						       value="<?php echo( ! empty( $settings['site_telephone'] ) ? $settings['site_telephone'] : null ); ?>"/>
						<div class="description">The telephone number.</div>
					</td>
				</tr>
				<tr class="default">
					<th>Additional Type</th>
					<td align="left" scope="row">
						<div class="with-tooltip">
							<textarea name="additionalType"
							          placeholder="http://example1.com&#10;http://example2.com&#10;http://example3.com"
							          rows="6" cols="50"
							          class="additional-type"><?php echo( ! empty( $settings['additionalType'] ) ? esc_attr( @$settings['additionalType'] ) : null ); ?></textarea>
							<p class="description">Add "Additional Type" URL(s) by separate ideas</p>
							<div class="schema-tooltip-holder">
								<span class="schema-tooltip"></span>
								<div class="hidden">
									<p><b>Tip:</b> Product Ontology is an extension to schema using WikiPedia
										definitions that enables you to further define a type by adding an
										“AdditionalType” attribute.Example for a Tailor (which is not available as a
										schema “Type”): Pick LocalBusiness as a generic Type, then add additional type
										as follows:
										<a href="https://en.wikipedia.org/wiki/Tailor">https://en.wikipedia.org/wiki/<span>Tailor</span></a>
										Change to this format and enter in Additional Type field:
										<a href="http://www.productontology.org/id/Tailor">http://www.productontology.org/id/<span>Tailor</span></a>
										For more info visit:<a href="http://kcseopro.com/product-ontology-schema/">http://kcseopro.com/product-ontology-schema/</a>
									</p>
								</div>
							</div>
						</div>
					</td>
				</tr>

				<tr class="default business-info">
					<th style="font-size: 18px; padding: 30px 0 5px;">Others local business info</th>
				</tr>
				<tr class="default business-info">
					<th>Description</th>
					<td align="left" scope="row">
						<textarea cols="50" rows="6"
						          name="business_info[description]"><?php echo( ! empty( $settings['business_info']['description'] ) ? esc_attr( $settings['business_info']['description'] ) : null ); ?></textarea>
					</td>
				</tr>
				<tr class="default business-info">
					<th>Operation Hours</th>
					<td align="left" scope="row">
						<div class="with-tooltip">
							<textarea name="business_info[openingHours]"
							          placeholder="Mo-Sa 11:00-14:30&#10;Mo-Th 17:00-21:30&#10;Fr-Sa 17:00-22:00"
							          rows="4" cols="50"
							          class="additional-type"><?php echo( ! empty( $settings['business_info']['openingHours'] ) ? esc_attr( $settings['business_info']['openingHours'] ) : null ); ?></textarea>
							<p class="description">- Days are specified using the following two-letter combinations: Mo,
								Tu, We, Th, Fr, Sa, Su.</br>
								- Times are specified using 24:00 time. For example, 3pm is specified as 15:00. <br>
								- Add Opening Hours by separate line</p>
							<div class="schema-tooltip-holder">
								<span class="schema-tooltip"></span>
								<div class="hidden">
									<p>
										<b>Tip:</b> Once you save these structured data schema settings, validate your
										home page url here:
										<a href="https://developers.google.com/structured-data/testing-tool/">https://developers.google.com/structured-data/testing-tool/</a>
									</p>
								</div>
							</div>
					</td>
				</tr>
				<tr class="default business-info">
					<th style="font-size: 16px;">GeoCoordinates</th>
				</tr>
				<tr class="default business-info">
					<th style="text-align: right">Longitude</th>
					<td align="left" scope="row">
						<input type="text" class="regular-text" name="business_info[longitude]"
						       value="<?php echo( ! empty( $settings['business_info']['longitude'] ) ? esc_attr( $settings['business_info']['longitude'] ) : null ); ?>"/>
					</td>
				</tr>
				<tr class="default business-info">
					<th style="text-align: right">Latitude</th>
					<td align="left" scope="row">
						<input type="text" class="regular-text" name="business_info[latitude]"
						       value="<?php echo( ! empty( $settings['business_info']['latitude'] ) ? esc_attr( $settings['business_info']['latitude'] ) : null ); ?>"/>
					</td>
				</tr>


				<tr class="default person">
					<th style="font-size: 18px; padding: 30px 0 5px;">Person</th>
				</tr>
				<tr class="default person">
					<th>Name</th>
					<td align="left" scope="row">
						<input type="text" class="regular-text" name="person[name]"
						       value="<?php echo( ! empty( $settings['person']['name'] ) ? esc_attr( $settings['person']['name'] ) : null ); ?>"/>
					</td>
				</tr>
				<tr class="default person">
					<th>Work For</th>
					<td align="left" scope="row">
						<input type="text" class="regular-text" name="person[worksFor]"
						       value="<?php echo( ! empty( $settings['person']['worksFor'] ) ? esc_attr( $settings['person']['worksFor'] ) : null ); ?>"/>

					</td>
				</tr>
				<tr class="default person">
					<th>Job Title</th>
					<td align="left" scope="row">
						<input type="text" class="regular-text" name="person[jobTitle]"
						       value="<?php echo( @$settings['person']['jobTitle'] ? @$settings['person']['jobTitle'] : null ); ?>"/>

					</td>
				</tr>
				<tr class="default person">
					<th>Image</th>
					<td align="left" scope="row">
						<input type="text" class="regular-text" name="person[image]"
						       value="<?php echo( ! empty( $settings['person']['image'] ) ? esc_attr( $settings['person']['image'] ) : null ); ?>"/>
						<p class="description">Add your personal photo here</p>
					</td>
				</tr>
				<tr class="default person">
					<th>Description</th>
					<td align="left" scope="row">
						<input type="text" class="regular-text" name="person[description]"
						       value="<?php echo( ! empty( $settings['person']['description'] ) ? esc_attr( $settings['person']['description'] ) : null ); ?>"/>
					</td>
				</tr>
				<tr class="default person">
					<th>Birth date</th>
					<td align="left" scope="row">
						<input type="text" class="regular-text kcseo-date" name="person[birthDate]"
						       value="<?php echo( ! empty( $settings['person']['birthDate'] ) ? esc_attr( $settings['person']['birthDate'] ) : null ); ?>"/>

					</td>
				</tr>
				<tr class="default">
					<th style="font-size: 18px; padding: 30px 0 5px;">Address</th>
				</tr>
				<tr class="default">
					<th>Address Country</th>
					<td align="left" scope="row">
						<select class="select2" name="address[country]">
							<option value="">Select a country</option>
							<?php
							$aCountry = ! empty( $settings['address']['country'] ) ? $settings['address']['country'] : null;
							foreach ( $schemaModel->countryList() as $country ) {
								$slt = ( $country == $aCountry ? "selected" : null );
								echo "<option value='$country' $slt>$country</option>";
							}
							?>
						</select>
					</td>
				</tr>
				<tr class="default">
					<th>Address Locality</th>
					<td align="left" scope="row">
						<input type="text" class="regular-text" name="address[locality]"
						       value="<?php echo( ! empty( $settings['address']['locality'] ) ? esc_attr( $settings['address']['locality'] ) : null ); ?>"/>
						<p class="description">City (i.e Kansas city)</p>
				</tr>
				<tr class="default">
					<th>Address Region</th>
					<td align="left" scope="row">
						<input type="text" class="regular-text" name="address[region]"
						       value="<?php echo( ! empty( $settings['address']['region'] ) ? esc_attr( $settings['address']['region'] ) : null ); ?>"/>
						<p class="description">State (i.e. MO)</p>
				</tr>
				<tr class="default">
					<th>Postal Code</th>
					<td align="left" scope="row">
						<input type="text" class="regular-text" name="address[postalcode]"
						       value="<?php echo( ! empty( $settings['address']['postalcode'] ) ? esc_attr( $settings['address']['postalcode'] ) : null ); ?>"/>
				</tr>
				<tr class="default">
					<th>Street Address</th>
					<td align="left" scope="row">
						<input type="text" class="regular-text" name="address[street]"
						       value="<?php echo( ! empty( $settings['address']['street'] ) ? esc_attr( $settings['address']['street'] ) : null ); ?>"/>
				</tr>
			</table>
		</div>
		<div id="tabs-kcseo-container" class="rt-tab-container">
			<ul class="rt-tab-nav">
				<li class="current"><a href="#tab-logo-url">Organization Logo</a></li>
				<li><a href="#tab-social-profile">Social Profile</a></li>
				<li><a href="#tab-corporate-contract">Corporate Contacts</a></li>
			</ul>
			<div id="tab-logo-url" class="rt-tab-content">
				<table width="100%" cellpadding="10" class="form-table">
					<tr class="field_logo">
						<th>Select Organization Logo</th>
						<td scope="row" style="position: relative">
							<div class="kSeo-image">
								<div class="kSeo-image-wrapper">
									<?php
									$organizationLogoId = ! empty( $settings['organization_logo'] ) ? absint( $settings['organization_logo'] ) : null;
									$organizeImage      = $imgInfo = null;
									if ( $organizationLogoId ) {
										$organizeImage = wp_get_attachment_image( $organizationLogoId, "thumbnail" );
										$imgData       = $KcSeoWPSchema->imageInfo( $organizationLogoId );
										$imgInfo .= "<span><strong>URL: </strong>{$imgData['url']}</span>";
										$imgInfo .= "<span><strong>Width: </strong>{$imgData['width']}px</span>";
										$imgInfo .= "<span><strong>Height: </strong>{$imgData['height']}px</span>";
									}
									?>
									<span class="kSeoImgAdd"><span class="dashicons dashicons-plus-alt"></span></span>
									<span
										class="kSeoImgRemove <?php echo( $organizationLogoId ? null : "kSeo-hidden" ); ?>"><span
											class="dashicons dashicons-trash"></span></span>
									<div class="kSeo-image-preview"><?php echo $organizeImage; ?></div>
									<input type="hidden" name="organization_logo" value="<?php echo $organizationLogoId; ?>"/>
								</div>
								<div class='image-info'><?php echo $imgInfo; ?></div>
							</div>
                            <div class="schema-tooltip-holder" style="left: 200px">
                                <span class="schema-tooltip"></span>
                                <div class="hidden">
                                    <p><b>Tip:</b> For some Rich Snippets that use the image property, no dimensions are specified, For other Rich Snippets that use the image property, Google specifies at least 160x90 pixels and at most 1920x1080 pixels.  For Google Search, the documentation for their Rich Snippets is at
                                        <a href="https://developers.google.com/structured-data/rich-snippets/.">https://developers.google.com/structured-data/rich-snippets/.</a>
                                    </p>
                                </div>
                            </div>
						</td>
					</tr>
				</table>
			</div>
			<div id="tab-social-profile" class="rt-tab-content">
				<table width="100%" cellpadding="10" class="form-table">
					<tr class="field_social">
						<th>Company Name</th>
						<td align="left" scope="row">
							<input type="text" class="regular-text" name="social_company_name"
							       value="<?php echo( ! empty( $settings['social_company_name'] ) ? esc_attr( $settings['social_company_name'] ) : null ); ?>"/>
						</td>
					</tr>
					<tr class="field_social_title">
						<th style="font-size: 18px; padding: 10px 0;">Social Profiles</th>
					</tr>
					<tr class="social_field_link">
						<th>Social Profile</th>
						<th>
							<div id="social-field-holder">
								<?php
								$socialP = ( ! empty( $settings['social'] ) ? $settings['social'] : array() );
								if ( is_array( $socialP ) && ! empty( $socialP ) ) {
									$html = null;
									$i    = 0;
									foreach ( $socialP as $socialD ) {
										$html .= "<div class='sfield'>";
										$html .= "<select name='social[$i][id]'>";
										foreach ( $schemaModel->socialList() as $sId => $social ) {
											$slt = ( $sId == $socialD['id'] ? "selected" : null );
											$html .= "<option value='$sId' $slt>$social</option>";
										}
										$html .= "</select>";
										$html .= "<input type='text' name='social[$i][link]' value='{$socialD['link']}'>";
										$html .= '<span class="dashicons dashicons-trash social-remove"></span>';
										$html .= "</div>";
										$i ++;
									}
									echo $html;
								}
								?>
							</div>
							<a class="button button-primary add-new" id="social-add">Add Social Profile</a>
						</th>
					</tr>
				</table>
			</div>
			<div id="tab-corporate-contract" class="rt-tab-content">
				<table width="100%" cellpadding="10" class="form-table">
					<tr class="field_contact">
						<th style="font-size: 18px; padding: 10px 0;">Contacts</th>
					</tr>
					<tr class="field_contact">
						<th>Contact Type</th>
						<td scope="row">
							<select name="contact[contactType]" class="select2" style="width: 200px">
								<?php
								$contactType = ! empty( $settings['contact']['contactType'] ) ? $settings['contact']['contactType'] : null;
								foreach ( $schemaModel->contactType() as $cType ) {
									$slt = ( $cType == $contactType ? "selected" : null );
									echo "<option value='$cType' $slt>$cType</option>";
								}

								?>
							</select>
						</td>

					</tr>
					<tr class="field_contact">
						<th>Contact Phone</th>
						<td align="left" scope="row">
							<input type="text" class="regular-text" name="contact[telephone]"
							       value="<?php echo( ! empty( $settings['contact']['telephone'] ) ? esc_attr( $settings['contact']['telephone'] ) : null ); ?>"/>
							<p class="description kco-telephone">Please follow the format below<span
									style="font-size: 11px;">+1-505-998-3793</span><span style="font-size: 11px;">(425) 123-4567</span><span
									style="font-size: 11px;">( 33 1) 42 68 53 01</span><span style="font-size: 11px;">+44-2078225951</span><span
									style="font-size: 11px;">1 (855) 469-6378</span>
							</p>
						</td>
					</tr>
					<tr class="field_contact">
						<th>Contact Email</th>
						<td align="left" scope="row">
							<input type="text" class="regular-text" name="contact[email]"
							       value="<?php echo( ! empty( $settings['contact']['email'] ) ? sanitize_email( $settings['contact']['email'] ) : null ); ?>"/>
						</td>
					</tr>
					<tr class="field_contact">
						<th>Contact Option</th>
						<td align="left" scope="row">
							<select name="contact[contactOption]" class="select2 withEmptyOption" style="width: 200px">
								<option value="">Select an option</option>
								<option value="TollFree" <?php
								$cPtOpt = ! empty( $settings['contact']['contactOption'] ) ? $settings['contact']['contactOption'] : null;
								echo( $cPtOpt == "TollFree" ? "selected" : null ); ?>>TollFree
								</option>
								<option
									value="HearingImpairedSupported" <?php echo( $settings['contact']['contactOption'] == "HearingImpairedSupported" ? "selected" : null ); ?>>
									HearingImpairedSupported
								</option>
							</select>
						</td>
					</tr>
					<tr class="field_contact">
						<th>Area Served</th>
						<td align="left" scope="row">
							<div class="area_served_wrapper">
								<select id="area_served" class="select2" name="area_served[]" multiple="multiple"
								        style="width: 50%">
									<?php
									$areaServed = ! empty( $settings['area_served'] ) ? $settings['area_served'] : array();
									foreach ( $schemaModel->countryList() as $country ) {
										$slt = ( in_array( $country, $areaServed ) ? "selected" : null );
										echo "<option value='$country' $slt>$country</option>";
									}
									?>
								</select>
							</div>
						</td>
					</tr>
					<tr class="field_contact">
						<th>Available language</th>
						<td scope="row" class="lang">
							<select class="select2" name="availableLanguage[]" style="width: 50%" multiple="multiple">
								<?php
								$lanAvailable = ! empty( $settings['availableLanguage'] ) ? $settings['availableLanguage'] : array();
								foreach ( $schemaModel->languageList() as $language ) {
									$slt = ( in_array( $language, $lanAvailable ) ? "selected" : null );
									echo "<option value='$language' $slt>$language</option>";
								}
								?>
							</select>
						</td>
					</tr>
				</table>
			</div>
		</div>

		<h2>Site Name in Search Results</h2>
		<table width="100%" cellpadding="10" class="form-table">
			<tr class="default">
				<th>Enable Site link Search Box</th>
				<td align="left" scope="row">
					<input type="checkbox"
					       name="homeonly" <?php echo( ! empty( $settings['homeonly'] ) ? "checked" : null ); ?>
					       value="1"/>
				</td>
			</tr>
			<tr class="default">
				<th>Site Name:</th>
				<td align="left" scope="row">
					<input type="text" class="regular-text" name="sitename"
					       value="<?php echo( ! empty( $settings['sitename'] ) ? esc_attr( $settings['sitename'] ) : null ); ?>"/>
				</td>
			</tr>
			<tr class="default">
				<th>Site Alternative Name:</th>
				<td align="left" scope="row">
					<input type="text" class="regular-text" name="siteaname"
					       value="<?php echo( ! empty( $settings['siteaname'] ) ? esc_attr( $settings['siteaname'] ) : null ); ?>"/>
				</td>
			</tr>
			<tr class="default">
				<th>Site Url:</th>
				<td align="left" scope="row">
					<input type="text" class="regular-text" name="siteurl"
					       value="<?php echo( ! empty( $settings['siteurl'] ) ? esc_attr( $settings['siteurl'] ) : get_home_url() ); ?>"/>
				</td>
			</tr>
		</table>
		<p class="submit"><input type="submit" name="submit" id="tlpSaveButton" class="button button-primary"
		                         value="<?php _e( 'Save Changes', KCSEO_WP_SCHEMA_SLUG ); ?>"></p>

		<?php wp_nonce_field( $KcSeoWPSchema->nonceText(), '_kcseo_nonce' ); ?>
	</form>
	<div id="response"></div>
</div>
