/// <reference path="jquery.d.ts" />
var LolitaFramework;
(function (LolitaFramework) {
    var BrandingCustomize = (function () {
        /**
         * Constructor
         */
        function BrandingCustomize() {
            var _this = this;
            /**
             * WordPress API
             * @type {any}
             */
            this.api = null;
            /**
             * Data
             * @type {any}
             */
            this.data = null;
            this.api = window.wp.customize;
            this.data = window.branding;
            jQuery(document).on('click', '#accordion-panel-login_page_branding > h3', function (e) { return _this.click(e); });
        }
        /**
         * Click event
         * @param {any} e [description]
         */
        BrandingCustomize.prototype.click = function (e) {
            console.log('click');
            this.api.previewer.previewUrl(this.data.login_url);
        };
        return BrandingCustomize;
    }());
    LolitaFramework.BrandingCustomize = BrandingCustomize;
    window.LolitaFramework.branding_customize = new BrandingCustomize();
})(LolitaFramework || (LolitaFramework = {}));
