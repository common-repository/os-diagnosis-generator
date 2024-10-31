<?php
class AddonDefaultClass {
	public function __construct()
	{
		add_action('in_admin_footer', ['AddonDefaultClass', 'actionAddonDefaultInit']);
		add_action('admin_menu', ['AddonDefaultClass', 'menuViewsAddon']);
	}
	// メニュー
	public static function menuViewsAddon()
	{
		add_submenu_page('diagnosis-generator-admin.php', 'アドオン', 'アドオン', 'administrator', 'diagnosis-generator-addon.php', ['AddonDefaultClass', 'defaultPage']);
	}
	// ヘッダーメニュー
	public static function actionAddonDefaultInit()
	{
?>
		<script>
		jQuery(function() {
			var addon_html = '<li><a href="admin.php?page=diagnosis-generator-addon.php">アドオン</a></li>';
			jQuery('ul.plugin-list').append(addon_html);
		});
		</script>
<?php
	}
	// ページ
	public static function defaultPage()
	{
?>
	<div id="diagnosis-plugin">
	<?php include(OSDG_PLUGIN_INCLUDE_FILES . "/admin-head.php"); ?>
		<div class="diagnosis-wrap">
			<a name="addon" id="addon"></a>
			<h2>アドオン</h2>
			<div class="diagnosis-contents">
				<p>アドオンを追加すると、機能を拡張できます。</p>
				詳しくは<a href="https://lp.olivesystem.jp/cart/plugindgladdon" target="_blank">こちら</a>にて
			</div>
		</div>
		<?php include(OSDG_PLUGIN_INCLUDE_FILES . "/admin-foot.php"); ?>
	</div>
<?php
	}
}
$addDefaultClass = new AddonDefaultClass();
