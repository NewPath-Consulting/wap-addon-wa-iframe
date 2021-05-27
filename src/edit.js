/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-i18n/
 */
 import { __ } from '@wordpress/i18n';

 /**
  * React hook that is used to mark the block wrapper element.
  * It provides all the necessary props like the class name.
  *
  * @see https://developer.wordpress.org/block-editor/packages/packages-block-editor/#useBlockProps
  */
 
 import { TextControl } from '@wordpress/components';
  
 import {
	 useBlockProps,
	 ColorPalette,
	 InspectorControls,
 } from '@wordpress/block-editor';
 
 /**
  * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
  * Those files can contain any CSS code that gets applied to the editor.
  *
  * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
  */
 import './editor.scss';
 
 /**
  * The edit function describes the structure of your block in the context of the
  * editor. This represents what the editor will render when the block is used.
  *
  * @see https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#edit
  *
  * @return {WPElement} Element to render.
  */
 export default function Edit({attributes, setAttributes}) {
	 return (
		 <div { ...useBlockProps() }>
			 <InspectorControls key="setting">
				 <TextControl
					 label={'Widget URL'}
					 onChange={ (val) => setAttributes( { widget_url: val } ) }
					 value={attributes.widget_url}
					 placeholder={"Widget URL here"}
				 >
				 </TextControl>
				 <TextControl
					 label={'Height'}
					 onChange={ (val) => setAttributes( { height: val } ) }
					 value={attributes.height}
				 >
				 </TextControl>
				 <TextControl
					 label={'Width'}
					 onChange={ (val) => setAttributes( { width: val } ) }
					 value={attributes.width}
				 >
				 </TextControl>
				 <TextControl
					 label={'Name'}
					 onChange={ (val) => setAttributes( { name: val } ) }
					 value={attributes.name}
					 placeholder={"Name of Widget"}
				 >
				 </TextControl>
			 </InspectorControls>
			 <div {...useBlockProps.save()} >
				<iframe
					width={attributes.width}
					height={attributes.height}
					src={"https://resources.mcabc.org/" + attributes.widget_url}
					className={"wawp " + attributes.name}
					frameborder={'no'}
					sandbox={"allow-same-origin allow-scripts allow-popups allow-forms"}
				>
				</iframe>
		 	</div>

		 </div>
	 );
 }