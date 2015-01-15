(function( factory ) {
    if ( typeof define === "function" && define.amd ) {
        define( ["jquery"], factory );
    } else {
        factory( jQuery );
    }
}(function( $ ) {
    $.extend({yxb:{}});//定义jq下的yxb命名空间
    $.extend($.fn, {
        // http://jqueryvalidation.org/validate/
        validate: function( options ) {//options为设置可以在外部定义
            // check if a validator for this form was already created
            var validator = $.data( this[ 0 ], "validator" );
            if ( validator ) {
                return validator;
            }
            validator = new $.yxb.validator( options, this[ 0 ] );
            return validator;
        }
    });//定义jq的新的成员函数

    // constructor for validator  构造函数
    $.yxb.validator = function( options, form ) {
        this.settings = $.extend( true, {}, $.yxb.validator.defaults, options );
        this.currentForm = form;
        this.init();
    };
    $.extend( $.yxb.validator, {
        defaults: {
            rules:{}
        },
        prototype: {
            init: function () {
                alert("xxxx");
                console.log(this);
                $.yxb.validator.methods['required'].call();
            }
        },
        methods:{
            // http://jqueryvalidation.org/required-method/
            required: function( value, element, param ) {
                // check if dependency is met
                if ( !this.depend( param, element ) ) {
                    return "dependency-mismatch";
                }
                if ( element.nodeName.toLowerCase() === "select" ) {
                    // could be an array for select-multiple or a string, both are fine this way
                    var val = $( element ).val();
                    return val && val.length > 0;
                }
                if ( this.checkable( element ) ) {
                    return this.getLength( value, element ) > 0;
                }
                return $.trim( value ).length > 0;
            },
            required:function(){
                console.log("xxxx");
            }
        }
    });
}));