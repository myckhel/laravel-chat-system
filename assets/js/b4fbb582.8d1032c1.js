(self.webpackChunkdocs=self.webpackChunkdocs||[]).push([[8407],{3905:function(e,t,n){"use strict";n.d(t,{Zo:function(){return p},kt:function(){return d}});var a=n(7294);function r(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}function i(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(e);t&&(a=a.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,a)}return n}function o(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?i(Object(n),!0).forEach((function(t){r(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):i(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function c(e,t){if(null==e)return{};var n,a,r=function(e,t){if(null==e)return{};var n,a,r={},i=Object.keys(e);for(a=0;a<i.length;a++)n=i[a],t.indexOf(n)>=0||(r[n]=e[n]);return r}(e,t);if(Object.getOwnPropertySymbols){var i=Object.getOwnPropertySymbols(e);for(a=0;a<i.length;a++)n=i[a],t.indexOf(n)>=0||Object.prototype.propertyIsEnumerable.call(e,n)&&(r[n]=e[n])}return r}var l=a.createContext({}),s=function(e){var t=a.useContext(l),n=t;return e&&(n="function"==typeof e?e(t):o(o({},t),e)),n},p=function(e){var t=s(e.components);return a.createElement(l.Provider,{value:t},e.children)},u={inlineCode:"code",wrapper:function(e){var t=e.children;return a.createElement(a.Fragment,{},t)}},m=a.forwardRef((function(e,t){var n=e.components,r=e.mdxType,i=e.originalType,l=e.parentName,p=c(e,["components","mdxType","originalType","parentName"]),m=s(n),d=r,v=m["".concat(l,".").concat(d)]||m[d]||u[d]||i;return n?a.createElement(v,o(o({ref:t},p),{},{components:n})):a.createElement(v,o({ref:t},p))}));function d(e,t){var n=arguments,r=t&&t.mdxType;if("string"==typeof e||r){var i=n.length,o=new Array(i);o[0]=m;var c={};for(var l in t)hasOwnProperty.call(t,l)&&(c[l]=t[l]);c.originalType=e,c.mdxType="string"==typeof e?e:r,o[1]=c;for(var s=2;s<i;s++)o[s]=n[s];return a.createElement.apply(null,o)}return a.createElement.apply(null,n)}m.displayName="MDXCreateElement"},9950:function(e,t,n){"use strict";n.r(t),n.d(t,{frontMatter:function(){return o},contentTitle:function(){return c},metadata:function(){return l},toc:function(){return s},default:function(){return u}});var a=n(2122),r=n(9756),i=(n(7294),n(3905)),o={id:"canMakeChatEvent",title:"CanMakeChatEvent APIs",sidebar_label:"CanMakeChatEvent",slug:"/apis/traits/chatEvent/canMakeChatEvent"},c=void 0,l={unversionedId:"apis/traits/chatEvent/canMakeChatEvent",id:"version-v1.0.0-beta.0/apis/traits/chatEvent/canMakeChatEvent",isDocsHomePage:!1,title:"CanMakeChatEvent APIs",description:"Namespace",source:"@site/versioned_docs/version-v1.0.0-beta.0/apis/traits/chatEvent/canMakeChatEvent.md",sourceDirName:"apis/traits/chatEvent",slug:"/apis/traits/chatEvent/canMakeChatEvent",permalink:"/laravel-chat-system/docs/apis/traits/chatEvent/canMakeChatEvent",editUrl:"https://github.com/myckhel/laravel-chat-system-docs/edit/master/versioned_docs/version-v1.0.0-beta.0/apis/traits/chatEvent/canMakeChatEvent.md",version:"v1.0.0-beta.0",frontMatter:{id:"canMakeChatEvent",title:"CanMakeChatEvent APIs",sidebar_label:"CanMakeChatEvent",slug:"/apis/traits/chatEvent/canMakeChatEvent"},sidebar:"version-v1.0.0-beta.0/docs",previous:{title:"ChatEvent",permalink:"/laravel-chat-system/docs/apis/models/chatEvent"},next:{title:"HasChatEvent",permalink:"/laravel-chat-system/docs/apis/traits/chatEvent/hasChatEvent"}},s=[{value:"<strong>Namespace</strong>",id:"namespace",children:[{value:"<code>chatEventMakers()</code>",id:"chateventmakers",children:[]}]}],p={toc:s};function u(e){var t=e.components,n=(0,r.Z)(e,["components"]);return(0,i.kt)("wrapper",(0,a.Z)({},p,n,{components:t,mdxType:"MDXLayout"}),(0,i.kt)("h2",{id:"namespace"},(0,i.kt)("strong",{parentName:"h2"},"Namespace")),(0,i.kt)("p",null,(0,i.kt)("inlineCode",{parentName:"p"},"Myckhel\\ChatSystem\\Traits\\ChatEvent")),(0,i.kt)("h3",{id:"chateventmakers"},(0,i.kt)("inlineCode",{parentName:"h3"},"chatEventMakers()")),(0,i.kt)("blockquote",null,(0,i.kt)("p",{parentName:"blockquote"},"Model has many chat event makers.")),(0,i.kt)("h4",{id:"return"},"@Return"),(0,i.kt)("ul",null,(0,i.kt)("li",{parentName:"ul"},"type ",(0,i.kt)("inlineCode",{parentName:"li"},"MorphMany"))),(0,i.kt)("h4",{id:"params"},"@Params"),(0,i.kt)("ul",null,(0,i.kt)("li",{parentName:"ul"},(0,i.kt)("strong",{parentName:"li"},(0,i.kt)("inlineCode",{parentName:"strong"},"?id"))," | chatEvent id to include | ",(0,i.kt)("inlineCode",{parentName:"li"},"int"))),(0,i.kt)("h4",{id:"params-1"},"@Params"),(0,i.kt)("ul",null,(0,i.kt)("li",{parentName:"ul"},(0,i.kt)("strong",{parentName:"li"},(0,i.kt)("inlineCode",{parentName:"strong"},"?type"))," | chatEvent type to include | ",(0,i.kt)("inlineCode",{parentName:"li"},"string"))),(0,i.kt)("h4",{id:"params-2"},"@Params"),(0,i.kt)("ul",null,(0,i.kt)("li",{parentName:"ul"},(0,i.kt)("strong",{parentName:"li"},(0,i.kt)("inlineCode",{parentName:"strong"},"?made_id"))," | chatEvent made_id to include | ",(0,i.kt)("inlineCode",{parentName:"li"},"int"))),(0,i.kt)("h4",{id:"params-3"},"@Params"),(0,i.kt)("ul",null,(0,i.kt)("li",{parentName:"ul"},(0,i.kt)("strong",{parentName:"li"},(0,i.kt)("inlineCode",{parentName:"strong"},"?made_type"))," | chatEvent made_type to include | ",(0,i.kt)("inlineCode",{parentName:"li"},"int"))))}u.isMDXComponent=!0}}]);