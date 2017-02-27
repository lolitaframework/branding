/// <reference path="jquery.d.ts" />

namespace LolitaFramework {
    export class Branding {

        /**
         * Ajax helper
         * @type {any}
         */
        ajax: any = null;

        /**
         * Timeout handler
         * @type {any}
         */
        handler: any = null;

        /**
         * Search item template
         * @type {any}
         */
        tmpl: any = null;

        /**
         * Login form
         * @type {any}
         */
        $b_login_form: any = null;

        /**
         * Login form message
         * @type {any}
         */
        $b_login_form__message: any = null;

        /**
         * Login form message inner
         * @type {any}
         */
        $b_login_form__message_inner: any = null;


        /**
         * Lost password form
         * @type {any}
         */
        $b_lost_password_form: any = null;

        /**
         * Lost password form message
         * @type {any}
         */
        $b_lost_password_form__message: any = null;

        /**
         * Lost password form message inner
         * @type {any}
         */
        $b_lost_password_form__message_inner: any = null;

        /**
         * Registration form
         * @type {any}
         */
        $b_registration_form: any = null;

        /**
         * Registration form message
         * @type {any}
         */
        $b_registration_form__message: any = null;

        /**
         * Registration form message inner
         * @type {any}
         */
        $b_registration_form__message_inner: any = null;

        /**
         * Constructor
         */
        constructor() {
            this.ajax = (<any>window).wp.ajax;
            this.initLogin();
            this.initLostPassword();
            this.initRegistration();

            jQuery('.lost-password-message-show-up').show();
        }

        /**
         * Init login form
         */
        initLogin()
        {
            var me:any = this;

            this.$b_login_form = jQuery('#login-form');
            if(!this.$b_login_form.length) {
                return false;
            }
            this.$b_login_form.find('#user_login').focus();
            this.$b_login_form__message = jQuery('.b-login-form__message');
            this.$b_login_form__message_inner = jQuery('.b-login-form__message-inner div');

            this.$b_login_form.validate({
                debug: false,
                errorClass: "b-login-form__input--error",
                rules: {
                    user_login: "required",
                    user_password: "required"
                },
                invalidHandler: function(event:any, validator:any) {
                    var errors = validator.numberOfInvalids();
                    if (errors) {
                        var message = '<strong>ERROR:</strong> You missed ' + errors + ' fields. They have been highlighted';
                        me.$b_login_form__message_inner.html(message);
                        me.$b_login_form__message.show();
                    } else {
                        me.$b_login_form__message.hide();
                    }
                },
                submitHandler: function(form:any) {
                    me.login(form);
                },
            });
        }

        /**
         * Init lost password form
         */
        initLostPassword() {
            var me:any = this;

            this.$b_lost_password_form = jQuery('#lost-password-form');
            if(!this.$b_lost_password_form.length) {
                return false;
            }
            this.$b_lost_password_form.find('#user_login').focus();
            this.$b_lost_password_form__message = this.$b_lost_password_form.find('.b-login-form__message:not(.lost-password-message-show-up)');
            this.$b_lost_password_form__message_inner = this.$b_lost_password_form__message.find('.b-login-form__message-inner div');

            this.$b_lost_password_form.validate({
                debug: false,
                errorClass: "b-login-form__input--error",
                rules: {
                    user_login: "required"
                },
                invalidHandler: function(event:any, validator:any) {
                    var errors = validator.numberOfInvalids();
                    if (errors) {
                        var message = '<strong>ERROR:</strong> You missed ' + errors + ' fields. They have been highlighted';
                        me.$b_lost_password_form__message_inner.html(message);
                        me.$b_lost_password_form__message.show();
                    } else {
                        me.$b_lost_password_form__message.hide();
                    }
                },
                submitHandler: function(form:any) {
                    me.lostPassword(form);
                },
            });
        }

        /**
         * Init registration form
         */
        initRegistration() {
            var me:any = this;

            this.$b_registration_form = jQuery('#registration-form');
            if(!this.$b_registration_form.length) {
                return false;
            }
            this.$b_registration_form.find('#user_login').focus();
            this.$b_registration_form__message = this.$b_registration_form.find('.b-login-form__message:not(.lost-password-message-show-up)');
            this.$b_registration_form__message_inner = this.$b_registration_form__message.find('.b-login-form__message-inner div');

            this.$b_registration_form.validate({
                debug: false,
                errorClass: "b-login-form__input--error",
                rules: {
                    user_login: "required",
                    user_email: "required"
                },
                invalidHandler: function(event:any, validator:any) {
                    var errors = validator.numberOfInvalids();
                    if (errors) {
                        var message = '<strong>ERROR:</strong> You missed ' + errors + ' fields. They have been highlighted';
                        me.$b_registration_form__message_inner.html(message);
                        me.$b_registration_form__message.show();
                    } else {
                        me.$b_lost_password_form__message.hide();
                    }
                },
                submitHandler: function(form:any) {
                    me.registration(form);
                },
            });
        }

        /**
         * Login
         * @param {any} form
         */
        login(form:any) {
            var promise: any, data: any, e:any;

            data = {
                action: 'branding_login',
                nonce: (<any>window).lolita_framework.LF_NONCE,
                user_login: form.user_login.value,
                user_password: form.user_pass.value,
                remember: form.rememberme.checked
            };

            if('' === data.user_login) {
                return false;
            }

            promise = this.ajax.post(data);
            promise.done((response:any) => this.loginDone(response));
            promise.fail((response:any) => this.loginFail(response));
        }

        /**
         * Login promise done
         * @param {any} response
         */
        loginDone(response:any) {
            (<any>window).location = (<any>window).lolita_framework.ADMIN_URL;
        }

        /**
         * Login promise fail
         * @param {any} response
         */
        loginFail(response:any) {
            this.$b_login_form__message_inner.html(response);
            this.$b_login_form__message.show();
        }

        /**
         * Lost password
         * @param {any} form
         */
        lostPassword(form:any) {
            var promise: any, data: any, e:any;

            data = {
                action: 'branding_lost_password',
                nonce: (<any>window).lolita_framework.LF_NONCE,
                user_login: form.user_login.value
            };

            if('' === data.user_login) {
                return false;
            }

            promise = this.ajax.post(data);
            promise.done((response:any) => this.lostPasswordDone(response));
            promise.fail((response:any) => this.lostPasswordFail(response));
        }

        /**
         * Lost password promise fail
         * @param {any} response
         */
        lostPasswordFail(response:any) {
            this.$b_lost_password_form__message_inner.html(response);
            this.$b_lost_password_form__message.show();
        }

        /**
         * Login promise done
         * @param {any} response
         */
        lostPasswordDone(response:any) {
            (<any>window).location = (<any>window).branding.login_url + "?checkmail=confirm";
        }

        /**
         * Registration
         * @param {any} form
         */
        registration(form:any) {
            var promise: any, data: any, e:any;

            data = {
                action: 'branding_registration',
                nonce: (<any>window).lolita_framework.LF_NONCE,
                user_login: form.user_login.value,
                user_email: form.user_email.value
            };

            if('' === data.user_login) {
                return false;
            }

            promise = this.ajax.post(data);
            promise.done((response:any) => this.registrationDone(response));
            promise.fail((response:any) => this.registrationFail(response));
        }

        /**
         * Lost password promise fail
         * @param {any} response
         */
        registrationFail(response:any) {
            this.$b_registration_form__message_inner.html(response);
            this.$b_registration_form__message.show();
        }

        /**
         * Login promise done
         * @param {any} response
         */
        registrationDone(response:any) {
            (<any>window).location = (<any>window).branding.login_url + "?checkmail=registered";
        }
    }

    (<any>window).LolitaFramework.branding = new Branding();
}
