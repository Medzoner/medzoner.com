(function($,window,document,undefined){"use strict";Foundation.libs.tab={name:"tab",version:"5.3.0",settings:{active_class:"active",callback:function(){},deep_linking:false,scroll_to_content:true,is_hover:false},default_tab_hashes:[],init:function(scope,method,options){var self=this,S=this.S;this.bindings(method,options);this.handle_location_hash_change();S("["+this.attr_name()+"] > .active > a",this.scope).each(function(){self.default_tab_hashes.push(this.hash)})},events:function(){var self=this,S=this.S;S(this.scope).off(".tab").on("click.fndtn.tab","["+this.attr_name()+"] > * > a",function(e){var settings=S(this).closest("["+self.attr_name()+"]").data(self.attr_name(true)+"-init");if(!settings.is_hover||Modernizr.touch){e.preventDefault();e.stopPropagation();self.toggle_active_tab(S(this).parent())}}).on("mouseenter.fndtn.tab","["+this.attr_name()+"] > * > a",function(e){var settings=S(this).closest("["+self.attr_name()+"]").data(self.attr_name(true)+"-init");if(settings.is_hover)self.toggle_active_tab(S(this).parent())});S(window).on("hashchange.fndtn.tab",function(e){e.preventDefault();self.handle_location_hash_change()})},handle_location_hash_change:function(){var self=this,S=this.S;S("["+this.attr_name()+"]",this.scope).each(function(){var settings=S(this).data(self.attr_name(true)+"-init");if(settings.deep_linking){var hash=self.scope.location.hash;if(hash!=""){var hash_element=S(hash);if(hash_element.hasClass("content")&&hash_element.parent().hasClass("tab-content")){self.toggle_active_tab($("["+self.attr_name()+"] > * > a[href="+hash+"]").parent())}else{var hash_tab_container_id=hash_element.closest(".content").attr("id");if(hash_tab_container_id!=undefined){self.toggle_active_tab($("["+self.attr_name()+"] > * > a[href=#"+hash_tab_container_id+"]").parent(),hash)}}}else{for(var ind in self.default_tab_hashes){self.toggle_active_tab($("["+self.attr_name()+"] > * > a[href="+self.default_tab_hashes[ind]+"]").parent())}}}})},toggle_active_tab:function(tab,location_hash){var S=this.S,tabs=tab.closest("["+this.attr_name()+"]"),anchor=tab.children("a").first(),target_hash="#"+anchor.attr("href").split("#")[1],target=S(target_hash),siblings=tab.siblings(),settings=tabs.data(this.attr_name(true)+"-init");if(S(this).data(this.data_attr("tab-content"))){target_hash="#"+S(this).data(this.data_attr("tab-content")).split("#")[1];target=S(target_hash)}if(settings.deep_linking){var cur_ypos=$("body,html").scrollTop();if(location_hash!=undefined){window.location.hash=location_hash}else{window.location.hash=target_hash}if(settings.scroll_to_content){if(location_hash==undefined||location_hash==target_hash){tab.parent()[0].scrollIntoView()}else{S(target_hash)[0].scrollIntoView()}}else{if(location_hash==undefined||location_hash==target_hash){$("body,html").scrollTop(cur_ypos)}}}tab.addClass(settings.active_class).triggerHandler("opened");siblings.removeClass(settings.active_class);target.siblings().removeClass(settings.active_class).end().addClass(settings.active_class);settings.callback(tab);target.triggerHandler("toggled",[tab]);tabs.triggerHandler("toggled",[target])},data_attr:function(str){if(this.namespace.length>0){return this.namespace+"-"+str}return str},off:function(){},reflow:function(){}}})(jQuery,window,window.document);