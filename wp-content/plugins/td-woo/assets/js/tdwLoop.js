var tdwLoop={};
(function(){tdwLoop={items:[],init:function(){tdwLoop.items=[]},item:function(){this.loadType=this.jqueryObj=this.blockAtts=this.blockUid=void 0;this._is_initialized=this.inComposer=!1},_initialize_item:function(c){!0!==c._is_initialized&&(jQuery(document).on("td_woo_filters_ajax_block_update",function(b,g,d){b=tdBlocks.tdGetBlockObjById(c.blockUid);var a=JSON.parse(b.atts);if("undefined"!==typeof d.tdwFilterItemBlockAtts)var f=JSON.parse(d.tdwFilterItemBlockAtts);a.category="";a.tag="";a.td_woo_attributes_filters=
{};a.td_woo_attributes_filters_ms={};d=new URLSearchParams(window.location.search);var e={};"undefined"!==typeof a.current_term&&"undefined"!==typeof a.current_term_tax&&("product_cat"!==a.current_term_tax||d.has("tdw_product_cat")||(a.category+=a.current_term),"product_tag"!==a.current_term_tax||d.has("tdw_product_tag")||(a.tag+=a.current_term),-1===a.current_term_tax.indexOf("pa_")||d.has("tdw_"+a.current_term_tax)||(a.td_woo_attributes_filters["tdw_"+a.current_term_tax]=a.current_term));d.forEach(function(a,
b){e[b]=a});0<Object.keys(e).length&&jQuery.each(e,function(b,c){-1!==b.indexOf("tdw_")?("tdw_product_cat"===b&&(a.category=""===a.category?c:a.category+(","+c)),"tdw_product_tag"===b&&(a.tag=c),-1!==b.indexOf("pa_")&&(a.td_woo_attributes_filters[b]=c,"undefined"!==typeof f&&"undefined"!==f[b.replace("tdw_pa_","")+"_multiple_selection"]&&"yes"===f[b.replace("tdw_pa_","")+"_multiple_selection"]&&(a.td_woo_attributes_filters_ms[b.replace("tdw_","")]="yes"))):("orderby"===b&&(a.sort=c),"s"===b&&(a.s=
c))});b.atts=JSON.stringify(a);jQuery(this).hasClass("ajax-filter-disabled")||!0===b.is_ajax_running||(b.is_ajax_running=!0,b.td_current_page=1,tdBlocks.tdAjaxDoBlockRequest(b,"tdw_filter"))}),c._is_initialized=!0)},addItem:function(c){if("undefined"===typeof c.blockUid)throw"item.blockUid is not defined";tdwLoop.items.push(c);tdwLoop._initialize_item(c)},deleteItem:function(c){for(var b=0;b<tdwLoop.items.length;b++)if(tdwLoop.items[b].blockUid===c)return tdwLoop.items.splice(b,1),!0;return!1}}})();
jQuery().ready(function(){tdwLoop.init();jQuery(document).on("td_woo_ajax_block_update",function(c,b,g,d){c=jQuery.parseJSON(d);d=jQuery("."+b.id);var a=JSON.parse(b.atts);"tdw_filter"===g&&(b.found_posts=parseInt(c.total),b.post_count=parseInt(c.per_page),b.td_current_page=parseInt(c.current_page));g=a.ajax_pagination?a.ajax_pagination:"";var f=a.offset?parseInt(a.offset):0;f=parseInt(b.found_posts)-f;var e=parseInt(b.post_count);var h=parseInt(b.td_current_page);0===f?(a="No results to count",d.addClass("tdc-no-posts")):
(d.removeClass("tdc-no-posts"),b=e*h-e+1,e=Math.min(f,e*h),a="load_more"===a.ajax_pagination||"infinite"===a.ajax_pagination?"Showing 1 &ndash; "+e+" of "+f+" results":b===e?"Showing the "+e+" result of "+f+" results":"Showing "+b+" &ndash; "+e+" of "+f+" results");d.find(".tdw-result-count p").html(a);"numbered"===g&&"undefined"!==c.td_num_pagination_data&&(a=d.find(".page-nav"),a.length?a.replaceWith(c.td_num_pagination_data):d.append(c.td_num_pagination_data))})});