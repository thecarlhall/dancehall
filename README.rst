==================================================
What to know about writing a plugin for WP-RESTful
==================================================

Installation
------------
Installation of a WP-RESTful plugin is the same as a standard WordPress plugin
because it is a WP plugin.

Writing A WP-RESTful Plugin
---------------------------
Writing a plugin for WP-RESTful requires writing a class to do the work and
registering the plugin with WP-RESTful. WP-RESTful handles the routing that is
to be expected with working with a RESTful service. For information on this,
take a look at the microformat_.

WP-RESTful operates as a read-only service provider; a plugin's "get" methods
are all that are called.

Plug Into WP-RESTful
--------------------

1.	Plugin should install itself on activation and uninstall itself on
	deactivation.
1.1	Installation includes add plugin name to active plugins list:

	function wpr_categories_install() {
		// get a handle to the active plugins
		$wpr_plugins = get_option("wpr_plugins");
		if(!is_array($wpr_plugins))
			$wpr_plugins = array();

		// Add our plugin as active
		$wpr_plugins['categories'] = "wp-restful-categories";
		update_option("wpr_plugins",$wpr_plugins);
	}
	add_action('activate_'.plugin_basename(__FILE__), 'wpr_categories_install');

1.2	Uninstallation includes removing plugin name from active plugins list:

	function wpr_categories_uninstall() {
		// get a handle to the active plugins
		$wpr_plugins = get_option("wpr_plugins");
		if(!is_array($wpr_plugins))
			$wpr_plugins = array();

		// Remove this plugin as active
		$wpr_active_plugins = array_diff($wpr_plugins,array("wp-restful-categories"));
		update_option("wpr_plugins",$wpr_active_plugins);
	}
	add_action('deactivate_'.plugin_basename(__FILE__), 'wpr_categories_uninstall');

2.	Register with WP-RESTful by calling `wpr_add_plugin` and passing it a method
	that will describe your admin entry.

	function wpr_categories_fields() {
		return array('Categories' => array(
			'cat_ID' => 'Category ID',
			'name' => 'Category Name',
			'description' => 'Category Description',
			'parent' => 'Category Parent (ID)',
			'count' => 'Category Usage Count',
			'slug' => 'Category Slug (nice name)'
		));
	}
	wpr_add_plugin('wpr_categories_fields');

3.	Register your plugins pluralization if applicable.

	function wpr_category_pluralization() {
		return array('category' => 'categories');
	}
	wpr_add_pluralization('wpr_category_pluralization');

Extend WPAPIRESTController
--------------------------
The work horse of all this will be a class that extends the rest controller base
class.

Links
-----
.. _microformat: http://microformats.org/wiki/rest