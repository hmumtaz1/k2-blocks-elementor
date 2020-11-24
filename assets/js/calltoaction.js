
class CallToActionHandler extends elementorModules.frontend.handlers.Base{

    getDefaultSettings(){
        return {
            selectors: {
                heading: '.heading',
                image: '.img-control',
            },
        };
    }
    getDefaultElements() {
        const selectors = this.getSettings( 'selectors' );
        return {
            $heading: this.$element.find( selectors.heading ),
            $image: this.$element.find( selectors.image ),
        };
    }

    bindEvents() {
        this.elements.$image.on('click', this.onHeadingClick.bind(this));
    }
    onHeadingClick(){
        console.log(this.elements.$heading);
    }

}

jQuery( window ).on( 'elementor/frontend/init', () => {
    const addHandler = ( $element ) => {
        elementorFrontend.elementsHandler.addHandler( CallToActionHandler, {
            $element,
        } );
    };

    elementorFrontend.hooks.addAction( 'frontend/element_ready/calltoaction.default', addHandler );
} );
