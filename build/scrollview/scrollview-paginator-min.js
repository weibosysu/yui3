YUI.add("scrollview-paginator",function(h){var g=h.ScrollView.UI_SRC,d="index",a="scrollX",f="total",e="boundingBox",c="contentBox";function b(){b.superclass.constructor.apply(this,arguments);}b.NAME="pluginScrollViewPaginator";b.NS="pages";b.ATTRS={selector:{value:null},index:{value:0},total:{value:0}};h.extend(b,h.Plugin.Base,{initializer:function(){var i,j=this;i=j._host=j.get("host");j.beforeHostMethod("_flickFrame",j._flickFrame);j.afterHostMethod("_uiDimensionsChange",j._calcOffsets);j.afterHostEvent("scrollEnd",j._scrollEnded);j.afterHostEvent("render",j._afterRender);j.after("indexChange",j._afterIndexChange);},_calcOffsets:function(){var l=this._host,j=l.get(c),n=l.get(e),m=this.get("selector"),i,k;i=m?j.all(m):j.get("children");this.set(f,i.size());this._pgOff=k=i.get("offsetLeft");k.push(l._scrollWidth-n.get("offsetWidth"));},_flickFrame:function(){var l=this._host,k=l._currentVelocity,m=k<0,i=this.get(d),j=this.get(f);if(k){if(m&&i<j-1){this.set(d,i+1);}else{if(!m&&i>0){this.set(d,i-1);}}}return this._prevent;},_afterRender:function(j){var i=this._host;i.get("boundingBox").addClass(i.getClassName("paged"));},_scrollEnded:function(l){var k=this._host,i=this.get(d),j=this.get(f);if(l.onGestureMoveEnd&&!k._flicking){if(k._scrolledHalfway){if(k._scrolledForward&&i<j-1){this.set(d,i+1);}else{if(i>0){this.set(d,i-1);}else{this.snapToCurrent();}}}else{this.snapToCurrent();}}k._flicking=false;},_afterIndexChange:function(i){if(i.src!==g){this._uiIndex(i.newVal);}},_uiIndex:function(i){this.scrollTo(i,350,"ease-out");},next:function(){var i=this.get(d);if(i<this.get(f)-1){this.set(d,i+1);}},prev:function(){var i=this.get(d);if(i>0){this.set(d,i-1);}},scrollTo:function(j,l,m){var k=this._host,i=k.get(a);if(k._scrollsHorizontal){i=this._pgOff[j];k.set(a,i,{duration:l,easing:m});}},snapToCurrent:function(){var i=this._host;i._killTimer();i.set(a,this._pgOff[this.get(d)],{duration:300,easing:"ease-out"});},_prevent:new h.Do.Prevent()});h.namespace("Plugin").ScrollViewPaginator=b;},"@VERSION@",{requires:["plugin"],skinnable:true});