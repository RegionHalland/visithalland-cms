<?php
global $KcSeoWPSchema;
$settings    = get_option( $KcSeoWPSchema->options['main_settings'] );
?>
<div class="wrap">
	<div id="upf-icon-edit-pages" class="icon32 icon32-posts-page"><br/></div>
	<h2><?php _e( 'Schema Settings', KCSEO_WP_SCHEMA_SLUG ); ?></h2>
	<form id="kcseo-main-settings" >

		<table width="40%" cellpadding="10" class="form-table">
            <tr class="default">
                <th>Business / Org Schema</th>
                <td align="left" scope="row">
                    <?php  $dd = !empty($settings['site_schema']) ? $settings['site_schema'] : 'home_page'; ?>
                    <input type="radio" <?php echo ($dd == 'home_page' ? 'checked' : null); ?> name="site_schema" value="home_page" id="site_schema_home"><label for="site_schema_home">Home page only</label><br>
                    <input type="radio" <?php echo ($dd == 'all' ? 'checked' : null); ?> name="site_schema" value="all" id="site_schema_all"><label for="site_schema_all">Sitewide (Apply General Settings schema sitewide)</label>
                </td>
            </tr>
            <tr class="default">
                <th>Delete all data</th>
                <td align="left" scope="row">
                    <?php  $dd = !empty($settings['delete-data']) ? "checked" : null; ?>
                    <input type="checkbox" <?php echo $dd; ?> name="delete-data" value="1" id="delete-data"><label for="delete-data">Enable</label>
                    <p class="description">This will delete all schema created and applied by this plugin when plugin is deleted.</p>
                </td>
            </tr>
		</table>
		<p class="submit"><input type="submit" name="submit" id="tlpSaveButton" class="button button-primary"
		                         value="<?php _e( 'Save Changes', KCSEO_WP_SCHEMA_SLUG ); ?>"></p>

		<?php wp_nonce_field( $KcSeoWPSchema->nonceText(), '_kcseo_nonce' ); ?>
	</form>
	<div id="response"></div>
</div>