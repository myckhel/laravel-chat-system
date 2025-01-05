"use strict";(self.webpackChunkdocs=self.webpackChunkdocs||[]).push([[8481],{5680:(e,t,a)=>{a.d(t,{xA:()=>c,yg:()=>g});var n=a(6540);function r(e,t,a){return t in e?Object.defineProperty(e,t,{value:a,enumerable:!0,configurable:!0,writable:!0}):e[t]=a,e}function i(e,t){var a=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),a.push.apply(a,n)}return a}function o(e){for(var t=1;t<arguments.length;t++){var a=null!=arguments[t]?arguments[t]:{};t%2?i(Object(a),!0).forEach((function(t){r(e,t,a[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(a)):i(Object(a)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(a,t))}))}return e}function l(e,t){if(null==e)return{};var a,n,r=function(e,t){if(null==e)return{};var a,n,r={},i=Object.keys(e);for(n=0;n<i.length;n++)a=i[n],t.indexOf(a)>=0||(r[a]=e[a]);return r}(e,t);if(Object.getOwnPropertySymbols){var i=Object.getOwnPropertySymbols(e);for(n=0;n<i.length;n++)a=i[n],t.indexOf(a)>=0||Object.prototype.propertyIsEnumerable.call(e,a)&&(r[a]=e[a])}return r}var s=n.createContext({}),p=function(e){var t=n.useContext(s),a=t;return e&&(a="function"==typeof e?e(t):o(o({},t),e)),a},c=function(e){var t=p(e.components);return n.createElement(s.Provider,{value:t},e.children)},u="mdxType",y={inlineCode:"code",wrapper:function(e){var t=e.children;return n.createElement(n.Fragment,{},t)}},m=n.forwardRef((function(e,t){var a=e.components,r=e.mdxType,i=e.originalType,s=e.parentName,c=l(e,["components","mdxType","originalType","parentName"]),u=p(a),m=r,g=u["".concat(s,".").concat(m)]||u[m]||y[m]||i;return a?n.createElement(g,o(o({ref:t},c),{},{components:a})):n.createElement(g,o({ref:t},c))}));function g(e,t){var a=arguments,r=t&&t.mdxType;if("string"==typeof e||r){var i=a.length,o=new Array(i);o[0]=m;var l={};for(var s in t)hasOwnProperty.call(t,s)&&(l[s]=t[s]);l.originalType=e,l[u]="string"==typeof e?e:r,o[1]=l;for(var p=2;p<i;p++)o[p]=a[p];return n.createElement.apply(null,o)}return n.createElement.apply(null,a)}m.displayName="MDXCreateElement"},3819:(e,t,a)=>{a.r(t),a.d(t,{contentTitle:()=>o,default:()=>u,frontMatter:()=>i,metadata:()=>l,toc:()=>s});var n=a(8168),r=(a(6540),a(5680));const i={id:"intro",title:"Simple Laravel Chat Package",sidebar_label:"Introduction",slug:"/"},o=void 0,l={unversionedId:"intro",id:"version-v1.0.0-beta.0/intro",isDocsHomePage:!1,title:"Simple Laravel Chat Package",description:"Overview",source:"@site/versioned_docs/version-v1.0.0-beta.0/intro.md",sourceDirName:".",slug:"/",permalink:"/laravel-chat-system/docs/v1.0.0-beta.0/",editUrl:"https://github.com/binkode/laravel-chat-system-docs/edit/master/versioned_docs/version-v1.0.0-beta.0/intro.md",version:"v1.0.0-beta.0",frontMatter:{id:"intro",title:"Simple Laravel Chat Package",sidebar_label:"Introduction",slug:"/"},sidebar:"version-v1.0.0-beta.0/docs",next:{title:"Installation",permalink:"/laravel-chat-system/docs/v1.0.0-beta.0/install"}},s=[{value:"<code>Overview</code>",id:"overview",children:[]},{value:"Features",id:"features",children:[{value:"Conversation",id:"conversation",children:[]},{value:"Message",id:"message",children:[]},{value:"Chat Events",id:"chat-events",children:[]}]}],p={toc:s},c="wrapper";function u(e){let{components:t,...a}=e;return(0,r.yg)(c,(0,n.A)({},p,a,{components:t,mdxType:"MDXLayout"}),(0,r.yg)("h2",{id:"overview"},(0,r.yg)("inlineCode",{parentName:"h2"},"Overview")),(0,r.yg)("p",null,"This package allows you to integrate chatting into your laravel application."),(0,r.yg)("h2",{id:"features"},"Features"),(0,r.yg)("p",null,"Here are the main features chat system provides."),(0,r.yg)("h3",{id:"conversation"},"Conversation"),(0,r.yg)("p",null,"The package gives you ",(0,r.yg)("a",{parentName:"p",href:"./apis/models/conversation"},"conversation")," support which can have multiple participants.\n",(0,r.yg)("a",{parentName:"p",href:"./apis/models/conversation"},"conversation")," can be of types such as:"),(0,r.yg)("ul",null,(0,r.yg)("li",{parentName:"ul"},(0,r.yg)("inlineCode",{parentName:"li"},"private")," conversation type"),(0,r.yg)("li",{parentName:"ul"},(0,r.yg)("inlineCode",{parentName:"li"},"group")," conversation type"),(0,r.yg)("li",{parentName:"ul"},(0,r.yg)("inlineCode",{parentName:"li"},"issue")," conversation type")),(0,r.yg)("h3",{id:"message"},"Message"),(0,r.yg)("p",null,"The package gives you flexible ",(0,r.yg)("a",{parentName:"p",href:"./apis/models/message"},"message")," support which can belong to a ",(0,r.yg)("a",{parentName:"p",href:"./apis/models/conversation"},"conversation")," and authored by a user.\n",(0,r.yg)("a",{parentName:"p",href:"./apis/models/message"},"message")," can be of types such as:"),(0,r.yg)("ul",null,(0,r.yg)("li",{parentName:"ul"},(0,r.yg)("inlineCode",{parentName:"li"},"user")," message type"),(0,r.yg)("li",{parentName:"ul"},(0,r.yg)("inlineCode",{parentName:"li"},"system")," message type"),(0,r.yg)("li",{parentName:"ul"},(0,r.yg)("inlineCode",{parentName:"li"},"activity")," message type")),(0,r.yg)("h3",{id:"chat-events"},"Chat Events"),(0,r.yg)("p",null,"The package gives you ",(0,r.yg)("a",{parentName:"p",href:"./apis/models/chatevent"},"chat events")," support which could be use for persisting events for ",(0,r.yg)("a",{parentName:"p",href:"./apis/models/message"},"message")," and ",(0,r.yg)("a",{parentName:"p",href:"./apis/models/conversation"},"conversation"),"."),(0,r.yg)("p",null,(0,r.yg)("a",{parentName:"p",href:"./apis/models/chatevent"},"chat events")," can be of types such as:"),(0,r.yg)("ul",null,(0,r.yg)("li",{parentName:"ul"},(0,r.yg)("inlineCode",{parentName:"li"},"read")),(0,r.yg)("li",{parentName:"ul"},(0,r.yg)("inlineCode",{parentName:"li"},"delete")),(0,r.yg)("li",{parentName:"ul"},(0,r.yg)("inlineCode",{parentName:"li"},"deliver"))))}u.isMDXComponent=!0}}]);