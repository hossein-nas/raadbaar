(self.webpackChunkraadbaar=self.webpackChunkraadbaar||[]).push([[529],{9529:function(e,t,i){"use strict";i.r(t),i.d(t,{default:function(){return r}});var s=i(8988),a=i(7649);s.Z.use([a.Z]);var n={name:"RelatedVehicles",props:{vehiclesList:{type:Array,required:!0,default:function(){return[]}}},data:function(){return{slider:null}},computed:{vehiclesColumn:function(){return this.vehiclesList.length},isNavigationable:function(){return this.vehiclesColumn>1}},mounted:function(){var e=this,t=document.getElementById("related-vehicles-slider");this.slider=new s.Z(t,{slidesPerView:"auto",loop:!0,autoplay:{delay:2500,disableOnInteraction:!1}}),this.$nextTick((function(){return e.attachNavigationArrowsEvents()}))},methods:{getVehiclesColumn:function(e){if(e>=0&&e<=this.vehiclesList.length)return this.vehiclesList[e]},attachNavigationArrowsEvents:function(){var e=this,t=document.getElementById("related-vehicles-slider").parentElement;t.querySelector(".navigation-arrows").querySelector("span.left").addEventListener("click",(function(t){e.slider.slideNext()})),t.querySelector(".navigation-arrows").querySelector("span.right").addEventListener("click",(function(t){e.slider.slidePrev()}))}}},r=(0,i(1900).Z)(n,(function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("div",{staticClass:"sidebar-widget ",class:{"with-navigation-arrows":e.isNavigationable}},[i("div",{staticClass:"header"},[i("h4",[e._v("ماشین‌های متناسب")]),e._v(" "),e.isNavigationable?i("div",{staticClass:"navigation-arrows"},[e._t("navigation",[e._m(0),e._v(" "),e._m(1)])],2):e._e()]),e._v(" "),i("div",{staticClass:"swiper-container",attrs:{id:"related-vehicles-slider"}},[i("div",{staticClass:"swiper-wrapper"},e._l(e.vehiclesList,(function(t,s){return i("div",{key:s,staticClass:"swiper-slide"},[i("ul",e._l(e.getVehiclesColumn(s),(function(t,s){return i("li",{key:s+t.title},[i("div",{staticClass:"vehicle-item bg-thumb-card"},[i("div",{staticClass:"thumb",domProps:{innerHTML:e._s(t.post_thumbnail)}}),e._v(" "),i("a",{attrs:{href:t.permalink},domProps:{textContent:e._s(t.title)}})])])})),0)])})),0)])])}),[function(){var e=this.$createElement,t=this._self._c||e;return t("span",{staticClass:"left"},[t("i",{staticClass:"bi bi-chevron-left"})])},function(){var e=this.$createElement,t=this._self._c||e;return t("span",{staticClass:"right"},[t("i",{staticClass:"bi bi-chevron-right"})])}],!1,null,null,null).exports}}]);
