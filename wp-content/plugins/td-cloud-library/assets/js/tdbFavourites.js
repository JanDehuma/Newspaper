var tdbFavourites={};
(function(){tdbFavourites={selector:".tdb-favorite",cookieId:"tdb_favourites",cookieLifeTime:31536E7,items:[],init:function(){jQuery(tdbFavourites.selector).each(function(a){a=jQuery(a);tdbFavourites.addItem({$obj:a,prodId:a.data("post-id")})});jQuery("body").on("click",tdbFavourites.selector,function(a){var d=jQuery(a.currentTarget),c=d.data("post-id"),b=td_read_site_cookie(tdbFavourites.cookieId);a=0;"undefined"!==typeof b&&null!==b&&(a=b.split(",").filter(Boolean).length);jQuery(tdbFavourites.selector+
'[data-post-id="'+c+'"]').toggleClass("tdb-favorite-selected");d.hasClass("tdb-favorite-selected")?("undefined"!==typeof b&&null!==b?(b=b.split(","),-1===b.indexOf(c.toString())&&(b.push(c),td_set_cookies_life([tdbFavourites.cookieId,b.join(","),tdbFavourites.cookieLifeTime]))):td_set_cookies_life([tdbFavourites.cookieId,c,tdbFavourites.cookieLifeTime]),a++):("undefined"!==typeof b&&null!==b&&(b=b.split(","),d=b.indexOf(c.toString()),-1<d&&b.splice(d,1),td_set_cookies_life([tdbFavourites.cookieId,
b.join(","),tdbFavourites.cookieLifeTime])),a--);b=jQuery(".tdb-wmf-count");b.length&&b.text(a)}).on("click",'.td-del-book-btn[data-bookmark-type="tdb"]',function(a){a.preventDefault();a=td_read_site_cookie(tdbFavourites.cookieId);"undefined"!==typeof a&&null!==a&&(td_delete_site_cookie(tdbFavourites.cookieId),jQuery(tdbFavourites.selector).removeClass("tdb-favorite-selected"),a=jQuery(".tdb-wmf-count"),a.length&&a.text("0"))})},item:function(){},addItem:function(a){var d=new tdbFavourites.item,c=
!0;c&&"undefined"!==typeof a.$obj?d.$obj=a.$obj:c=!1;c&&tdbFavourites.items.push(d)}}})();jQuery().ready(function(){tdbFavourites.init()});
