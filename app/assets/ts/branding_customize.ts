/// <reference path="jquery.d.ts" />

namespace LolitaFramework {
    export class BrandingCustomize {
        /**
         * WordPress API
         * @type {any}
         */
        api: any = null;

        /**
         * Data
         * @type {any}
         */
        data: any = null;

        /**
         * Constructor
         */
        constructor() {
            this.api  = (<any>window).wp.customize;
            this.data = (<any>window).branding;

            jQuery(document).on(
                'click',
                '#accordion-panel-login_page_branding > h3',
                (e:any) => this.click(e)
            );
        }

        /**
         * Click event
         * @param {any} e [description]
         */
        click(e:any) {
            console.log('click');
            this.api.previewer.previewUrl(this.data.login_url);
        }
    }

    (<any>window).LolitaFramework.branding_customize = new BrandingCustomize();
}
