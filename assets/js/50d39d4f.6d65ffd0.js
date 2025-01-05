"use strict";(self.webpackChunkdocs=self.webpackChunkdocs||[]).push([[4914],{5680:(e,t,n)=>{n.d(t,{xA:()=>d,yg:()=>v});var a=n(6540);function r(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}function s(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(e);t&&(a=a.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,a)}return n}function i(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?s(Object(n),!0).forEach((function(t){r(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):s(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function o(e,t){if(null==e)return{};var n,a,r=function(e,t){if(null==e)return{};var n,a,r={},s=Object.keys(e);for(a=0;a<s.length;a++)n=s[a],t.indexOf(n)>=0||(r[n]=e[n]);return r}(e,t);if(Object.getOwnPropertySymbols){var s=Object.getOwnPropertySymbols(e);for(a=0;a<s.length;a++)n=s[a],t.indexOf(n)>=0||Object.prototype.propertyIsEnumerable.call(e,n)&&(r[n]=e[n])}return r}var c=a.createContext({}),l=function(e){var t=a.useContext(c),n=t;return e&&(n="function"==typeof e?e(t):i(i({},t),e)),n},d=function(e){var t=l(e.components);return a.createElement(c.Provider,{value:t},e.children)},p="mdxType",u={inlineCode:"code",wrapper:function(e){var t=e.children;return a.createElement(a.Fragment,{},t)}},g=a.forwardRef((function(e,t){var n=e.components,r=e.mdxType,s=e.originalType,c=e.parentName,d=o(e,["components","mdxType","originalType","parentName"]),p=l(n),g=r,v=p["".concat(c,".").concat(g)]||p[g]||u[g]||s;return n?a.createElement(v,i(i({ref:t},d),{},{components:n})):a.createElement(v,i({ref:t},d))}));function v(e,t){var n=arguments,r=t&&t.mdxType;if("string"==typeof e||r){var s=n.length,i=new Array(s);i[0]=g;var o={};for(var c in t)hasOwnProperty.call(t,c)&&(o[c]=t[c]);o.originalType=e,o[p]="string"==typeof e?e:r,i[1]=o;for(var l=2;l<s;l++)i[l]=n[l];return a.createElement.apply(null,i)}return a.createElement.apply(null,n)}g.displayName="MDXCreateElement"},6665:(e,t,n)=>{n.r(t),n.d(t,{contentTitle:()=>i,default:()=>p,frontMatter:()=>s,metadata:()=>o,toc:()=>c});var a=n(8168),r=(n(6540),n(5680));const s={id:"guides.chatEvent",title:"Using ChatEvent",sidebar_label:"Using ChatEvent",slug:"/guides/chatEvent"},i=void 0,o={unversionedId:"guides/guides.chatEvent",id:"version-v1.0.0-beta.0/guides/guides.chatEvent",isDocsHomePage:!1,title:"Using ChatEvent",description:"Creating chatEvent",source:"@site/versioned_docs/version-v1.0.0-beta.0/guides/chatEvent.md",sourceDirName:"guides",slug:"/guides/chatEvent",permalink:"/laravel-chat-system/docs/v1.0.0-beta.0/guides/chatEvent",editUrl:"https://github.com/binkode/laravel-chat-system-docs/edit/master/versioned_docs/version-v1.0.0-beta.0/guides/chatEvent.md",version:"v1.0.0-beta.0",frontMatter:{id:"guides.chatEvent",title:"Using ChatEvent",sidebar_label:"Using ChatEvent",slug:"/guides/chatEvent"},sidebar:"version-v1.0.0-beta.0/docs",previous:{title:"Using Message",permalink:"/laravel-chat-system/docs/v1.0.0-beta.0/guides/message"},next:{title:"Listening to broadcast events",permalink:"/laravel-chat-system/docs/v1.0.0-beta.0/guides/broadcasts"}},c=[{value:"Creating chatEvent",id:"creating-chatevent",children:[]},{value:"Broadcasting chatEvent",id:"broadcasting-chatevent",children:[]}],l={toc:c},d="wrapper";function p(e){let{components:t,...n}=e;return(0,r.yg)(d,(0,a.A)({},l,n,{components:t,mdxType:"MDXLayout"}),(0,r.yg)("h2",{id:"creating-chatevent"},"Creating chatEvent"),(0,r.yg)("p",null,"You may create chat events by a ",(0,r.yg)("inlineCode",{parentName:"p"},"IChatEventMaker")," model for ",(0,r.yg)("inlineCode",{parentName:"p"},"Message")," or ",(0,r.yg)("inlineCode",{parentName:"p"},"Conversation")," models.\nfor example, creating a read event for a particular message."),(0,r.yg)("pre",null,(0,r.yg)("code",{parentName:"pre",className:"language-php"},"$user->chatEventMakers()\n  ->create([\n    'made_type' => $message::class,\n    'made_id'   => $message->id,\n    'type'      => \"read\"\n  ]);\n")),(0,r.yg)("details",null,(0,r.yg)("summary",null,"output"),(0,r.yg)("pre",null,(0,r.yg)("code",{parentName:"pre",className:"language-json"},'{\n    "made_type": "App\\\\Models\\\\Message",\n    "made_id": 925,\n    "type": "read",\n    "maker_id": 13,\n    "maker_type": "App\\\\Models\\\\User",\n    "updated_at": "2021-07-23T23:00:06.000000Z",\n    "created_at": "2021-07-23T23:00:06.000000Z",\n    "id": 2042\n}\n'))),(0,r.yg)("h2",{id:"broadcasting-chatevent"},"Broadcasting chatEvent"),(0,r.yg)("p",null,"By default, everytime chat is event is created, a ",(0,r.yg)("a",{parentName:"p",href:"../apis/events/message/events"},"Message\\Events")," is broadcasted if only you ",(0,r.yg)("a",{parentName:"p",href:"providers#registering-observers"},"registered ChatSystem Observers"),".\nYou may manually broadcast chatEvent."),(0,r.yg)("pre",null,(0,r.yg)("code",{parentName:"pre",className:"language-php"},"use Myckhel\\ChatSystem\\Events\\Message\\Events;\n\nbroadcast(new Events($chatEvent));\n")),(0,r.yg)("details",null,(0,r.yg)("summary",null,"output"),(0,r.yg)("pre",null,(0,r.yg)("code",{parentName:"pre",className:"language-json"},'[2021-07-23 23:00:07] local.INFO: Broadcasting [message] on channels [private-message-event.user.13, private-message-event.user.10] with payload:\n{\n    "event": {\n        "id": 2042,\n        "maker_type": "App\\\\Models\\\\User",\n        "maker_id": 13,\n        "made_type": "App\\\\Models\\\\Message",\n        "made_id": 925,\n        "type": "read",\n        "all": false,\n        "created_at": "2021-07-23T23:00:06.000000Z",\n        "updated_at": "2021-07-23T23:00:06.000000Z",\n        "made": {\n            "id": 925,\n            "conversation_id": 305,\n            "user_id": 13,\n            "reply_type": null,\n            "reply_id": null,\n            "message": "i am good",\n            "type": "user",\n            "metas": {\n                "token": "1627080883413"\n            },\n            "created_at": "2021-07-23T22:54:44.000000Z",\n            "updated_at": "2021-07-23T22:54:44.000000Z",\n            "isSender": true\n        }\n    },\n    "conversation_id": null,\n    "socket": null\n}\n'))))}p.isMDXComponent=!0}}]);