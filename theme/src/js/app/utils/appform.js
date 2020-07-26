import { CommonHelper } from './common.helper';
import { langEN } from './lang/en';

class AppForm {
    
    constructor($form) {

        this.$form = $form;

        this.isValid = false;

        this.options = {
            submitType : 'default',
            callbacks : {
                submit : false
            }
        }

    }

    init(options){

        if(typeof(options) == 'object'){
            if(typeof(Object.assign) == 'function'){
                Object.assign(this.options, options);
            } else {
                $.extend(this.options, options);
            }
        }
        
        this.$form.on('submit', (ev) => {

            if(!this.isValid){
                ev.preventDefault();
                this.validateAndSubmit();
            } else {
                if(typeof(this.options.callbacks.submit) == 'function'){
                    ev.preventDefault();
                    this.options.callbacks.submit();
                }
            }

        });

    }

    validateAndSubmit(){

        let _obj = this;
        let error_count = 0;
        _obj.$form.find(langEN.classes.error).removeClass(langEN.classes.error);
        _obj.$form.find('input[required], textarea[required], select[required]').each(function(){

            let val = $(this).val();
            if(CommonHelper.stringIsEmpty(val) && ($(this).attr('type') != 'hidden') ){
                $(this).addClass(langEN.classes.error).parent().addClass(langEN.classes.error);
                error_count++;
            }

            else if(( ($(this).attr('type') === 'hidden') && $(this).val() == 0)){
                $(this).parent().addClass(langEN.classes.error).parent().addClass(langEN.classes.error);
                error_count++;
            }

            else {
                $(this).removeClass(langEN.classes.error).parent().removeClass(langEN.classes.error).parent().removeClass(langEN.classes.error);
            }

        }).promise().done(function(){

            _obj.$form.find('input[type="email"]').each(function(){

                let val = $(this).val();
                if(!CommonHelper.isValidEmail(val)){
                    $(this).addClass(langEN.classes.error).parent().addClass(langEN.classes.error);
                    error_count++;
                } else {
                    $(this).removeClass(langEN.classes.error).parent().removeClass(langEN.classes.error);
                }
    
            }).promise().done(function(){

                if(error_count === 0){
                    _obj.isValid = true;
                    _obj.$form.submit();
                }

            });

        });

    }

    submit(){

        this.$form.submit();

    }

}

export { AppForm };