var HWR=(function(){function init(){(function hys_scroll_to_block(){$('[data-scroll-tag]').each(function(){$(this).on('mouseup',function(event){event.preventDefault();var dataScroll=$('[data-scroll]');var dataScrollTag=$(this);dataScroll.each(function(){if(dataScrollTag.attr('data-scroll-tag')===$(this).attr('data-scroll')){$("html, body").animate({scrollTop:$(this).offset().top-120},500,'swing');}})})})})();(function hys_sticky_sidebars(){hys_sticky('.sticky',112);})();(function hys_init_carousel(){var carousel=$('.carousel');carousel.carousel();var offset=0;var hasSlidestoLoad=true;var ytPlayer='<iframe id="youtube-player" '+'width="100%" '+'height="600" '+'class="youtube-frame" '+'src="//www.youtube.com/embed/"'+ +'"?rel=0&amp;showinfo=0&amp;enablejsapi=1" '+'frameborder="0" '+'allowfullscreen></iframe>';carousel.find('#reference-next').on('mouseup',function(){return;if(hasSlidestoLoad){console.log('kek');var domain=$(location).attr('protocol')+'//'+$(location).attr('hostname')+'/wp-admin/admin-ajax.php?';var url=domain+(window.location.href.split('?').pop()!==window.location.href?window.location.href.split('?').pop():'');$.ajax({type:'GET',url:url,cache:true,data:{action:'hys_REFERENCEAjax',offset:offset,limit:1},success:function(data){console.log(data);if(data.trim()===''){hasSlidestoLoad=false;return;}else{$('.carousel-inner').append('<div class="item">'+data+'</div>');carousel.carousel('next');}},error:function(MLHttpRequest,textStatus,errorThrown){console.log('Error: ',errorThrown);}});offset++;}})})();(function hys_soundcloud_onplay(){var sPlayer=$('#soundcloud-player');sPlayer.on('click',function(){$(this).css({'z-index':2})})})();}
return init();})();var HWRMain=(function(){function init(){(function hys_init_hubspot_select(){$('.industry-select').removeClass('hidden').multiselect();})();}
return init();})();var HWRMenu=(function(){function init(){(function hys_toggle_menu(){$('.menu-toggle').on('mouseup',function(){$(this).toggleClass('active');$('#header').toggleClass('active');$('.navbar-brand').toggleClass('invisible');$('.mobile-menu').toggleClass('active');$('html').toggleClass('overflowed');})})();(function hys_show_header_on_scroll_top(){var lastScrollTop=0;var header=$('#header');var headerHeight=header.height();var headerLogo=header.find('img');var headerLogoWhite=header.find('img.white');var body=$('body');var panel=$('.sticky-panel');var firstBlock=$('.main-jumbotron');var overlay=$('.background-overlay');panel.stick_in_parent();if(body.hasClass('home')){var posBottomMain=firstBlock.position().top+firstBlock.outerHeight(true)-120;header_toggle_onscroll(posBottomMain,true);}else{header_toggle_onscroll(50);}
function header_toggle_onscroll(position,homePageFlag){$(window).scroll(function(){var st=$(this).scrollTop();overlay.css({'filter':'blur('+st*.05+'px)'});if(st>=position){header.addClass('header-transition');if(homePageFlag){headerLogo.removeClass('hidden');headerLogoWhite.addClass('hidden');}
if(st>lastScrollTop){header.removeClass('header-fixed').css('top','-100%');panel.css('top',0);}else{header.addClass('header-fixed').css('top',0);panel.css('top',headerHeight);}}else{if(homePageFlag){headerLogo.addClass('hidden');headerLogoWhite.removeClass('hidden');header.removeClass('header-fixed header-transition');}}
lastScrollTop=st;return false;});}})();}
return init();})();var HWRForms=(function(){function init(){(function hys_floating_labels(){var input=$('.form-group-floating input');var textarea=$('.form-group-floating textarea');function check_input_value(input){input.keyup(function(){var $this=$(this);var group=$this.closest('.form-group-floating');if(!$.trim(this.value).length){group.removeClass('active');}else{group.addClass('active');}});}
check_input_value(input);check_input_value(textarea);})();(function hys_form_validation(){var form=$('form');if(form){form.each(function(){$(this).on('submit',function(e){var $this=$(this);var valid=true;$this.find('.tooltip').html('');var required=$this.find('[required]');if(required){required.each(function(){var $this=$(this);if($this.prop('id')==='email'){var emailInput=$this.prop('id');}
if($this.prop('id')==='phone'){var phoneInput=$this.prop('id');}
if($this.prop('type')==='checkbox'){var checkboxInput=$this;}
var emailPattern=new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,'i');var phonePattern=new RegExp(/^(?:\+\d{2})?\d{10}(?:,(?:\+\d{2})?\d{10})*$/,'i');if(emailInput&&!emailPattern.test($this.val())){valid=false;$this.closest('.form-group').addClass('error').find('.tooltip').html($this.attr('data-unvalid'));}
if(phoneInput&&!phonePattern.test($this.val())){valid=false;$this.closest('.form-group').addClass('error').find('.tooltip').html($this.attr('data-unvalid'));}
if(!$this.val()||(checkboxInput&&!$this.prop('checked'))){valid=false;$this.closest('.form-group').addClass('error').find('.tooltip').html('Field cannot be empty');}}).on('mouseup',function(){var formGroup=$(this).closest('.form-group');if(formGroup.hasClass('error')){formGroup.removeClass('error');}});}
var checkboxGroup=$(this).find('.checkbox-wrap');if(checkboxGroup){$(this).find('.checkbox-wrap').on('mouseup',function(){var $this=$(this);if($this.hasClass('error')&&!$this.find('input[type="checkbox"]').prop('checked')){$this.removeClass('error');}});}
if(valid===false){e.preventDefault();}else{if($this.prop('id')==='contact-form'){e.preventDefault();$.ajax({type:'POST',url:'/wp-json/contact/v1/save',data:{action:'hys_ContactAjax',data:$('#contact-form').serializeArray()},cache:true,success:function(data){$('#contact-form').html('<div class="col-xs-12"><h3 class="success-submit">Thank you for submitting!</h3></div>');},error:function(MLHttpRequest,textStatus,errorThrown){console.log(errorThrown);}});return false;}
if($this.prop('id')==='reference-form'){e.preventDefault();$.ajax({type:'POST',url:'https://api.hsforms.com/submissions/v3/integration/submit/4886828/31099931-13b3-4165-98b7-4495d1e7466c',cache:true,dataType:"json",contentType:"application/json",data:JSON.stringify({"fields":[{"name":"email","value":$('#email').val()},{"name":"phone","value":$('#phone').val()},{"name":"industries","value":$('#industry').val()}]}),success:function(data){$('#reference-form').html('<div class="col-xs-12"><h3 class="success-submit">Thank you for submitting!</h3></div>');},error:function(MLHttpRequest,textStatus,errorThrown){console.log(errorThrown);}});return false;}}});})}})();(function hys_autoresize_textarea(){var textarea=$('textarea');function autoresize_textarea(textarea){textarea.style.height='auto';textarea.style.height=(textarea.scrollHeight)+'px';}
textarea.each(function(){this.setAttribute('style','height:'+(this.scrollHeight)+'px');}).on('input',function(){autoresize_textarea(this);});$(window).on('resize',function(){textarea.each(function(){autoresize_textarea(this);});});})();(function hys_toggle_search_form(){var $form=$('#search-form');$form.find('.btn-icon').on('mouseup',function(){$(this).closest('#search-form').toggleClass('active');});$form.find('input').on('keypress',function(event){var $this=$(this);if(event.which===13){if($this.val().replace(/\s/g,'').length){event.preventDefault();$form.submit();}else{event.preventDefault();}}});})();}
return init();})();var HWRSuccessCases=(function(){function init(){(function hys_success_cases_filtration(){var casesHref=window.location.protocol+'//'+window.location.hostname+window.location.pathname;if(window.location.href===casesHref||window.location.href.match(/industry=0$/)){$('#industry').find('[data-name="0"]').addClass('active');}
$('#industry').find('.tag').on('mouseup',function(){var param;var $this=$(this);if(window.location.href.indexOf("?")>-1){param='&industry='+$(this).attr('data-name');}else{param='?industry='+$(this).attr('data-name');}
window.location.href=window.location.href+param;});hys_init_select('.technology-select');})();}
return init();})();var HWRBlog=(function(){function init(){(function hys_blog_filtration(){hys_init_select('.date-select');hys_init_select('.industry-select');})();(function hys_sticky_blog(){hys_sticky($('.main-page').find('.sticky-top'),50,1200);})();(function hys_hide_whitepaper_part(){var content=$('.content-description');var contentMarkup=$('.content-description').html();if(content.length){content.html(contentMarkup.substring(0,contentMarkup.length/2));}})();}
return init();})();var HWRIndustries=(function(){function init(){(function hys_toggle_industry_description(){var toggleBtn=$('.toggle-description');var description=toggleBtn.prev('div');toggleBtn.on('mouseup',function(){console.log($(this));if(description.hasClass('hidden')){description.removeClass('hidden');toggleBtn.html('Read Less');}else{description.addClass('hidden');toggleBtn.html('Read More');}})})();}
return init();})();var HWRCareer=(function(){function init(){(function hys_init_career(){$('.vacancies-select').removeClass('hidden').multiselect();})();}
return init();})();function hys_inifite_loading(action,size,total,usedIds,param,isInfiniteLoad){if(typeof(action)==='undefined'||action===null){action='';}
if(typeof(size)==='undefined'||size===null){size=0;}
if(typeof(usedIds)==='undefined'||usedIds===null){usedIds=[];}
if(typeof(total)==='undefined'||total===null){total=0;}
var domain;if(param){domain=$(location).attr('protocol')+'//'+$(location).attr('hostname')+'/wp-admin/admin-ajax.php?type='+param;}else{domain=$(location).attr('protocol')+'//'+$(location).attr('hostname')+'/wp-admin/admin-ajax.php?';}
if(isInfiniteLoad){domain+='&types=all';}
var url=domain+(window.location.href.split('?').pop()!==window.location.href?window.location.href.split('?').pop():'');var state='inactive';var initialLimit=8;var limit=4;var offset=initialLimit;var loadButton=$('.ajax-call-message').find('button');var windowWidth=$(window).width();function load_data(offset,limit){if(total===0){$('.ajax-call').append('<div class="col-xs-12"><h3>No data</h3></div>');$('.loader-placeholder').addClass('hidden');loadButton.addClass('hidden');return;}
if(state==='active'){return;}
$.ajax({type:'GET',url:url,data:{action:action,offset:offset,limit:limit,size:size,used_ids:usedIds},success:function(data){if(data.trim()===''){$('.ajax-call-message').find('button').addClass('hidden');$('.loader-placeholder').addClass('hidden');state='active';}else{$('.ajax-call').append(data);$('.loader-placeholder').addClass('hidden');state='inactive';}},error:function(MLHttpRequest,textStatus,errorThrown){if(!offset){$('.ajax-call').append('<div class="col-xs-12"><h3>'+errorThrown+'</h3></div>');}
state='active';$('.loader-placeholder').addClass('hidden');}});}
if(state==='inactive'){load_data(0,initialLimit);}
function detect_loading_type(){if(windowWidth>=768){desktop_loading();}}
function desktop_loading(){if(total>initialLimit){$(window).scroll(function(){if($(window).scrollTop()+$(window).height()>$('.ajax-call').height()&&state==='inactive'&&total>offset){subsequent_loading();}});}}
(function mobile_loading(){if(total<initialLimit||total<offset){loadButton.addClass('hidden');return;}
loadButton.on('click',function(){if(state==='inactive'&&total!==0){subsequent_loading();if(total<offset+limit){loadButton.addClass('hidden');}}});})();function subsequent_loading(){load_data(offset,limit);$('.loader-placeholder').removeClass('hidden');state='active';offset+=limit;}
$(window).resize(function(){detect_loading_type();if(total<initialLimit||total<offset){loadButton.addClass('hidden');}});detect_loading_type();}
function hys_init_select(selector){$(selector).removeClass('hidden').on('change',function(){var param;var $this=$(this);if(window.location.href.indexOf("?")>-1){param='&'+$this.attr('id')+'='+$this.val();}else{param='?'+$this.attr('id')+'='+$this.val();}
window.location.href=window.location.href+param;}).multiselect();}
function hys_init_tabs(size,usedIds,total,isInfiniteLoad){$('.tabs').each(function(){var $this=$(this);var $active=$this.find('.active');var $hr=$this.find('hr');console.log($active);function calculate_hr_width(){$hr.css({'width':$active.outerWidth(),'left':$active.position().left});}
calculate_hr_width();$(window).on('resize',function(){calculate_hr_width();});if(isInfiniteLoad){hys_inifite_loading('hys_BLOGAjax',0,total,usedIds,0,isInfiniteLoad);}else{load_content();}
function load_content(param){if(!param){param=0;}
var domain=$(location).attr('protocol')+'//'+$(location).attr('hostname')+'/wp-admin/admin-ajax.php?type='+param+'&';var url=domain+(window.location.href.split('?').pop()!==window.location.href?window.location.href.split('?').pop():'');var offset=0;var limit=3;var size=2;var state='inactive';$.ajax({type:'GET',url:url,data:{action:'hys_BLOGAjax',offset:offset,limit:limit,size:size,used_ids:usedIds},success:function(data){$('.blog .ajax-call').append(data);$('.blog .loader-placeholder').addClass('hidden');state='active';},error:function(MLHttpRequest,textStatus,errorThrown){state='active';$('.blog .loader-placeholder').addClass('hidden');}});if(state==='inactive'){$('.blog .loader-placeholder').removeClass('hidden');}}
$this.on('mouseup','button',function(){var param=$(this).attr('id');$active=$(this);$(this).addClass('active').siblings().removeClass('active');calculate_hr_width();$('.blog .ajax-call').html('');$('.blog .loader-placeholder').removeClass('hidden');if(isInfiniteLoad){hys_inifite_loading('hys_BLOGAjax',0,total,usedIds,param,isInfiniteLoad);}else{load_content(param);}})})}
function hys_sticky(selector,offset,breakpoint){var windowWidth=$(window).width();if(!offset){offset=0;}
if(!breakpoint){breakpoint=768;}
if(windowWidth<breakpoint){$(selector).trigger('sticky_kit:detach');}else{make_sticky();}
$(window).resize(function(){windowWidth=$(window).width();if(windowWidth<breakpoint){$(selector).trigger('sticky_kit:detach');}else{make_sticky();}});function make_sticky(){$(selector).stick_in_parent({offset_top:offset});}};