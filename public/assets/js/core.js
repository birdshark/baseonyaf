//绑定系统方法
$.extend($.fn,{
	validate:function(options){
		$.yxb.validator(this[0],options);
	}
});
//构造函数
$.yxb.validator = function(form,options){
	$.extend(true,{},this.validator.setting,options)
	this.currentForm = form;
	this.init();
}

$.extend($.yxb.validator,{
	//默认设置
	defaluts :{
		rule:{},


	},
	message:{

	},
	prototype:{
		//初始化方法
		init:function(){

		}
	},
	staticRules:function() {

	},
	methods:{
		required :function(){

		},
	}

});