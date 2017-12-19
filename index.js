/* global wp */
wp.blocks.registerBlockType('markdown-block/markdown-block', {
    title: 'Markdown',
    icon: 'universal-access-alt', // todo: MD icon
    category: 'common',
    edit: () => <div>todo: SSR Markdown to HTML</div>,
    save: () => null,
});
