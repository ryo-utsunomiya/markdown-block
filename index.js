/* global wp */
const { registerBlockType, Editable } = wp.blocks;

/**
 * Convert content into JSX.
 * @param {array} content Gutenberg content.
 * @returns {array} JSX rendered Gutenberg content.
 */
const toJSX = content => {
	if ( ! Array.isArray( content ) ) {
		return [];
	}

	return content.map( line => {
		if ( typeof line === 'string' ) {
			return line;
		}
		if ( typeof line === 'object' ) {
			if ( line.type === 'br' ) {
				return <br />;
			}
		}
	} );
};

registerBlockType( 'markdown-block/markdown-block', {
	title: 'Markdown',
	icon: 'universal-access-alt', // todo: MD icon
	category: 'common',
	attributes: {
		content: {
			type: 'text',
		},
	},
	edit: ( { attributes, setAttributes, focus, setFocus } ) => {
		const onChange = content => {
			setAttributes( { content } );
		};
		return (
			<Editable
				onChange={ onChange }
				value={ toJSX( attributes.content ) }
				focus={ focus }
				onFocus={ setFocus }
			/>
		);
	},
	save: () => null,
} );
