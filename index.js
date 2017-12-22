/* global wp */
const { registerBlockType, Editable } = wp.blocks;

registerBlockType( 'markdown-block/markdown-block', {
	title: 'Markdown',
	icon: 'universal-access-alt', // todo: MD icon
	category: 'common',
	attributes: {
		content: {
			type: 'text',
		},
	},
	edit( { attributes, setAttributes, focus, setFocus } ) {
		const onChangeContent = content => setAttributes( { content } );
		return (
			<Editable
				onChange={ onChangeContent }
				value={ attributes.content }
				focus={ focus }
				onFocus={ setFocus }
			/>
		);
	},
	save: () => null,
} );
