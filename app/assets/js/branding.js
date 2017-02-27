var LolitaFramework;
(function (LolitaFramework) {
    var Branding = (function () {
        function Branding() {
            this.ajax = null;
            this.handler = null;
            this.tmpl = null;
            this.$b_login_form = null;
            this.$b_login_form__message = null;
            this.$b_login_form__message_inner = null;
            this.$b_lost_password_form = null;
            this.$b_lost_password_form__message = null;
            this.$b_lost_password_form__message_inner = null;
            this.$b_registration_form = null;
            this.$b_registration_form__message = null;
            this.$b_registration_form__message_inner = null;
            this.ajax = window.wp.ajax;
            this.initLogin();
            this.initLostPassword();
            this.initRegistration();
            jQuery('.lost-password-message-show-up').show();
        }
        Branding.prototype.initLogin = function () {
            var me = this;
            this.$b_login_form = jQuery('#login-form');
            if (!this.$b_login_form.length) {
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
                invalidHandler: function (event, validator) {
                    var errors = validator.numberOfInvalids();
                    if (errors) {
                        var message = '<strong>ERROR:</strong> You missed ' + errors + ' fields. They have been highlighted';
                        me.$b_login_form__message_inner.html(message);
                        me.$b_login_form__message.show();
                    }
                    else {
                        me.$b_login_form__message.hide();
                    }
                },
                submitHandler: function (form) {
                    me.login(form);
                }
            });
        };
        Branding.prototype.initLostPassword = function () {
            var me = this;
            this.$b_lost_password_form = jQuery('#lost-password-form');
            if (!this.$b_lost_password_form.length) {
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
                invalidHandler: function (event, validator) {
                    var errors = validator.numberOfInvalids();
                    if (errors) {
                        var message = '<strong>ERROR:</strong> You missed ' + errors + ' fields. They have been highlighted';
                        me.$b_lost_password_form__message_inner.html(message);
                        me.$b_lost_password_form__message.show();
                    }
                    else {
                        me.$b_lost_password_form__message.hide();
                    }
                },
                submitHandler: function (form) {
                    me.lostPassword(form);
                }
            });
        };
        Branding.prototype.initRegistration = function () {
            var me = this;
            this.$b_registration_form = jQuery('#registration-form');
            if (!this.$b_registration_form.length) {
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
                invalidHandler: function (event, validator) {
                    var errors = validator.numberOfInvalids();
                    if (errors) {
                        var message = '<strong>ERROR:</strong> You missed ' + errors + ' fields. They have been highlighted';
                        me.$b_registration_form__message_inner.html(message);
                        me.$b_registration_form__message.show();
                    }
                    else {
                        me.$b_lost_password_form__message.hide();
                    }
                },
                submitHandler: function (form) {
                    me.registration(form);
                }
            });
        };
        Branding.prototype.login = function (form) {
            var _this = this;
            var promise, data, e;
            data = {
                action: 'branding_login',
                nonce: window.lolita_framework.LF_NONCE,
                user_login: form.user_login.value,
                user_password: form.user_pass.value,
                remember: form.rememberme.checked
            };
            if ('' === data.user_login) {
                return false;
            }
            promise = this.ajax.post(data);
            promise.done(function (response) { return _this.loginDone(response); });
            promise.fail(function (response) { return _this.loginFail(response); });
        };
        Branding.prototype.loginDone = function (response) {
            window.location = window.lolita_framework.ADMIN_URL;
        };
        Branding.prototype.loginFail = function (response) {
            this.$b_login_form__message_inner.html(response);
            this.$b_login_form__message.show();
        };
        Branding.prototype.lostPassword = function (form) {
            var _this = this;
            var promise, data, e;
            data = {
                action: 'branding_lost_password',
                nonce: window.lolita_framework.LF_NONCE,
                user_login: form.user_login.value
            };
            if ('' === data.user_login) {
                return false;
            }
            promise = this.ajax.post(data);
            promise.done(function (response) { return _this.lostPasswordDone(response); });
            promise.fail(function (response) { return _this.lostPasswordFail(response); });
        };
        Branding.prototype.lostPasswordFail = function (response) {
            this.$b_lost_password_form__message_inner.html(response);
            this.$b_lost_password_form__message.show();
        };
        Branding.prototype.lostPasswordDone = function (response) {
            window.location = window.branding.login_url + "?checkmail=confirm";
        };
        Branding.prototype.registration = function (form) {
            var _this = this;
            var promise, data, e;
            data = {
                action: 'branding_registration',
                nonce: window.lolita_framework.LF_NONCE,
                user_login: form.user_login.value,
                user_email: form.user_email.value
            };
            if ('' === data.user_login) {
                return false;
            }
            promise = this.ajax.post(data);
            promise.done(function (response) { return _this.registrationDone(response); });
            promise.fail(function (response) { return _this.registrationFail(response); });
        };
        Branding.prototype.registrationFail = function (response) {
            this.$b_registration_form__message_inner.html(response);
            this.$b_registration_form__message.show();
        };
        Branding.prototype.registrationDone = function (response) {
            window.location = window.branding.login_url + "?checkmail=registered";
        };
        return Branding;
    }());
    LolitaFramework.Branding = Branding;
    window.LolitaFramework.branding = new Branding();
})(LolitaFramework || (LolitaFramework = {}));
//# sourceMappingURL=branding.js.map