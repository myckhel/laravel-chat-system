"use strict";(self.webpackChunkdocs=self.webpackChunkdocs||[]).push([[505],{5680:(e,t,n)=>{n.d(t,{xA:()=>p,yg:()=>v});var a=n(6540);function s(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}function r(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(e);t&&(a=a.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,a)}return n}function i(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?r(Object(n),!0).forEach((function(t){s(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):r(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function o(e,t){if(null==e)return{};var n,a,s=function(e,t){if(null==e)return{};var n,a,s={},r=Object.keys(e);for(a=0;a<r.length;a++)n=r[a],t.indexOf(n)>=0||(s[n]=e[n]);return s}(e,t);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);for(a=0;a<r.length;a++)n=r[a],t.indexOf(n)>=0||Object.prototype.propertyIsEnumerable.call(e,n)&&(s[n]=e[n])}return s}var l=a.createContext({}),c=function(e){var t=a.useContext(l),n=t;return e&&(n="function"==typeof e?e(t):i(i({},t),e)),n},p=function(e){var t=c(e.components);return a.createElement(l.Provider,{value:t},e.children)},d="mdxType",g={inlineCode:"code",wrapper:function(e){var t=e.children;return a.createElement(a.Fragment,{},t)}},m=a.forwardRef((function(e,t){var n=e.components,s=e.mdxType,r=e.originalType,l=e.parentName,p=o(e,["components","mdxType","originalType","parentName"]),d=c(n),m=s,v=d["".concat(l,".").concat(m)]||d[m]||g[m]||r;return n?a.createElement(v,i(i({ref:t},p),{},{components:n})):a.createElement(v,i({ref:t},p))}));function v(e,t){var n=arguments,s=t&&t.mdxType;if("string"==typeof e||s){var r=n.length,i=new Array(r);i[0]=m;var o={};for(var l in t)hasOwnProperty.call(t,l)&&(o[l]=t[l]);o.originalType=e,o[d]="string"==typeof e?e:s,i[1]=o;for(var c=2;c<r;c++)i[c]=n[c];return a.createElement.apply(null,i)}return a.createElement.apply(null,n)}m.displayName="MDXCreateElement"},108:(e,t,n)=>{n.r(t),n.d(t,{contentTitle:()=>i,default:()=>d,frontMatter:()=>r,metadata:()=>o,toc:()=>l});var a=n(8168),s=(n(6540),n(5680));const r={id:"messageEvent",title:"Message Events",sidebar_label:"Message Events",slug:"/apis/events/message/events"},i=void 0,o={unversionedId:"apis/events/message/messageEvent",id:"version-v1.0.0-beta.4/apis/events/message/messageEvent",isDocsHomePage:!1,title:"Message Events",description:"Namespace",source:"@site/versioned_docs/version-v1.0.0-beta.4/apis/events/message/events.md",sourceDirName:"apis/events/message",slug:"/apis/events/message/events",permalink:"/laravel-chat-system/docs/apis/events/message/events",editUrl:"https://github.com/binkode/laravel-chat-system-docs/edit/master/versioned_docs/version-v1.0.0-beta.4/apis/events/message/events.md",version:"v1.0.0-beta.4",frontMatter:{id:"messageEvent",title:"Message Events",sidebar_label:"Message Events",slug:"/apis/events/message/events"},sidebar:"version-v1.0.0-beta.4/docs",previous:{title:"HasMessage",permalink:"/laravel-chat-system/docs/apis/traits/message/hasMessage"},next:{title:"Message Created Event",permalink:"/laravel-chat-system/docs/apis/events/message/created"}},l=[{value:"<strong>Namespace</strong>",id:"namespace",children:[]},{value:"<strong>Broadcasts as</strong>",id:"broadcasts-as",children:[]},{value:"<strong>Broadcasts when</strong>",id:"broadcasts-when",children:[]},{value:"<strong>Broadcasts with</strong>",id:"broadcasts-with",children:[]},{value:"<strong>Broadcasts on channels</strong>",id:"broadcasts-on-channels",children:[]}],c={toc:l},p="wrapper";function d(e){let{components:t,...n}=e;return(0,s.yg)(p,(0,a.A)({},c,n,{components:t,mdxType:"MDXLayout"}),(0,s.yg)("h2",{id:"namespace"},(0,s.yg)("strong",{parentName:"h2"},"Namespace")),(0,s.yg)("p",null,(0,s.yg)("inlineCode",{parentName:"p"},"Binkode\\ChatSystem\\Events\\Message\\Events")),(0,s.yg)("h2",{id:"broadcasts-as"},(0,s.yg)("strong",{parentName:"h2"},"Broadcasts as")),(0,s.yg)("ul",null,(0,s.yg)("li",{parentName:"ul"},(0,s.yg)("inlineCode",{parentName:"li"},"message"))),(0,s.yg)("h2",{id:"broadcasts-when"},(0,s.yg)("strong",{parentName:"h2"},"Broadcasts when")),(0,s.yg)("ul",null,(0,s.yg)("li",{parentName:"ul"},"event type is not (",(0,s.yg)("inlineCode",{parentName:"li"},"delete")," and event is for ",(0,s.yg)("inlineCode",{parentName:"li"},"message")," and is not ",(0,s.yg)("inlineCode",{parentName:"li"},"conversation_id"),")")),(0,s.yg)("h2",{id:"broadcasts-with"},(0,s.yg)("strong",{parentName:"h2"},"Broadcasts with")),(0,s.yg)("ul",null,(0,s.yg)("li",{parentName:"ul"},(0,s.yg)("inlineCode",{parentName:"li"},"event"),"  type ",(0,s.yg)("inlineCode",{parentName:"li"},"Binkode\\ChatSystem\\Contracts\\IChatEvent")),(0,s.yg)("li",{parentName:"ul"},(0,s.yg)("inlineCode",{parentName:"li"},"conversation_id"),"  type ",(0,s.yg)("inlineCode",{parentName:"li"},"int"))),(0,s.yg)("h2",{id:"broadcasts-on-channels"},(0,s.yg)("strong",{parentName:"h2"},"Broadcasts on channels")),(0,s.yg)("ul",null,(0,s.yg)("li",{parentName:"ul"},(0,s.yg)("inlineCode",{parentName:"li"},"private-message-event.user.{$participant_id}"))))}d.isMDXComponent=!0}}]);