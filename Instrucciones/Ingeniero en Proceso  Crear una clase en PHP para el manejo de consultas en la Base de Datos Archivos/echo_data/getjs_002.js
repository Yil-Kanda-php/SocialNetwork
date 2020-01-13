(function(){
    /* jshint ignore:start */
    var pp_options={"cf":"300X250","tppg":"","asv":"30","esid":"","cwod":"","maOpts":{"enabled":false,"maxSeqNum":0,"periodMax":0,"periodMin":0,"rotatingPassback":false,"skipRotation":false},"epid":"","cn":"1","crtg":"","cp":"559988","ct":"429191","cu":"https://ads.contextweb.com/TagPublish/GetAd.aspx","cwfl":"","ccid":"","wp":"0","brk":"false","ca":"VIEWAD","cb":[558502,557219]};
    /* jshint ignore:end */
    window.pp = window.pp || {
        prp: {},
        hPrp: function(pid,cnvfn){
            return function(o){
                try{window.pp.prp[pid] = cnvfn ? cnvfn(o) : o;}catch(e){}
            };
        }
    };
    if(typeof(window.pp.Ad)=='undefined'){
        if(pp_options.prp !== undefined && pp_options.prp !== null && typeof(pp_options.prp) !== 'string'){
            for(var i = 0; i < pp_options.prp.length; i++){
                document.write("<scr" + "ipt type=\"text/javascript\" src=\"" + pp_options.prp[i] + "\"></scr" + "ipt>"); // jshint ignore:line
            }
        }
        window.pp_options = pp_options;
        window.pp_display_ad = 1;
        document.write("<scr" + "ipt type=\"text/javascript\" src=\"https://tag-st.contextweb.com/TagPublish/getjs.static.js?v=30\"></scr" + "ipt>"); // jshint ignore:line
    } else {
        new pp.Ad(pp_options).display();
    }
})();