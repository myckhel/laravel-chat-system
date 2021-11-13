(self.webpackChunkdocs=self.webpackChunkdocs||[]).push([[7070],{3905:function(e,t,a){"use strict";a.d(t,{Zo:function(){return u},kt:function(){return c}});var n=a(7294);function r(e,t,a){return t in e?Object.defineProperty(e,t,{value:a,enumerable:!0,configurable:!0,writable:!0}):e[t]=a,e}function s(e,t){var a=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),a.push.apply(a,n)}return a}function i(e){for(var t=1;t<arguments.length;t++){var a=null!=arguments[t]?arguments[t]:{};t%2?s(Object(a),!0).forEach((function(t){r(e,t,a[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(a)):s(Object(a)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(a,t))}))}return e}function o(e,t){if(null==e)return{};var a,n,r=function(e,t){if(null==e)return{};var a,n,r={},s=Object.keys(e);for(n=0;n<s.length;n++)a=s[n],t.indexOf(a)>=0||(r[a]=e[a]);return r}(e,t);if(Object.getOwnPropertySymbols){var s=Object.getOwnPropertySymbols(e);for(n=0;n<s.length;n++)a=s[n],t.indexOf(a)>=0||Object.prototype.propertyIsEnumerable.call(e,a)&&(r[a]=e[a])}return r}var l=n.createContext({}),p=function(e){var t=n.useContext(l),a=t;return e&&(a="function"==typeof e?e(t):i(i({},t),e)),a},u=function(e){var t=p(e.components);return n.createElement(l.Provider,{value:t},e.children)},d={inlineCode:"code",wrapper:function(e){var t=e.children;return n.createElement(n.Fragment,{},t)}},m=n.forwardRef((function(e,t){var a=e.components,r=e.mdxType,s=e.originalType,l=e.parentName,u=o(e,["components","mdxType","originalType","parentName"]),m=p(a),c=r,k=m["".concat(l,".").concat(c)]||m[c]||d[c]||s;return a?n.createElement(k,i(i({ref:t},u),{},{components:a})):n.createElement(k,i({ref:t},u))}));function c(e,t){var a=arguments,r=t&&t.mdxType;if("string"==typeof e||r){var s=a.length,i=new Array(s);i[0]=m;var o={};for(var l in t)hasOwnProperty.call(t,l)&&(o[l]=t[l]);o.originalType=e,o.mdxType="string"==typeof e?e:r,i[1]=o;for(var p=2;p<s;p++)i[p]=a[p];return n.createElement.apply(null,i)}return n.createElement.apply(null,a)}m.displayName="MDXCreateElement"},8221:function(e,t,a){"use strict";a.r(t),a.d(t,{frontMatter:function(){return i},contentTitle:function(){return o},metadata:function(){return l},toc:function(){return p},default:function(){return d}});var n=a(2122),r=a(9756),s=(a(7294),a(3905)),i={id:"hasMessage",title:"HasMessage APIs",sidebar_label:"HasMessage",slug:"/apis/traits/message/hasMessage"},o=void 0,l={unversionedId:"apis/traits/message/hasMessage",id:"version-v1.0.0-beta.0/apis/traits/message/hasMessage",isDocsHomePage:!1,title:"HasMessage APIs",description:"Namespace",source:"@site/versioned_docs/version-v1.0.0-beta.0/apis/traits/message/hasMessage.md",sourceDirName:"apis/traits/message",slug:"/apis/traits/message/hasMessage",permalink:"/laravel-chat-system/docs/apis/traits/message/hasMessage",editUrl:"https://github.com/myckhel/laravel-chat-system-docs/edit/master/versioned_docs/version-v1.0.0-beta.0/apis/traits/message/hasMessage.md",version:"v1.0.0-beta.0",frontMatter:{id:"hasMessage",title:"HasMessage APIs",sidebar_label:"HasMessage",slug:"/apis/traits/message/hasMessage"},sidebar:"version-v1.0.0-beta.0/docs",previous:{title:"HasChatEvent",permalink:"/laravel-chat-system/docs/apis/traits/chatEvent/hasChatEvent"},next:{title:"Message Events",permalink:"/laravel-chat-system/docs/apis/events/message/events"}},p=[{value:"<strong>Namespace</strong>",id:"namespace",children:[{value:"<code>messages()</code>",id:"messages",children:[]},{value:"<code>undelivered()</code>",id:"undelivered",children:[]},{value:"<code>conversations()</code>",id:"conversations",children:[]},{value:"<code>relatedToMessage()</code>",id:"relatedtomessage",children:[]},{value:"<code>relatedToConversation()</code>",id:"relatedtoconversation",children:[]}]}],u={toc:p};function d(e){var t=e.components,a=(0,r.Z)(e,["components"]);return(0,s.kt)("wrapper",(0,n.Z)({},u,a,{components:t,mdxType:"MDXLayout"}),(0,s.kt)("h2",{id:"namespace"},(0,s.kt)("strong",{parentName:"h2"},"Namespace")),(0,s.kt)("p",null,(0,s.kt)("inlineCode",{parentName:"p"},"Myckhel\\ChatSystem\\Traits\\ChatEvent")),(0,s.kt)("h3",{id:"messages"},(0,s.kt)("inlineCode",{parentName:"h3"},"messages()")),(0,s.kt)("blockquote",null,(0,s.kt)("p",{parentName:"blockquote"},"adds query for model's messages")),(0,s.kt)("h4",{id:"return"},"@Return"),(0,s.kt)("ul",null,(0,s.kt)("li",{parentName:"ul"},"type ",(0,s.kt)("inlineCode",{parentName:"li"},"QueryBuilder"))),(0,s.kt)("h4",{id:"params"},"@Params"),(0,s.kt)("ul",null,(0,s.kt)("li",{parentName:"ul"},(0,s.kt)("strong",{parentName:"li"},(0,s.kt)("inlineCode",{parentName:"strong"},"?conversation"))," | conversation messages to query for | ",(0,s.kt)("inlineCode",{parentName:"li"},"IConversation|int"))),(0,s.kt)("h4",{id:"params-1"},"@Params"),(0,s.kt)("ul",null,(0,s.kt)("li",{parentName:"ul"},(0,s.kt)("strong",{parentName:"li"},(0,s.kt)("inlineCode",{parentName:"strong"},"?otherUser"))," | adds where otherUser belongs to message  | ",(0,s.kt)("inlineCode",{parentName:"li"},"string"))),(0,s.kt)("h4",{id:"params-2"},"@Params"),(0,s.kt)("ul",null,(0,s.kt)("li",{parentName:"ul"},(0,s.kt)("strong",{parentName:"li"},(0,s.kt)("inlineCode",{parentName:"strong"},"?reply"))," | adds where reply query | ",(0,s.kt)("inlineCode",{parentName:"li"},"array"))),(0,s.kt)("h4",{id:"params-3"},"@Params"),(0,s.kt)("ul",null,(0,s.kt)("li",{parentName:"ul"},(0,s.kt)("strong",{parentName:"li"},(0,s.kt)("inlineCode",{parentName:"strong"},"?type"))," | adds where type query | ",(0,s.kt)("inlineCode",{parentName:"li"},"string"))),(0,s.kt)("h3",{id:"undelivered"},(0,s.kt)("inlineCode",{parentName:"h3"},"undelivered()")),(0,s.kt)("blockquote",null,(0,s.kt)("p",{parentName:"blockquote"},"adds query for model where it messages has not been delivered")),(0,s.kt)("h4",{id:"return-1"},"@Return"),(0,s.kt)("ul",null,(0,s.kt)("li",{parentName:"ul"},"type ",(0,s.kt)("inlineCode",{parentName:"li"},"QueryBuilder"))),(0,s.kt)("h3",{id:"conversations"},(0,s.kt)("inlineCode",{parentName:"h3"},"conversations()")),(0,s.kt)("blockquote",null,(0,s.kt)("p",{parentName:"blockquote"},"adds query for model's conversations")),(0,s.kt)("h4",{id:"return-2"},"@Return"),(0,s.kt)("ul",null,(0,s.kt)("li",{parentName:"ul"},"type ",(0,s.kt)("inlineCode",{parentName:"li"},"QueryBuilder"))),(0,s.kt)("h4",{id:"params-4"},"@Params"),(0,s.kt)("ul",null,(0,s.kt)("li",{parentName:"ul"},(0,s.kt)("strong",{parentName:"li"},(0,s.kt)("inlineCode",{parentName:"strong"},"?conversation"))," | conversations to query for | ",(0,s.kt)("inlineCode",{parentName:"li"},"IConversation|int"))),(0,s.kt)("h4",{id:"params-5"},"@Params"),(0,s.kt)("ul",null,(0,s.kt)("li",{parentName:"ul"},(0,s.kt)("strong",{parentName:"li"},(0,s.kt)("inlineCode",{parentName:"strong"},"?otherUser"))," | adds where otherUser is a participant | ",(0,s.kt)("inlineCode",{parentName:"li"},"string"))),(0,s.kt)("h4",{id:"params-6"},"@Params"),(0,s.kt)("ul",null,(0,s.kt)("li",{parentName:"ul"},(0,s.kt)("strong",{parentName:"li"},(0,s.kt)("inlineCode",{parentName:"strong"},"?type"))," | adds where type query | ",(0,s.kt)("inlineCode",{parentName:"li"},"string"))),(0,s.kt)("h3",{id:"relatedtomessage"},(0,s.kt)("inlineCode",{parentName:"h3"},"relatedToMessage()")),(0,s.kt)("blockquote",null,(0,s.kt)("p",{parentName:"blockquote"},"checks wherther model is related to the given message")),(0,s.kt)("h4",{id:"return-3"},"@Return"),(0,s.kt)("ul",null,(0,s.kt)("li",{parentName:"ul"},"type ",(0,s.kt)("inlineCode",{parentName:"li"},"bool"))),(0,s.kt)("h4",{id:"params-7"},"@Params"),(0,s.kt)("ul",null,(0,s.kt)("li",{parentName:"ul"},(0,s.kt)("strong",{parentName:"li"},(0,s.kt)("inlineCode",{parentName:"strong"},"?message"))," | message to compare relation with | ",(0,s.kt)("inlineCode",{parentName:"li"},"IMessage"))),(0,s.kt)("h3",{id:"relatedtoconversation"},(0,s.kt)("inlineCode",{parentName:"h3"},"relatedToConversation()")),(0,s.kt)("blockquote",null,(0,s.kt)("p",{parentName:"blockquote"},"checks wherther model is related to the given conversation")),(0,s.kt)("h4",{id:"return-4"},"@Return"),(0,s.kt)("ul",null,(0,s.kt)("li",{parentName:"ul"},"type ",(0,s.kt)("inlineCode",{parentName:"li"},"bool"))),(0,s.kt)("h4",{id:"params-8"},"@Params"),(0,s.kt)("ul",null,(0,s.kt)("li",{parentName:"ul"},(0,s.kt)("strong",{parentName:"li"},(0,s.kt)("inlineCode",{parentName:"strong"},"?conversation"))," | conversation to compare relation with | ",(0,s.kt)("inlineCode",{parentName:"li"},"IConversation"))))}d.isMDXComponent=!0}}]);