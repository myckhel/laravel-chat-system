"use strict";(self.webpackChunkdocs=self.webpackChunkdocs||[]).push([[4978],{5680:(e,a,t)=>{t.d(a,{xA:()=>p,yg:()=>u});var n=t(6540);function r(e,a,t){return a in e?Object.defineProperty(e,a,{value:t,enumerable:!0,configurable:!0,writable:!0}):e[a]=t,e}function s(e,a){var t=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);a&&(n=n.filter((function(a){return Object.getOwnPropertyDescriptor(e,a).enumerable}))),t.push.apply(t,n)}return t}function i(e){for(var a=1;a<arguments.length;a++){var t=null!=arguments[a]?arguments[a]:{};a%2?s(Object(t),!0).forEach((function(a){r(e,a,t[a])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(t)):s(Object(t)).forEach((function(a){Object.defineProperty(e,a,Object.getOwnPropertyDescriptor(t,a))}))}return e}function o(e,a){if(null==e)return{};var t,n,r=function(e,a){if(null==e)return{};var t,n,r={},s=Object.keys(e);for(n=0;n<s.length;n++)t=s[n],a.indexOf(t)>=0||(r[t]=e[t]);return r}(e,a);if(Object.getOwnPropertySymbols){var s=Object.getOwnPropertySymbols(e);for(n=0;n<s.length;n++)t=s[n],a.indexOf(t)>=0||Object.prototype.propertyIsEnumerable.call(e,t)&&(r[t]=e[t])}return r}var l=n.createContext({}),g=function(e){var a=n.useContext(l),t=a;return e&&(t="function"==typeof e?e(a):i(i({},a),e)),t},p=function(e){var a=g(e.components);return n.createElement(l.Provider,{value:a},e.children)},y="mdxType",d={inlineCode:"code",wrapper:function(e){var a=e.children;return n.createElement(n.Fragment,{},a)}},m=n.forwardRef((function(e,a){var t=e.components,r=e.mdxType,s=e.originalType,l=e.parentName,p=o(e,["components","mdxType","originalType","parentName"]),y=g(t),m=r,u=y["".concat(l,".").concat(m)]||y[m]||d[m]||s;return t?n.createElement(u,i(i({ref:a},p),{},{components:t})):n.createElement(u,i({ref:a},p))}));function u(e,a){var t=arguments,r=a&&a.mdxType;if("string"==typeof e||r){var s=t.length,i=new Array(s);i[0]=m;var o={};for(var l in a)hasOwnProperty.call(a,l)&&(o[l]=a[l]);o.originalType=e,o[y]="string"==typeof e?e:r,i[1]=o;for(var g=2;g<s;g++)i[g]=t[g];return n.createElement.apply(null,i)}return n.createElement.apply(null,t)}m.displayName="MDXCreateElement"},3210:(e,a,t)=>{t.r(a),t.d(a,{contentTitle:()=>i,default:()=>y,frontMatter:()=>s,metadata:()=>o,toc:()=>l});var n=t(8168),r=(t(6540),t(5680));const s={id:"hasMessage",title:"HasMessage APIs",sidebar_label:"HasMessage",slug:"/apis/traits/message/hasMessage"},i=void 0,o={unversionedId:"apis/traits/message/hasMessage",id:"version-v1.0.0-beta.0/apis/traits/message/hasMessage",isDocsHomePage:!1,title:"HasMessage APIs",description:"Namespace",source:"@site/versioned_docs/version-v1.0.0-beta.0/apis/traits/message/hasMessage.md",sourceDirName:"apis/traits/message",slug:"/apis/traits/message/hasMessage",permalink:"/laravel-chat-system/docs/v1.0.0-beta.0/apis/traits/message/hasMessage",editUrl:"https://github.com/binkode/laravel-chat-system-docs/edit/master/versioned_docs/version-v1.0.0-beta.0/apis/traits/message/hasMessage.md",version:"v1.0.0-beta.0",frontMatter:{id:"hasMessage",title:"HasMessage APIs",sidebar_label:"HasMessage",slug:"/apis/traits/message/hasMessage"},sidebar:"version-v1.0.0-beta.0/docs",previous:{title:"HasChatEvent",permalink:"/laravel-chat-system/docs/v1.0.0-beta.0/apis/traits/chatEvent/hasChatEvent"},next:{title:"Message Events",permalink:"/laravel-chat-system/docs/v1.0.0-beta.0/apis/events/message/events"}},l=[{value:"<strong>Namespace</strong>",id:"namespace",children:[{value:"<code>messages()</code>",id:"messages",children:[]},{value:"<code>undelivered()</code>",id:"undelivered",children:[]},{value:"<code>conversations()</code>",id:"conversations",children:[]},{value:"<code>relatedToMessage()</code>",id:"relatedtomessage",children:[]},{value:"<code>relatedToConversation()</code>",id:"relatedtoconversation",children:[]}]}],g={toc:l},p="wrapper";function y(e){let{components:a,...t}=e;return(0,r.yg)(p,(0,n.A)({},g,t,{components:a,mdxType:"MDXLayout"}),(0,r.yg)("h2",{id:"namespace"},(0,r.yg)("strong",{parentName:"h2"},"Namespace")),(0,r.yg)("p",null,(0,r.yg)("inlineCode",{parentName:"p"},"Myckhel\\ChatSystem\\Traits\\ChatEvent")),(0,r.yg)("h3",{id:"messages"},(0,r.yg)("inlineCode",{parentName:"h3"},"messages()")),(0,r.yg)("blockquote",null,(0,r.yg)("p",{parentName:"blockquote"},"adds query for model's messages")),(0,r.yg)("h4",{id:"return"},"@Return"),(0,r.yg)("ul",null,(0,r.yg)("li",{parentName:"ul"},"type ",(0,r.yg)("inlineCode",{parentName:"li"},"QueryBuilder"))),(0,r.yg)("h4",{id:"params"},"@Params"),(0,r.yg)("ul",null,(0,r.yg)("li",{parentName:"ul"},(0,r.yg)("strong",{parentName:"li"},(0,r.yg)("inlineCode",{parentName:"strong"},"?conversation"))," | conversation messages to query for | ",(0,r.yg)("inlineCode",{parentName:"li"},"IConversation|int"))),(0,r.yg)("h4",{id:"params-1"},"@Params"),(0,r.yg)("ul",null,(0,r.yg)("li",{parentName:"ul"},(0,r.yg)("strong",{parentName:"li"},(0,r.yg)("inlineCode",{parentName:"strong"},"?otherUser"))," | adds where otherUser belongs to message  | ",(0,r.yg)("inlineCode",{parentName:"li"},"string"))),(0,r.yg)("h4",{id:"params-2"},"@Params"),(0,r.yg)("ul",null,(0,r.yg)("li",{parentName:"ul"},(0,r.yg)("strong",{parentName:"li"},(0,r.yg)("inlineCode",{parentName:"strong"},"?reply"))," | adds where reply query | ",(0,r.yg)("inlineCode",{parentName:"li"},"array"))),(0,r.yg)("h4",{id:"params-3"},"@Params"),(0,r.yg)("ul",null,(0,r.yg)("li",{parentName:"ul"},(0,r.yg)("strong",{parentName:"li"},(0,r.yg)("inlineCode",{parentName:"strong"},"?type"))," | adds where type query | ",(0,r.yg)("inlineCode",{parentName:"li"},"string"))),(0,r.yg)("h3",{id:"undelivered"},(0,r.yg)("inlineCode",{parentName:"h3"},"undelivered()")),(0,r.yg)("blockquote",null,(0,r.yg)("p",{parentName:"blockquote"},"adds query for model where it messages has not been delivered")),(0,r.yg)("h4",{id:"return-1"},"@Return"),(0,r.yg)("ul",null,(0,r.yg)("li",{parentName:"ul"},"type ",(0,r.yg)("inlineCode",{parentName:"li"},"QueryBuilder"))),(0,r.yg)("h3",{id:"conversations"},(0,r.yg)("inlineCode",{parentName:"h3"},"conversations()")),(0,r.yg)("blockquote",null,(0,r.yg)("p",{parentName:"blockquote"},"adds query for model's conversations")),(0,r.yg)("h4",{id:"return-2"},"@Return"),(0,r.yg)("ul",null,(0,r.yg)("li",{parentName:"ul"},"type ",(0,r.yg)("inlineCode",{parentName:"li"},"QueryBuilder"))),(0,r.yg)("h4",{id:"params-4"},"@Params"),(0,r.yg)("ul",null,(0,r.yg)("li",{parentName:"ul"},(0,r.yg)("strong",{parentName:"li"},(0,r.yg)("inlineCode",{parentName:"strong"},"?conversation"))," | conversations to query for | ",(0,r.yg)("inlineCode",{parentName:"li"},"IConversation|int"))),(0,r.yg)("h4",{id:"params-5"},"@Params"),(0,r.yg)("ul",null,(0,r.yg)("li",{parentName:"ul"},(0,r.yg)("strong",{parentName:"li"},(0,r.yg)("inlineCode",{parentName:"strong"},"?otherUser"))," | adds where otherUser is a participant | ",(0,r.yg)("inlineCode",{parentName:"li"},"string"))),(0,r.yg)("h4",{id:"params-6"},"@Params"),(0,r.yg)("ul",null,(0,r.yg)("li",{parentName:"ul"},(0,r.yg)("strong",{parentName:"li"},(0,r.yg)("inlineCode",{parentName:"strong"},"?type"))," | adds where type query | ",(0,r.yg)("inlineCode",{parentName:"li"},"string"))),(0,r.yg)("h3",{id:"relatedtomessage"},(0,r.yg)("inlineCode",{parentName:"h3"},"relatedToMessage()")),(0,r.yg)("blockquote",null,(0,r.yg)("p",{parentName:"blockquote"},"checks wherther model is related to the given message")),(0,r.yg)("h4",{id:"return-3"},"@Return"),(0,r.yg)("ul",null,(0,r.yg)("li",{parentName:"ul"},"type ",(0,r.yg)("inlineCode",{parentName:"li"},"bool"))),(0,r.yg)("h4",{id:"params-7"},"@Params"),(0,r.yg)("ul",null,(0,r.yg)("li",{parentName:"ul"},(0,r.yg)("strong",{parentName:"li"},(0,r.yg)("inlineCode",{parentName:"strong"},"?message"))," | message to compare relation with | ",(0,r.yg)("inlineCode",{parentName:"li"},"IMessage"))),(0,r.yg)("h3",{id:"relatedtoconversation"},(0,r.yg)("inlineCode",{parentName:"h3"},"relatedToConversation()")),(0,r.yg)("blockquote",null,(0,r.yg)("p",{parentName:"blockquote"},"checks wherther model is related to the given conversation")),(0,r.yg)("h4",{id:"return-4"},"@Return"),(0,r.yg)("ul",null,(0,r.yg)("li",{parentName:"ul"},"type ",(0,r.yg)("inlineCode",{parentName:"li"},"bool"))),(0,r.yg)("h4",{id:"params-8"},"@Params"),(0,r.yg)("ul",null,(0,r.yg)("li",{parentName:"ul"},(0,r.yg)("strong",{parentName:"li"},(0,r.yg)("inlineCode",{parentName:"strong"},"?conversation"))," | conversation to compare relation with | ",(0,r.yg)("inlineCode",{parentName:"li"},"IConversation"))))}y.isMDXComponent=!0}}]);