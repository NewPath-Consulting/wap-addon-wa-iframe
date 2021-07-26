/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
 import { registerBlockType } from '@wordpress/blocks';

 /**
  * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
  * All files containing `style` keyword are bundled together. The code used
  * gets applied both to the front of your site and to the editor.
  *
  * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
  */
 import './style.scss';
 
 /**
  * Internal dependencies
  */
 import Edit from './edit';
 import save from './save';
 
 /**
  * Every block starts by registering a new block type definition.
  *
  * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
  */
 registerBlockType( 'wawp/wawp-addon-wa-iframe', {
	 attributes: {
		 domain_name: {
			 type: 'string',
			 default: 'newpathconsulting'
		 },
		 widget_url: {
			 type: 'string',
			 default: 'widget/member-forum',
		 },
		 height: {
			 type: 'string',
			 default: '900px'
		 },
		 width: {
			 type: 'string',
			 default: '100%'
		 },
		 name: {
			 type: 'string',
			 default: ''
		 }
	 },
	 /**
	  * @see ./edit.js
	  */
	 edit: Edit,
 
	 /**
	  * @see ./save.js
	  */
	 save,
 } );

export default function generateiFrame(attributes) {
	var url = "https://" + attributes.domain_name + ".wildapricot.org";
	return (            
		<React.Fragment>
			<iframe
				width={attributes.width}
				height={attributes.height}
				src={url + "/" + attributes.widget_url}
				className={"wawp " + attributes.name}
				frameborder={'no'}
				sandbox={"allow-same-origin allow-scripts allow-popups allow-forms"}
				onload={'tryToEnableWACookies("' + url + '");'}
			></iframe>
			<script
				type="text/javascript" 
				language="javascript" 
				src={url + "/Common/EnableCookies.js"}>
			</script>
		</React.Fragment>
	);
}