# WildApricot Press Add-on - iFrame Widget Developer's Guide

#### By Natalie Brotherton

##### *Updated December 2022*

The iFrame Widget is one of the free Add-ons for WildApricot Press. It allows users to embed WildApricot gadgets in their websites with a Gutenberg Block.

Most of the functionality of this block is written with React, since Gutenberg operates on React. PHP is just used for required WordPress functionality.

This document will describe the structure and design of the plugin.

Note: this document must be referenced in tandem with the [WordPress Gutenberg Block documentation](https://developer.wordpress.org/block-editor/).

## Plugin files and basic structure
### `wap-addon-wa-iframe.php`
Like WAP, the iFrame widget has a main plugin file, `wap-addon-wa-iframe.php`, containing required header information and activation/deactivation functionality. 

### `src` files
All the React code required for the block lives within the `src` folder. The structure for this block was scaffolded using the [WP-CLI `create-block` tool](https://www.npmjs.com/package/@wordpress/create-block).

You can read official WordPress documentation [here](https://developer.wordpress.org/block-editor/getting-started/create-block/block-anatomy/) for more detail about Gutenberg block anatomy.

#### `index.js`
This is the main JavaScript file where the block configuration lives. You will see a function `registerBlockType` near the top containing metadata about the block.

We pass in the name of the block and its attributes. These attributes will be able to be configured in the block editor and are required for the block to function.

We also pass in the `Edit` and `save` functions from `edit.js` and `save.js` respectively.

This file also contains a function `generateiFrame` that uses the block attributes to build the actual iFrame element. This function is called both in `edit.js` and `save.js` to render the iFrame.

Read more in "How the block works" to learn more about its functionality.

#### `edit.js`
This file describes how the block should be rendered in the block editor. It uses WordPress's React components to build an interface for the editor settings. 

These settings directly change the block attributes.

#### `save.js`
The `save` function simply renders the block using the `generateiFrame` function. This is what WordPress will insert for the block in the post content when viewing a post or page with this block.

## Installation and use
In order to build the block code, you must have Node installed and a development environment set up. Read more [here](https://developer.wordpress.org/block-editor/getting-started/devenv/) about setting up a WordPress block development environment.

### `npm` commands
#### Install
* Install `npm` packages required for this project: **`npm install`**
#### Use
* Watch and build project files (development mode): **`npm run start`**
* Build project files (production mode): **`npm run build`**


## How the block works
Before contributing to this project, reading the WordPress Gutenberg Block documentation is highly recommended.

### Attributes
As described in the Plugin structure section, the block attributes are its internal data structure. Attributes can be accessed in the `Edit` and `save` functions for editing and rendering. Read more about Gutenberg block attributes [here](https://developer.wordpress.org/block-editor/reference-guides/block-api/block-attributes/).

The attributes for this block are just the necessary attributes for a HTML iFrame element.

#### `domain_name`
The domain of the WildApricot website for which the user wishes to display an iFrame. 

Its value by default is the NewPath WildApricot website.

#### `widget_url`
The URL of the WildApricot widget the user wishes to display in the iFrame. This URL is relative to the full domain URL. 

Its value by default is the member forum widget `widgets/member-forum`. 

See more about adding WildApricot widgets in the README file.

#### `height` and `width`
Describes dimensions of the iFrame. 

#### `name`
Optional custom class name for the iFrame element.


### Editor
The `Edit` function returns single `div` containing a WordPress React component, `InspectorControls`, that will render in the editor, as well as a second `div` that renders the iFrame in the post preview area. The function also takes in two arguments: `attributes`, containing the block's attributes, and `setAttributes`, a function that can be used to set an attribute.

The configuration for the block editor is pretty straightforward. Each attribute is mapped to a [`TextControl`](https://developer.wordpress.org/block-editor/reference-guides/components/text-control/) component (input box). For each `TextControl` component, the `onChange` prop calls `setAttributes` on the respective attribute to update it to its new value set by the user.

### Rendering the iFrame
As mentioned in the previous sections, the function `generateiFrame` defined in `index.js` controls rendering the iFrame across both the `Edit` and `save` functions. 

This function takes in the attributes as an argument and accesses each one to build the iFrame element. This essentially just involves plugging each block attribute in to their appropriate place in the iFrame element attributes.