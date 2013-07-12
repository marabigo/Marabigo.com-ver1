/**
 * 
 * 		title:		BEFORE/AFTER VIEWER - jQuery plugin
 * 
 *		author: 	Ovidiu Stefancu
 *					http:www.wpworks.net
 					
 *
 * 		info:		File available at http://codecanyon.net/user/wickedpixel
 * 
 * 		ver:		1.1 : 2011-May-18
 * 
 */
var WPW=WPW||{};(function($){var wpwBAgallery=function(theBody,options){var main=this;this.cfg=$.extend({},$.fn.wpwBAgallery.defaults,options);this.tb=$(theBody);this.currentIndex=0;this.currentItem;this.oldItem;this.items=[];this.nrItems=$('img',main.tb).length;this.footer;this.btnNext;this.btnPrev;this.tb.addClass('ba_gallery');this.infoBox=$("<div class='ba_info'><div class='ba_info_bg_l'></div><div class='ba_info_text'></div><div class='ba_info_bg_r'></div></div>");this.container=$("<div class='ba_container'></div>");this.mask=$("<div class='ba_mask'></div>");main.container.css('width',(main.nrItems*main.cfg.width)+"px");main.tb.append(main.mask);main.mask.append(main.container);main.mask.css('width',main.cfg.width+"px");main.mask.css('height',main.cfg.height+"px");main.tb.css('width',main.cfg.width+"px");if(main.cfg.alternateSkin==true)main.tb.addClass('skin2');$('img',main.tb).each(function(index){var img=$(this);var itemHolder=$("<div class='ba_item ba_"+index+"'></div>");main.container.append(itemHolder);itemHolder.append(img);var ba=new WPW.baViewer(itemHolder,main,index);main.items.push(ba);});if(main.nrItems>1){main.footer=$("<div class='ba_footer'><div class='ba_btn_prev'></div><div class='ba_btn_next'></div></div>");main.tb.append(main.footer);main.footer.css('width',main.cfg.width+"px");main.btnNext=$('.ba_btn_next',main.tb);main.btnPrev=$('.ba_btn_prev',main.tb);main.btnPrev.bind('click',function(){main.currentIndex--;if(main.currentIndex<0)main.currentIndex=main.nrItems-1;showCurrentItem();return false;});main.btnNext.bind('click',function(){main.currentIndex++;if(main.currentIndex>main.nrItems-1)main.currentIndex=0;showCurrentItem();return false;});}
function showCurrentItem(){var targetItem=main.items[main.currentIndex];var targetBody=targetItem.tb;main.currentItem=targetItem;var ease="easeInOutExpo";main.itemChangeBegin();main.container.animate({left:-targetBody.position().left},{duration:500,easing:ease,step:function(){},complete:function(){main.itemChangeEnd();}});}
this.itemChangeEnd=function(){main.oldItem=main.currentItem;main.currentItem.tb.trigger('SHOWBA');}
this.itemChangeBegin=function(){if(main.oldItem){main.oldItem.tb.trigger('HIDEBA');}
main.checkForInfo();}
this.checkForInfo=function(){if(main.currentItem.info)showInfo();else hideInfo();}
var infoOn=false;function showInfo(){if(!infoOn){infoOn=true;main.infoBox.hide();main.infoBox.fadeIn();if(main.footer)main.footer.append(main.infoBox);}
$('.ba_info_text',main.tb).html(main.currentItem.info);}
function hideInfo(){if(infoOn){infoOn=false;main.infoBox.fadeOut().detach();}}
showCurrentItem();};$.fn.wpwBAgallery=function(options){return this.each(function(){var element=$(this);if(element.data('wpwbagallery'))return;var wpwbagallery=new wpwBAgallery(this,options);element.data('wpwbaviewer',wpwbagallery);});};$.fn.wpwBAgallery.defaults={width:700,height:466,disableIntro:false,alternateSkin:false,};$.fn._reverse=[].reverse;})(jQuery);WPW.baViewer=function(theBody,owner,index){var main=this;this.tb=theBody;this.owner=owner;var firstLoad=true;var tW=main.owner.cfg.width;var tH=main.owner.cfg.height;this.tb.css('width',tW+"px");this.tb.css('height',tH+"px");this.img1=$('img:first',main.tb);this.img2;var path1=main.img1.attr('alt');var path2=main.img1.attr('src');if(!path1){path1=path2;path2="";}
this.info=main.img1.attr('title');if(path2.length<2)return;this.tb.bind("SHOWBA",function(){show();});this.tb.bind("HIDEBA",function(){hide();});var controller=$('<div class="ba_controller" />');var wall=$('<div class="ba_wall" />');var door=$('<div class="ba_door" />');controller.data("visRatio",0.5);controller.draggable({start:function(){updatePercent();controller.css('visibility',"hidden");},drag:function(){updatePercent();},stop:function(){updatePercent();controller.css('visibility',"visible");},axis:"x",containment:main.tb});function updatePercent(){var offset=controller.position();controller.data("visRatio",offset.left/(tW-controller.width()));updateDoor();}
var firstIntro=true;function introAnim(){firstIntro=false;var ease="easeInOutExpo";if(main.owner.cfg.disableIntro==true){$(controller.data()).delay(500).animate({visRatio:0.5},{duration:600,step:function(){updateDoor();},easing:ease,complete:function(){}});}else{$(controller.data()).delay(500).animate({visRatio:1},{duration:600,step:function(){updateDoor();},easing:ease,complete:function(){}}).animate({visRatio:0},{duration:600,step:function(){updateDoor();},easing:ease,complete:function(){}}).animate({visRatio:0.5},{duration:600,step:function(){updateDoor();},easing:ease,complete:function(){}});}}
var started=false;var secondImageLoaded=false;var loadSecondImage=function(){if(!firstLoad&&!secondImageLoaded){main.img2=$(new Image());main.img2.load(function(){wall.click(function(e){e.preventDefault();e.stopImmediatePropagation()
e.stopPropagation()
gotoPercent(e);main.img2.bind('click',function(){return false;})
return false;});onselectstart=function(){return false;}
secondImageLoaded=true;if(firstIntro)introAnim();show();}).error(function(){alert("Error:\nImage not found on this path: "+path2);secondImageLoaded=true;}).attr('src',path2);}}
var show=function(){if(!secondImageLoaded)loadSecondImage();if(!secondImageLoaded)return;main.img2.prependTo(door);door.appendTo(main.tb);wall.appendTo(main.tb);controller.appendTo(main.tb);wall.css('width',tW+"px");wall.css('height',tH+"px");door.hide();door.fadeIn();updateDoor();}
var hide=function(){door.fadeOut();}
function updateDoor(){var position=parseInt(controller.data("visRatio")*tW);door.css("left",position+"px");door.css("width",tW+"px");door.css("height",tH+"px");controller.css('top',parseInt(tH/2)-6+"px");controller.css('left',position-parseInt(controller.width()/2)+"px");if(main.img2)main.img2.css('left',-position-1+"px");}
function gotoPercent(e){var pos=e.pageX-main.tb.offset().left;var targetPercent=pos/tW;var ease="easeInOutExpo";$(controller.data()).delay(500).animate({visRatio:targetPercent},{duration:600,step:function(){updateDoor();},easing:ease,complete:function(){}});return false;}
main.img1.remove();main.img1=$(new Image());main.img1.load(function(){if(firstLoad){firstLoad=false;main.tb.prepend(main.img1);main.img1.bind('click',function(){return false;});show();}}).error(function(){alert("Error:\nImage not found on this path: "+main.img1.data('img_path'));}).attr('src',path1);}