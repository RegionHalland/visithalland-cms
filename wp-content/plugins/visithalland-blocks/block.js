// Our filter function
/*function addBackgroundProp(something) {
    //console.log("something", something, someOtherThing);
    //return something;
    //console.log("props", props);
    return Object.assign(something, { style: { backgroundColor: 'red' } });
}

// Adding the filter
wp.hooks.addFilter(
    'blocks.BlockEdit',
    'myplugin/add-background',
    addBackgroundProp
);*/

var paragraphBlock = wp.blocks.unregisterBlockType('core/paragraph');
var OriginalBlockEdit = paragraphBlock.edit;
var el = wp.element.createElement;
var Editable = wp.blocks.Editable;
paragraphBlock.edit = function (props) {
    console.log(props)
    return [
        el(OriginalBlockEdit, Object.assign(props, { key: 'original' })),
        el(Editable, {
            key: 'caption',
            className: 'my-caption',
            value: props.attributes.caption,
            onChange: function (value) {
                props.setAttributes({ caption: value });
            },
        }),
    ];
};
//console.log("paragraphBlock", paragraphBlock);
//paragraphBlock.attributes.fontSize = 137;
wp.blocks.registerBlockType('core/paragraph', paragraphBlock);