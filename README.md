# wordpress-seo-plugin
A Wordpress plugin that let's the Buildout plugin use path routing. By default, the plugin will use query parameters to perform it's routing, but sometimes search engines can struggle with indexing routes that include query parameters. By using this plugin, we can remove the need to use query parameters which results in more consistent indexing.

**Example:**

Without the plugin, a plugin route might be `https://my-site.com/inventory?propertyId=123-Fake-St-Sale`

With the plugin, we can use path routes `https://my-site.com/inventory/123-Fake-St-Sale`


# Installation

## Step 1: Install and Activate
This plugin can be distributed as a zip file.

Simply upload the zip as a new plugin in your wordpress instance.

![Screen Shot 2022-06-14 at 2 42 08 PM](https://user-images.githubusercontent.com/222549/173674882-16c8b7ab-2219-4c55-8452-7f57f42c6086.png)

Once installed, activate the plugin from the plugin settings.

## Step 2: Configure the Settings
Once the plugin is activated, there will be some new settings under Settings > General.

**Plugin Path:** This is the path that the plugin is installed under. For instance, if the plugin is installed at `https://my-site.com/inventory`, then set this to `/inventory`.

**Plugin Page Id:** This is the post or page id that the plugin is installed at. Use the screenshot below to see an example of how you can find this id. In the example below, you would set this value to `10`

![Screen Shot 2022-06-14 at 3 45 42 PM](https://user-images.githubusercontent.com/222549/173675810-0fb02841-4f03-46fb-a0aa-3209cd631477.png)
